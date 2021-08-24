<?php

namespace Drupal\dsu_security\Service;

use Drupal\file\Entity\File;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Logger\LoggerChannelTrait;


/**
 * A service class for fileinfo-based validation.
 */
class FileUploadSecurityValidator {

  // Copies/provides the t() function.
  use StringTranslationTrait;
  // Copies/provides the getLogger() function.
  use LoggerChannelTrait;

  private $magicFile;

  /**
   * @param string $magicFile A magic file to use with the finfo instance
   *
   * @see https://php.net/finfo-open
   */
  public function __construct(string $magicFile = NULL) {
    $this->magicFile = $magicFile;
  }

  /**
   * File validation function.
   *
   * @param \Drupal\file\Entity\File $file
   *    The file to be uploaded.
   *
   * @return array|null
   */
  public function validate(File $file) {
    $errors = [];
    $mime_by_filename = $file->getMimeType();
    if (!(function_exists('finfo_open'))) {
      return NULL;
    }
    if (!$finfo = new \finfo(FILEINFO_MIME_TYPE, $this->magicFile)) {
      return NULL;
    }
    $mime_by_fileInfo = $finfo->file($file->getFileUri());
    if ($mime_by_filename !== $mime_by_fileInfo) {
      $errors[] = $this->t("There was a problem with this file's extension.");
      $this->getLogger('dsu_security')
        ->error("Error while uploading file: MimeTypeGuesser guessed '%mime_by_fileinfo' and fileinfo '%mime_by_filename'",
          [
            '%mime_by_fileinfo' => $mime_by_fileInfo,
            '%mime_by_filename' => $mime_by_filename,
          ]
        );
    }
    return $errors;
  }
}
