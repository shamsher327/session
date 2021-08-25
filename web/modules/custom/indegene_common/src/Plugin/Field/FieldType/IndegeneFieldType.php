<?php

namespace Drupal\indegene_common\Plugin\Field\FieldType;


use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;

/**
 * Provides a field type of baz.
 *
 * @FieldType(
 *   id = "indegene_field_type",
 *   label = @Translation("Indegene Field"),
 *   default_formatter = "indegene_formatter",
 *   default_widget = "indegene_widget",
 * )
 */
class IndegeneFieldType extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      // columns contains the values that the field will store
      'columns' => [
        // List the values that the field will save. This
        // field will only save a single value, 'value'
        'value' => [
          'type' => 'text',
          'size' => 'tiny',
          'not null' => FALSE,
        ],
      ],
    ];
  }

}