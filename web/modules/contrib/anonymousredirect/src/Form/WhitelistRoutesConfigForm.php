<?php

namespace Drupal\anonymousredirect\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Class WhitelistRoutesConfigForm.
 */
class WhitelistRoutesConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'anonymousredirect.whitelistroutesconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'whitelist_routes_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('anonymousredirect.whitelistroutesconfig');
    $home_url = Url::fromRoute('<front>')->setAbsolute()->toString();
    $form['whitelist_routes'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Whitelist Routes'),
      '#description' => $this->t('A list of routes that you want be accessible to anonymous user ( enter each item per line).<br><b>Note:</b> wildcard "*" is supported'),
      '#default_value' => $config->get('whitelist_routes'),
    ];
    $form['url_to_redirect'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Url to redirect'),
      '#description' => $this->t('A URL(URI) that you want anonymous user redirects to.<br>URI: relative uri<br>URL: an external URL'),
      '#default_value' => $config->get('url_to_redirect'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('anonymousredirect.whitelistroutesconfig')
      ->set('whitelist_routes', $form_state->getValue('whitelist_routes'))
      ->set('url_to_redirect', $form_state->getValue('url_to_redirect'))
      ->save();
  }

}
