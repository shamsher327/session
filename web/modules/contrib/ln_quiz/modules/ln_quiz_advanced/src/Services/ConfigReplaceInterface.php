<?php

namespace Drupal\ln_quiz_advanced\Services;


/**
 * Provides methods to rewrite configuration.
 */
interface ConfigReplaceInterface {

  /**
   * Rewrites configuration for a given module.
   *
   * @param $module
   *   The name of a module (without the .module extension).
   */
  public function rewriteModuleConfig($module);

  /**
   * @param array $original_config
   * @param array $rewrite
   * @param string $configName
   * @param string $extensionName
   *
   * @return array
   * @throws \Drupal\config_replace\Exception\NonexistentInitialConfigException
   */
  public function rewriteConfig($original_config, $rewrite, $configName, $extensionName);

}
