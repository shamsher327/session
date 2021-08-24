<?php

namespace Drupal\dsu_ghostery\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\File\FileSystemInterface;

/**
 * Contains dsu_ghostery module settings;.
 */
class GhosterySettingsForm extends ConfigFormBase {
  const BLOCK_EXTERNAL_URLS_OPTION_KEY = "block_external_urls_option";
  const BLOCK_EXTERNAL_URLS_WHITELIST_KEY = "block_external_urls_whitelistlist";

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dsu_ghostery_settings_form';
  }

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames() {
    return ['dsu_ghostery.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dsu_ghostery.settings');

    $form['priorConsentAction'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Prior Consent Actions'),
      '#default_value' => $config->get('priorConsentAction') != NULL ? $config->get('priorConsentAction') : [],
      '#options' => [
        'c' => $this->t('Close banner'),
        'n' => $this->t('Navigate to another page'),
        's' => $this->t('Scroll the page'),
        'p' => $this->t('Page click (anywhere on the page)'),
      ],
    ];

    $form['container_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Container ID'),
      '#description' => $this->t('The ID assigned by Google Tag Manager (GTM) for this website container. To get a container ID, <a href="http://www.google.com/tagmanager/web/">sign up for GTM</a> and create a container for your website.'),
      '#default_value' => $config->get('container_id'),
      '#attributes' => ['placeholder' => ['GTM-xxxxxx']],
      '#required' => TRUE,
      '#size' => 11,
      '#maxlength' => 15,
    ];

    $form['ghostery_cid'] = [
      '#size' => 11,
      '#type' => 'textfield',
      '#title' => $this->t('Ghostery consent CID'),
      '#description' => $this->t('Place Ghostery CID here'),
      '#default_value' => $config->get('ghostery_cid'),
      '#attributes' => ['placeholder' => ['0000']],
      '#maxlength' => 15,
    ];

    $form['ghostery_nid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ghostery consent NID'),
      '#description' => $this->t('Place Ghostery NID here'),
      '#default_value' => $config->get('ghostery_nid'),
      '#attributes' => ['placeholder' => ['0000']],
      '#size' => 11,
      '#maxlength' => 15,
    ];

    $form['verification_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Verification ID'),
      '#description' => $this->t('<meta name="google-site-verification" content="Place your verification here"/>'),
      '#default_value' => $config->get('verification_id'),
      '#attributes' => ['placeholder' => ['verification_id']],
      '#size' => 80,
      '#maxlength' => 105,
    ];

    $form[GhosterySettingsForm::BLOCK_EXTERNAL_URLS_OPTION_KEY] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Block all external JS and CSS Resources'),
      '#description' => $this->t('Selecting this option will block potential trackers implemented by external Javascript and CSS files. You may want to load these external files through GTM after cookie consent is given. Warning this may break contrib and custom modules!'),
      '#default_value' => $config->get(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_OPTION_KEY),
    ];

    $form[GhosterySettingsForm::BLOCK_EXTERNAL_URLS_WHITELIST_KEY] = [
      '#type' => 'textarea',
      '#title' => $this->t('Whitelist URLs patters on JS and CSS to not block'),
      '#description' => $this->t('Add any external Javascript and CSS that should be ignored by the blocking option selected above'),
      '#default_value' => $config->get(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_WHITELIST_KEY),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $container_id = trim($form_state->getValue('container_id'));
    $ghostery_cid = $form_state->getValue('ghostery_cid');
    $ghostery_nid = $form_state->getValue('ghostery_nid');
    $priorConsentAction = $form_state->getValue('priorConsentAction');
    $priorConsentAction = (array_filter($priorConsentAction));
    $gtmembed = $form_state->getValue('gtmembed');
    $container_id = str_replace(['–', '—', '−'], '-', $container_id);

    if (!preg_match('/^GTM-\w{4,}$/', $container_id)) {
      $form_state->setError($form['container_id'], $this->t('A valid container ID is case sensitive and formatted like GTM-xxxxxx.'));
    }

    if ($priorConsentAction) {
      if (empty($ghostery_cid)) {
        $form_state->setError($form['ghostery_cid'], $this->t('You need to add the Ghostery consent CID, for the Ghostery script to work'));
      }
      elseif (empty($ghostery_nid)) {
        $form_state->setError($form['ghostery_nid'], $this->t('You need to add the Ghostery consent NID, for the Ghostery script to work'));
      }
    }

    if ($gtmembed == 2 || $gtmembed == 4) {
      if (empty($ghostery_cid)) {
        $form_state->setError($form['ghostery_cid'], $this->t('You need to add the Ghostery consent CID, for the Ghostery script to work'));
      }
      elseif (empty($ghostery_nid)) {
        $form_state->setError($form['ghostery_nid'], $this->t('You need to add the Ghostery consent NID, for the Ghostery script to work'));
      }
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cleanExternalUrlsWhitelist = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $form_state->getValue(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_WHITELIST_KEY));
    $this->config('dsu_ghostery.settings')
      ->set('container_id', $form_state->getValue('container_id'))
      ->set('verification_id', $form_state->getValue('verification_id'))
      ->set('ghostery_id', $form_state->getValue('ghostery_id'))
      ->set('ghostery_cid', $form_state->getValue('ghostery_cid'))
      ->set('ghostery_nid', $form_state->getValue('ghostery_nid'))
      ->set('priorConsentAction', $form_state->getValue('priorConsentAction'))
      ->set('ghostery_position', $form_state->getValue('ghostery_position'))
      ->set('gtmembed', $form_state->getValue('gtmembed'))
      ->set('blocked_tracker_urls', $form_state->getValue('blocked_tracker_urls'))
      ->set(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_OPTION_KEY, $form_state->getValue(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_OPTION_KEY))
      ->set(GhosterySettingsForm::BLOCK_EXTERNAL_URLS_WHITELIST_KEY, $cleanExternalUrlsWhitelist)
      ->save();
    parent::submitForm($form, $form_state);
    $this->saveSnippets();
  }

  /**
   * Save snippets.
   */
  public function saveSnippets() {
    module_load_include('inc', 'dsu_ghostery', 'includes/scripts');
    $result = TRUE;
    $snippets = dsu_ghostery_snippets();
    $path = \Drupal::service('file_system')->saveData($snippets, "public://js/dsu_ghostery.js", FileSystemInterface::EXISTS_REPLACE);
    $result = !$path ? FALSE : $result;
    if (!$path) {
      $this->messenger()
        ->addMessage($this->t('An error occurred saving one or more snippet files. Please try again or contact the site administrator if it persists.'));
    }
    else {
      $this->messenger()
        ->addMessage($this->t('Created the Ghostery snippet file based on configuration.'));
      \Drupal::service('asset.js.collection_optimizer')->deleteAll();
      _drupal_flush_css_js();
    }
  }

}
