<?php

/**
 * Implements hook_drush_command().
 */
function indedene_common_drush_command() {
  $commands['indegene-run'] = [
    'description' => 'Rebuild aggregate css/js files',
    'aliases' => ['ir'],
  ];

  return $commands;
}

/**
 * Drush command logic for rebuilding file cache.
 *
 */
function indegene_common_command_pack_indegene_run() {
  drush_print(dt('Wrong argument. Possible arguments: js, css or use command without argument.'));

}
