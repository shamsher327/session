<?php

namespace Drupal\ln_c_yt_carousel\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * YouTube API key configuration form.
 */
class YouTubeConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'youtube_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ln_c_yt_carousel.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $config = $this->config('ln_c_yt_carousel.settings');

    $form['panel'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Youtube Authentication Configuration'),
      '#open' => TRUE,
    ];

    $form['panel']['get_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter API Key'),
      '#default_value' => $config->get('api_key'),
      '#required' => TRUE,
    ];

    return parent::buildForm($form, $form_state);

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('ln_c_yt_carousel.settings')
      ->set('api_key', $form_state->getValue('get_api_key'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
