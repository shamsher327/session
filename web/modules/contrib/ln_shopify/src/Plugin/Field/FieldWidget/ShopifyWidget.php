<?php

namespace Drupal\ln_shopify\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\Plugin\Field\FieldWidget\StringTextfieldWidget;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Plugin implementation of the 'shopify_widget' widget.
 *
 * @FieldWidget(
 *   id = "shopify_widget",
 *   label = @Translation("Shopify Widget"),
 *   field_types = {
 *     "field_shopify"
 *   },
 * )
 */
class ShopifyWidget extends StringTextfieldWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $main_widget = parent::formElement($items, $delta, $element, $form, $form_state);

    $element = $main_widget['value'];
    $element['#type'] = 'text_format';
    $element['#format'] = isset($items[$delta]->format) ? $items[$delta]->format : NULL;
    $element['#base_type'] = $main_widget['value']['#type'];
	$form['#attached']['library'][] = 'ln_shopify/general';

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state) {
    if ($violation->arrayPropertyPath == ['format'] && isset($element['format']['#access']) && !$element['format']['#access']) {
      // Ignore validation errors for formats that may not be changed,
      // such as when existing formats become invalid.
      // See \Drupal\filter\Element\TextFormat::processFormat().
      return FALSE;
    }
    return $element;
  }

}
