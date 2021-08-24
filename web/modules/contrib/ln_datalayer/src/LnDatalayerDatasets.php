<?php

namespace Drupal\ln_datalayer;

use Drupal\Core\Extension\ModuleHandlerInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Datasets handling service.
 */
class LnDatalayerDatasets implements LnDatalayerDatasetsInterface {

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Get dataset values from file.
   *
   * @param string $dataset
   *   The dataset name (dataset file name).
   *
   * @return array
   *   Array of values.
   */

  /**
   * Constructs a LnDatalayerDatasets object.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(ModuleHandlerInterface $module_handler) {
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  public function getValues(string $dataset) {

    $values = Yaml::parse(file_get_contents(
      drupal_get_path('module', 'ln_datalayer') . '/datasets/' . $dataset . '.yml'
    ));
    $this->moduleHandler->alter('advanced_datalayer_datasets', $values, $dataset);
    if (!empty($values)) {
      return $values;
    }

    return [];
  }

}
