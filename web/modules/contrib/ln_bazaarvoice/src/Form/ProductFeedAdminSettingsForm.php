<?php

namespace Drupal\ln_bazaarvoice\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BazaarvoiceAdminSettingsForm.
 *
 * @package Drupal\ln_bazaarvoice\Form
 */
class ProductFeedAdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ln_bazaarvoice_feed_admin_settings_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ln_bazaarvoice_feed.settings');
    $form = [];

    $form['brand_name'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Brand Name'),
      '#required'      => TRUE,
      '#default_value' => $config->get('brand_name'),
    ];

    $form['brand_external_id'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Brand External ID'),
      '#required'      => TRUE,
      '#default_value' => $config->get('brand_external_id'),
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['close'] = [
      '#type'        => 'submit',
      '#button_type' => 'primary',
      '#value'       => $this->t('Save Product Feeds'),
      '#weight'      => -10,
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->configFactory()
      ->getEditable('ln_bazaarvoice_feed.settings')
      ->set('brand_name', $values['brand_name'])
      ->set('brand_external_id', $values['brand_external_id'])
      ->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['ln_bazaarvoice_feed.settings'];
  }

}
