<?php

namespace Drupal\ln_pdh\Form;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use Drupal\ln_pdh\PdhImporterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Implements a Batch example Form.
 */
class PdhImporterForm extends FormBase {

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
   * DSU PDH Products Importer service.
   *
   * @var \Drupal\ln_pdh\PdhImporterInterface
   */
  protected $importer;

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigFactory $configFactory, Json $serialization, PdhImporterInterface $importer) {
    $this->configFactory = $configFactory;
    $this->serialization = $serialization;
    $this->importer = $importer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('serialization.json'),
      $container->get('ln_pdh.importer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ln_pdh_importer_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $connection_active = $this->importer->testConnection();
    if (!$connection_active) {
      $this->messenger()
        ->addError($this->t('Remember, to proceed with the manual importation process is mandatory configure correctly the connector in <a href=":config"> Here </a>', [
          ':config' => Url::fromRoute('ln_pdh.config')->toString(),
        ]));
    }
    $form['submit_button'] = [
      '#type' => 'submit',
      '#value' => $this->t('Start Synchronization'),
      '#description' => $this->t('Be aware, if is the first time you Synchronize the market, the process will take a lot of time. Configure your PHP and your FAST CGI to support it. If you have already Synchronized your market, the UPDATE and CLEAN process will delay only few minutes. The process it is made in batch of 250 products'),
      '#disabled' => !$connection_active,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!$this->importer->testConnection()) {
      $form_state->setErrorByName('submit_button', $this->t('Unable to connect to PDH server'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Configuration of batch process.
    $batch = [
      'title' => $this->t('Smart PDH Product synchronizer'),
      'operations' => [['\Drupal\ln_pdh\Form\PdhImporterForm::batchInit', []]],
      'init_message' => $this->t('Starting to Synchronize'),
      'progress_message' => $this->t('Processing in rounds of PDH Products.'),
      'error_message' => $this->t('An error occurred during processing'),
      'finished' => '\Drupal\ln_pdh\Form\PdhImporterForm::batchFinished',
    ];

    /*
     * Preflight to get All id of specific market.
     * Specific brands configured in the UI by the admin
     */
    $products = $this->importer->getProducts();
    /*
     * Now we configure th batch operations
     */

    foreach ($products as $product) {
      // SimpleXmlElement can't be serialized, so we transform it to Object.
      $batch['operations'][] = [
        '\Drupal\ln_pdh\Form\PdhImporterForm::batchProcess',
        [json_decode(json_encode($product))],
      ];
    }
    batch_set($batch);
  }

  /**
   * Disables Solr indexing at the beginning of the bath operations.
   */
  public static function batchInit() {
    \Drupal::service('ln_pdh.importer')->toggleSolrSearchIndexingServer(FALSE);
  }

  /**
   * Imports a product in each batch iteration.
   *
   * @param object $product
   *   The product object.
   * @param array $context
   *   The batch context.
   */
  public static function batchProcess($product, array &$context) {
    \Drupal::service('ln_pdh.importer')->syncProduct($product);
  }

  /**
   * Synchronised finish and reset apache index config.
   */
  public static function batchFinished($success, $operations) {
    // Run finish operation after completions of batch.
    \Drupal::service('ln_pdh.importer')->toggleSolrSearchIndexingServer(TRUE);
    if ($success) {
      // Set up the link.
      $content_link = Link::fromTextAndUrl(
        t('(admin/content)'),
        Url::fromRoute('system.admin_content')
      );

      $rendered_message = Markup::create(t(
        'Synchronization successful. Check in Content @content to see the PDH products.',
        ['@content' => $content_link->toString()]));

      \Drupal::messenger()->addMessage($rendered_message);
    }
    else {
      \Drupal::messenger()->addMessage('Finished with an error.');
    }
  }

}
