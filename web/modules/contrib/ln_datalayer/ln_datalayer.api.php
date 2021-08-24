<?php

/**
 * @file
 * Document all supported APIs.
 */

/**
 * Provides a ability to alter values from datasets.
 *
 * @param array $values
 *   Values from dataset to alter.
 * @param string $dataset
 *   Name of dataset.
 */
function hook_advanced_datalayer_datasets_alter(array &$values, string $dataset) {
  if ($dataset === 'example') {
    $values['example'] = 'Example value';
  }
}
