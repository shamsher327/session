<?php

namespace Drupal\dsu_srh\Commands;

use Drupal;
use Drupal\dsu_srh\Controller\Importer;
use Drush\Commands\DrushCommands;

/**
 * Class GetRecipes.
 *
 * Drush 9 commands.
 *
 * @package Drupal\dsu_srh\Commands
 */
class GetRecipes extends DrushCommands {

  /**
   * Get recipes from Smart Recipe Hub.
   *
   * @command dsu_srh:synchronize
   * @aliases srh-sync
   */
  public function synchronize() {
    // Get all configs of default srh configs.
    $config = Drupal::service('config.factory')->getEditable('dsu_srh.settings');

    // Updated type and overriding value of sync type in case of cron.
    $cron_update_type = $config->get('dsu_srh.dsu_connect_cron_sync_update_type');
    $config->set('dsu_srh.dsu_connect_last_update_type', $cron_update_type)->save();

    // Get activated queue values.
    $interval = $config->get('dsu_srh.dsu_connect_interval');
    $last_run = Drupal::state()->get('dsu_srh.last_run');
    $now = time();
    if ($last_run < ($now - $interval - 1)) {
      $groups = Importer::getAllId();
      $queue = Drupal::queue('syncronizer_queue');
      $queue->createQueue();
      $total_to_import = count($groups) * $config->get('dsu_srh.dsu_connect_amount');
      $total_imported = 0;
      foreach ($groups as $key => $values) {
        $total_imported += $config->get('dsu_srh.dsu_connect_amount');
        $values['total_imported'] = $total_imported;
        $values['total_to_import'] = $total_to_import;
        $queue->createItem($values);
      }
      // Run queue
      Importer::runQueue('syncronizer_queue');
      Drupal::state()->set('dsu_srh.last_run', time());
    }
  }

}
