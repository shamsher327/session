<?php

namespace Drupal\ln_c_hotspot_areas\Plugin\QueueWorker;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Deletes hotspots in queue on CRON run.
 *
 * @QueueWorker(
 *   id = "cron_ln_c_hotspot_areas_deletion",
 *   title = @Translation("Cron hotspot areas deletion"),
 *   cron = {"time" = 10}
 * )
 */
class CronHotspotAreasWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {

  /**
   * The image hotspots storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $hotspotsStorage;

  /**
   * @inheritdoc
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityStorageInterface $hotspots_storage) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->hotspotsStorage = $hotspots_storage;
  }

  /**
   * @inheritdoc
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')->getStorage('hotspot_area')
    );
  }

  /**
   * @inheritdoc
   */
  public function processItem($data) {
    $hotspot = $this->hotspotsStorage->load($data['hid']);
    if (!is_null($hotspot)) {
      $hotspot->delete();
    }
  }

}
