<?php

namespace Drupal\ln_exporter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\ln_exporter\Controller\Exporter;
use Symfony\Component\DependencyInjection\ContainerInterface;


class ExporterForm extends FormBase {

  /**
   * LN Exporter service.
   *
   * @var array
   */
  protected $exporter;

  /**
   * ExportForm constructor.
   *
   * @param \Drupal\ln_exporter\Controller\Exporter
   */
  public function __construct(Exporter $exporter) {
    $this->exporter = $exporter;

  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return \Drupal\Core\Form\FormBase|static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ln_exporter.exporter')
    );
  }

  /**
   * @inheritdoc
   */
  public function getFormId() {
    return 'ln_data_exporter_form';
  }

  /**
   * @inheritdoc
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $options = [];
    $type = [
      'dsu_article' => 'Articles',
      'dsu_product' => 'Products',
      'recipe' => 'Recipes',
    ];
    // Load cms content type.
    $content_types = array_keys(\Drupal::entityTypeManager()
      ->getStorage('node_type')
      ->loadMultiple());

    foreach ($type as $key => $label) {
      // Content type exist in cms.
      if (in_array($key, $content_types)) {
        $options[$key] = $label;
      }
    }

    $form['help_text'] = [
      '#type' => 'markup',
      '#markup' => 'This module exports a list of node ids for the selected content types below. ',
    ];

    $form['type'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Content type'),
      '#options' => $options,
      '#description' => $this->t('Choose the content type for the node id export required.'),
      '#required' => true,
    ];

    $form['status'] = [
      '#type' => 'select',
      '#title' => $this->t('Published status'),
      '#options' => ['All' => '- Any -', '1' => 'Published', '2' => 'Unpublished'],
	  '#default_value' => '1',
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Export'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $content_type = array_filter($form_state->getValue('type'));
    $status = ($form_state->getValue('status') == 1) ? '1' : (($form_state->getValue('status') == 2) ? '0' : '');

    $row_query = \Drupal::entityTypeManager()->getStorage('node');
    
    $node_ids =  $row_query->getQuery()->condition('type', $content_type, 'IN');
    if ($status !== '') {
      $node_ids = $node_ids->condition('status', $status);
    }
    $node_ids =  $node_ids->sort('nid', 'ASC')->execute();

    $nodes = $row_query->loadMultiple($node_ids);

    $batch = [
      'title' => t('Export Node Data...'),
      'operations' => [
        [
          '\Drupal\ln_exporter\Controller\Exporter::contentExport',
          [$nodes],
        ],
      ],
      'finished' => '\Drupal\ln_exporter\Controller\Exporter::contentExportFinishedCallback',
    ];
    batch_set($batch);
  }
}

