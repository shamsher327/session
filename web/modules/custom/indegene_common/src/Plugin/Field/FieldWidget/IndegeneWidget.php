<?php

namespace Drupal\indegene_common\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'indegene_common' widget.
 *
 * @FieldWidget(
 *   id = "indegene_widget",
 *   module = "indegene_common",
 *   label = @Translation("Indegene Custom WIdget"),
 *   field_types = {
 *     "indegene_field_type"
 *   }
 * )
 */
class IndegeneWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : '';
    $element += [
      '#type' => 'textfield',
      '#title' => $this->t('Indegene custom widget'),
      '#default_value' => $value,
      '#size' => 50,
      '#maxlength' => 255,
      '#element_validate' => [
        [$this, 'validate'],
      ],
    ];
    return ['value' => $element];
  }

  /**
   * Validate the text field.
   */
  public function validate($element, FormStateInterface $form_state) {
    $value = $element['#value'];
    if (strlen($value) === 0) {
      $form_state->setValueForElement($element, '');
      return;
    }
  }

}
