<?php

namespace Drupal\ln_exporter\Controller;

use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Exporter Importer.
 *
 * @package Drupal\ln_exporter\Controller
 */
class Exporter extends ControllerBase {

  /**
   * Batch process method.
   *
   * @param $data
   * @param $context
   */
  public static function contentExport($data, &$context) {
    $file_name = 'nodeid-export' . time() . '.csv';
    $directory = 'public://download';

    $file_uri = Exporter::createFile($file_name, $directory);
    Exporter::createContentInFile($file_uri, $data);

    // Create sandbox variable from filename that can be referenced
    // throughout the batch processing.
    $context['sandbox']['vde_file'] = $file_uri;
    $context['finished'] = 1;
    $context['results'] = [
      'vde_file' => $context['sandbox']['vde_file'],
    ];
  }

  /**
   * Finish callback for batch process.
   *
   * @param $success
   * @param $results
   * @param $operations
   */
  public static function contentExportFinishedCallback($success, $results, $operations) {
    if ($success && isset($results['vde_file']) && file_exists($results['vde_file'])) {
      $url = file_create_url($results['vde_file']);
      // If the user specified instant download than redirect to the file.
      \Drupal::messenger()
        ->addMessage(t('Export complete. Download the file <a href=":download_url">here</a>.', [':download_url' => $url]));
      return;
    }
    else {
      \Drupal::messenger()
        ->addMessage(t('Export failed. Make sure the private file system is configured and check the error log.'), 'error');
    }
  }

  /**
   * Generate CSV file
   *
   * @param $file_uri
   *  file path.
   * @param $data
   *  file data.
   */
  public static function createContentInFile($file_uri, $data) {
    $handle = fopen($file_uri, 'w+');

    // Set up the header that will be displayed as the first line of the CSV file.
    $header = Exporter::buildHeader();
    // Add the header as the first line of the CSV.
    fputcsv($handle, $header);

    foreach ($data as $node) {
      $content = ['id' => $node->id(), 'title' => $node->label()];
      fputcsv($handle, array_values($content));
    }
    // Reset where we are in the CSV.
    rewind($handle);

    // Close the file handler since we don't need it anymore.  We are not storing
    fclose($handle);
  }

  /**
   * Create a new blank file.
   *
   * @param $file_name
   *  File name.
   * @param $directory
   *  File directory.
   *
   * @return mixed
   */
  public static function createFile($file_name, $directory) {
    if (!file_exists($directory)) {
      mkdir($directory, NULL, TRUE);
    }
    $file = $directory . '/' . $file_name;
    $file_uri = \Drupal::service('file_system')
      ->saveData('', $file, FileSystemInterface::EXISTS_REPLACE);
    return $file_uri;
  }

  /**
   * Build header for CSV.
   */
  public static function buildHeader() {
    return ['Id', 'Title'];
  }

}