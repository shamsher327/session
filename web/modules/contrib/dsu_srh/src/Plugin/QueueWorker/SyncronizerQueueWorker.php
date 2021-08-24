<?php

namespace Drupal\dsu_srh\Plugin\QueueWorker;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\dsu_srh\Controller\Importer;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Processes tasks for example module.
 *
 * @QueueWorker(
 *   id = "syncronizer_queue",
 *   title = @Translation("Syncronizer SRH"),
 *   cron = {"time" = 240}
 * )
 */
class SyncronizerQueueWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {

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
   *
   */
  public function __construct(ConfigFactory $configFactory, Json $serialization, Importer $importer) {
    $this->configFactory = $configFactory;
    $this->serialization = $serialization;
    $this->importer = $importer;

  }

  /**
   *
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('config.factory'),
      $container->get('serialization.json'),
      $container->get('dsu_srh.importer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($item) {
    // Start process to synchronize recipe
    $this->importer::syncroRecipes($item);
    Drupal::logger('SRH')
      ->notice('Imported recipes: ' . $item['total_imported'] . ' of ' . $item['total_to_import'] . '.');
  }

}
