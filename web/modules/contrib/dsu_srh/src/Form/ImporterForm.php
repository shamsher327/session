<?php

namespace Drupal\dsu_srh\Form;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\dsu_srh\Controller\Importer;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Implements a Batch example Form.
 */
class ImporterForm extends FormBase {

  /**
   * Configuration state Drupal Site.
   *
   * @var array
   */
  protected $configFactory;

  /**
   * Configuration state Drupal Site.
   *
   * @var array
   */
  protected $serialization;

  /**
   * DSU SRH Importer service.
   *
   * @var array
   */
  protected $importer;

  /**
   * ImporterForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactory $configFactory
   * @param \Drupal\Component\Serialization\Json $serialization
   * @param \Drupal\dsu_srh\Controller\Importer $importer
   */
  public function __construct(ConfigFactory $configFactory, Json $serialization, Importer $importer) {
    $this->configFactory = $configFactory;
    $this->serialization = $serialization;
    $this->importer = $importer;

  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return \Drupal\Core\Form\FormBase|static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('serialization.json'),
      $container->get('dsu_srh.importer')
    );
  }

  /**
   * {@inheritdoc}.
   */
  public function getFormId() {
    return 'dsu_importerform';
  }

  /**
   * {@inheritdoc}.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    Drupal::messenger()
      ->addMessage($this->t('To proceed with the manual importation process it is mandatory to correctly configure the connector <a href="config"> Here </a>'), 'status');

    $config = $config = $this->config('dsu_srh.settings');
    $updated_recipes = [
      'last_updated'      => 'Last updated',
      'yesterday_updated' => 'Yesterday updated',
      'last_week'         => 'Last week',
      'full_sync'         => 'Full sync',
      'single_recipe'     => 'Single Recipes',
    ];

    $form['hidden_last_updated_time'] = [
      '#title'       => 'Last Updated Sync time',
      '#type'        => 'textfield',
      '#description' => $this->t('Last updated sync time for getting updated content.'),
      '#attributes'  => ['disabled' => TRUE],
      '#required'    => TRUE,
      '#value'       => $config->get('dsu_srh.dsu_connect_last_update'),
    ];

    $form['connect_last_updated_type'] = [
      '#title'       => 'Updated Sync Type',
      '#type'        => 'select',
      '#options'     => $updated_recipes,
      '#description' => $this->t('Select the duration or sync type for getting updated content.'),
      '#required'    => TRUE,
    ];

    $form['single_recipes_textfield'] = [
      '#title'       => $this->t('Recipes ID'),
      '#description' => $this->t('Import Single Recipes By ID.'),
      '#type'        => 'textfield',
      '#states'      => [
        'required' => [
          'select[name="connect_last_updated_type"]' => ['value' => 'single_recipe'],
        ],
        'visible'  => [
          'select[name="connect_last_updated_type"]' => ['value' => 'single_recipe'],
        ],
      ],
    ];

    $form['submit_button'] = [
      '#type'        => 'submit',
      '#value'       => $this->t('Synchronize'),
      '#description' => $this->t('Be aware, if is the first time your synchronize the market, the process will delay lot of time. Configure your PHP and your FAST CGI to support it. If you have already synchronized your market, the UPDATE and CLEAN process will delay only few minutes. The process it is made in batch of 250 recipes.'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $config = $this->configFactory->getEditable('dsu_srh.settings');
    if ($config->get('dsu_srh.dsu_connect_market') == 'NULL') {
      $form_state->setErrorByName('submit_button', $this->t('The connector is mis-configured, configure it in admin/config/dsu_srh/config'));
    }
    if ($config->get('dsu_srh.dsu_connect_market_code') == 'NULL') {
      $form_state->setErrorByName('submit_button', $this->t('The connector is mis-configured, configure it in admin/config/dsu_srh/config'));
    }
    if ($config->get('dsu_srh.dsu_connect_apikey') == NULL || $config->get('dsu_srh.dsu_connect_apikey') == '') {
      $form_state->setErrorByName('submit_button', $this->t('The connector is mis-configured, configure it in admin/config/dsu_srh/config'));
    }
    if ($config->get('dsu_srh.dsu_connect_url') == NULL || $config->get('dsu_srh.dsu_connect_apikey') == '') {
      $form_state->setErrorByName('submit_button', $this->t('The connector is mis-configured, configure it in admin/config/dsu_srh/config'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Set last batch updated time.
    $values = $form_state->getValues();
    $config = $this->configFactory->getEditable('dsu_srh.settings');

    // Updated type of sync.
    $this->configFactory()->getEditable('dsu_srh.settings')
      ->set('dsu_srh.dsu_connect_last_update_type', $values['connect_last_updated_type'])
      ->save();

    // Get single recipes id to import.
    if (isset($values['single_recipes_textfield'])) {
      // Single Recipes Import value.
      $this->configFactory()->getEditable('dsu_srh.settings')
        ->set('dsu_srh.dsu_single_recipes_import', $values['single_recipes_textfield'])
        ->save();
    }

    /**
     * Configuration of batch process
     */
    $batch = [
      'title'            => $this->t('Smart Recipe Hub synchronizer'),
      'operations'       => [],
      'init_message'     => $this->t('Starting to Synchronize'),
      'progress_message' => $this->t('Processing in rounds of ' . $config->get('dsu_srh.dsu_connect_amount') . ' recipes, @current round out of @total.'),
      'error_message'    => $this->t('An error occurred during processing'),
      'finished'         => '\Drupal\dsu_srh\Controller\Importer::syncroRecipesFinish',
    ];

    // Disable Server indexing.
    $config->set('dsu_srh.dsu_single_indexing_server', '')->save();
    Importer::toggleSearchIndexingServer(FALSE);

    /*
     * Preflight to get All id of specific market & specific brands configured in the UI by the admin
     */
    $groups = $this->importer->getAllId();

    // Get single recipes id to import.
    if (isset($values['connect_last_updated_type']) &&
        ($values['connect_last_updated_type'] == 'last_updated'
         || $values['connect_last_updated_type'] == 'full_sync')) {
      // Updated last time sync.
      $this->configFactory()->getEditable('dsu_srh.settings')
        ->set('dsu_srh.dsu_connect_last_update', date('Ymd', time()))
        ->save();
    }

    /*
     * Now we configure th batch operations
     */
    foreach ($groups as $key => $values) {
      $batch['operations'][] = [
        '\Drupal\dsu_srh\Controller\Importer::syncroRecipes',
        [$values],
      ];
    }
    batch_set($batch);
  }

}
