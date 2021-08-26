<?php

namespace Drupal\indegene_common\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'indegene_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "indegene_formatter",
 *   label = @Translation("Indegene Formatter"),
 *   field_types = {
 *     "indegene_field_type"
 *   }
 * )
 */
class indegeneFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $summary[] = $this->t('Displays the random string.');
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      // Render each element as markup.
      $element[$delta] = ['#markup' => $item->value];
    }

    return $element;
  }

}