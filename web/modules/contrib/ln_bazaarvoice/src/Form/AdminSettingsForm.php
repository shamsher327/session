<?php

namespace Drupal\ln_bazaarvoice\Form;

use Drupal;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BazaarvoiceAdminSettingsForm.
 *
 * @package Drupal\ln_bazaarvoice\Form
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ln_bazaarvoice_admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ln_bazaarvoice.settings');
    $form['mode'] = [
      '#type'          => 'select',
      '#title'         => $this->t('Account Mode'),
      '#description'   => $this->t('Mode to use for connecting to Bazaarvoice. Use staging for pre-production development and testing.'),
      '#options'       => [
        'stg'  => $this->t('Staging'),
        'prod' => $this->t('Production'),
      ],
      '#default_value' => $config->get('mode'),
    ];

    $form['method'] = [
      '#type'          => 'select',
      '#title'         => $this->t('Method'),
      '#description'   => $this->t('Method to use to connect to Bazaarvoice.'),
      '#options'       => [
        'hosted' => $this->t('Hosted UI (javascript)'),
      ],
      '#default_value' => $config->get('method'),
    ];

    $form['hosted'] = [
      '#type'        => 'fieldset',
      '#title'       => $this->t('Hosted UI settings'),
      '#description' => $this->t('Settings needed for Bazaarvoice hosted reviews'),
      '#states'      => [
        'visible' => [
          ':input[name="method"]' => [
            'value' => 'hosted',
          ],
        ],
      ],
    ];

    $form['hosted']['client_name'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Client Name'),
      '#required'      => TRUE,
      '#description'   => $this->t('The client name provided by Bazaarvoice. Remember that this value is case sensitive.'),
      '#default_value' => $config->get('hosted.client_name'),
      '#states'        => [
        'required' => [
          ':input[name="method"]' => ['value' => 'hosted'],
        ],
      ],
    ];

    $form['cloud_key'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Cloud Key'),
      '#default_value' => $config->get('cloud_key'),
    ];

    $form['hosted']['site_id'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Site Id'),
      '#require'       => TRUE,
      '#description'   => $this->t('The ID of the deployment zone you want to use. This is set in the Bazaarvoice configuration hub within the Bazaarvoice workbench.'),
      '#default_value' => $config->get('hosted.site_id'),
      '#states'        => [
        'required' => [
          ':input[name="method"]' => ['value' => 'hosted'],
        ],
      ],
    ];

    $languages = Drupal::languageManager()->getLanguages();

    $form['locale'] = [
      '#type'  => 'details',
      '#title' => $this->t('Bazaarvoice Locale Codes'),
      '#open'  => TRUE,
    ];

    $form['locale']['locale_codes'] = [
      '#type'    => 'table',
      '#caption' => $this->t('Map Languages to Bazaarvoice Locale Code (format of : xx_YY)'),
      '#header'  => [
        $this->t('Language'),
        $this->t('Locale Code'),
      ],
      '#tree'    => TRUE,
    ];

    foreach ($languages as $language) {
      $form['locale']['locale_codes'][$language->getId()]['language'] = [
        '#markup' => $language->getName(),
      ];
      $form['locale']['locale_codes'][$language->getId()]['locale_code'] = [
        '#type'          => 'textfield',
        '#maxlength'     => 6,
        '#size'          => 6,
        '#required'      => TRUE,
        '#default_value' => Drupal::service('ln_bazaarvoice')
          ->getBazaarvoiceLocaleCode($language->getId()),
      ];

      $form['markup_code'] = [
        '#type'  => 'details',
        '#title' => $this->t('Bazaarvoice embedded Snippet'),
        '#open'  => TRUE,
      ];

      $form['markup_code']['bazaarvoice_header_container'] = [
        '#title'       => 'BazaarVoice Container ID',
        '#type'        => 'textfield',
        '#description' => $this->t('Ratings and Reviews Container goes below product description. eg. <strong><code>@content_selector</code></strong>.', ['@content_selector' => '<div id="BVRRContainer"></div>']),
        '#attributes'  => ['disabled' => TRUE],
        '#markup'      => $this->t('Block content'),
        '#maxlength'   => 100,
        '#size'        => 50,
        '#required'    => TRUE,
        '#value'       => 'BVRRContainer',
      ];

      $form['markup_code']['bazaarvoice_rating_container'] = [
        '#title'       => 'BazaarVoice Product Rating',
        '#description' => $this->t('Product Star inline ratings with aggregate result.'),
        '#type'        => 'textarea',
        '#attributes'  => ['disabled' => TRUE],
        '#maxlength'   => 50,
        '#required'    => TRUE,
        '#value'       => '<div itemscope itemtype="http://schema.org/AggregateRating"><div id="BVRRSummaryContainer"></div></div>
                    <div data-bv-show="inline_rating" data-bv-product-id="{{ content.field_bv_product_id[0][\'#context\'][\'value\'] }}"></div>',
      ];

    }

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    // Test submitted locale codes are valid.
    if (isset($values['locale_codes'])) {
      $bazaarvoice = Drupal::service('ln_bazaarvoice');
      foreach ($values['locale_codes'] as $language => $settings) {
        $locale_code = $settings['locale_code'];

        if (!$bazaarvoice->isValidLocaleCode($locale_code)) {
          $form_state->setErrorByName('locale_codes][' . $language . '][locale_code', $this->t('@language Locale code is invalid must match the format of xx_YY.', [
            '@language' => Drupal::languageManager()
              ->getLanguage($language)
              ->getName(),
          ]));
        }
      }
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->configFactory()
      ->getEditable('ln_bazaarvoice.settings')
      ->set('mode', $values['mode'] == 'prod' ? 'prod' : 'stg')
      ->set('method', $values['method'] == 'conversations' ? 'conversations' : 'hosted')
      ->set('hosted.client_name', $values['client_name'])
      ->set('hosted.site_id', $values['site_id'])
      ->save();

    $bazaarvoice = Drupal::service('ln_bazaarvoice');

    // Get old locale codes.
    $locale_codes = $bazaarvoice->getLocaleCodes();
    $updated_codes = [];

    // Get new locale codes.
    foreach ($values['locale_codes'] as $language => $language_settings) {
      $locale_code = $language_settings['locale_code'];

      if (!isset($locale_codes[$language]) || ($locale_codes[$language] != $locale_code)) {
        $updated_codes[$language] = $locale_code;
      }
    }

    // Have locale codes to update?
    if (!empty($updated_codes)) {
      $bazaarvoice->setLocaleCodes($updated_codes);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['ln_bazaarvoice.settings'];
  }

}
