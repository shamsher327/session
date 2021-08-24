<?php

namespace Drupal\ln_quiz_advanced\Services;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Logger\LoggerChannelInterface;
use Symfony\Component\Yaml\Yaml;
use Drupal\ln_quiz_advanced\Exception\NonexistentInitialConfigException;
use Drupal\Core\File\FileSystemInterface;

/**
 * Provides methods to rewrite configuration.
 */
class ConfigReplace implements ConfigReplaceInterface {

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * A logger channel.
   *
   * @var \Drupal\Core\Logger\LoggerChannelInterface
   */
  protected $logger;

  /** @var \Drupal\Core\File\FileSystemInterface */
  protected $fileSystem;

  /**
   * Constructs a new ConfigReplacer.
   * @param \Drupal\Core\File\FileSystemInterface $fileSystem
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Logger\LoggerChannelInterface $logger
   *   A logger channel.
   */
  public function __construct(FileSystemInterface $fileSystem, ConfigFactoryInterface $config_factory, ModuleHandlerInterface $module_handler, LoggerChannelInterface $logger) {
    $this->configFactory = $config_factory;
    $this->moduleHandler = $module_handler;
    $this->logger = $logger;
    $this->fileSystem = $fileSystem;
  }

  /**
   * @param $module
   *
   * @throws \Drupal\ln_quiz_advanced\Exception\NonexistentInitialConfigException
   */
  public function rewriteModuleConfig($module,$dir='rewrite') {
    // Load the module extension.
    $extension = $this->moduleHandler->getModule($module);

    // Config rewrites are stored in 'modulename/config/rewrite_dir'.
    $dir_base = $extension->getPath() . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $dir;

    $this->rewriteDirectoryConfig($extension, $dir_base);
  }

  /**
   * @param $extension
   * @param $rewrite_dir
   *
   * @throws \Drupal\ln_quiz_advanced\Exception\NonexistentInitialConfigException
   */
  protected function rewriteDirectoryConfig($extension, $rewrite_dir) {
    // Scan the rewrite directory for rewrites.
    if (file_exists($rewrite_dir) && $files = $this->fileScanDirectory($rewrite_dir, '/^.*\.yml$/i', ['recurse' => FALSE])) {
      foreach ($files as $file) {
        // Parse the rewrites and retrieve the original config.
        $rewrite = Yaml::parse(file_get_contents($rewrite_dir . DIRECTORY_SEPARATOR . $file->name . '.yml'));
        $config = $this->configFactory->getEditable($file->name);
        $original_data = $config->getRawData();

        $rewrite = $this->rewriteConfig($original_data, $rewrite, $file->name, $extension->getName());

        // Retain the original 'uuid' and '_core' keys if it's not explicitly
        // asked to rewrite them.
        if (isset($rewrite['config_replace_uuids'])) {
          unset($rewrite['config_replace_uuids']);
        }
        else {
          foreach (['_core', 'uuid'] as $key) {
            if (isset($original_data[$key])) {
              $rewrite[$key] = $original_data[$key];
            }
          }
        }

        // Save the rewritten configuration data.
        $result = $config->setData($rewrite)->save() ? 'rewritten' : 'not rewritten';

        // Log a message indicating whether the config was rewritten or not.
        $this->logger->notice('@config @result by @module', ['@config' => $file->name, '@result' => $result, '@module' => $extension->getName()]);
      }
    }
  }

  /**
   * @param array $original_config
   * @param array $rewrite
   * @param string $configName
   * @param string $extensionName
   *
   * @return array
   * @throws \Drupal\ln_quiz_advanced\Exception\NonexistentInitialConfigException
   */
  public function rewriteConfig($original_config, $rewrite, $configName, $extensionName) {
    if (empty($original_config)) {
      $log = 'Tried to replace config @config by @module module without initial config.';
      $this->logger->error($log, ['@config' => $configName, '@module' => $extensionName]);
      throw new \Exception("Tried to replace config $configName by $extensionName module without initial config.");
    }

    if (isset($rewrite['config_replace']) && $rewrite['config_replace'] == 'replace') {
      return $rewrite;
    }
    return NestedArray::mergeDeep($original_config, $rewrite);
  }

  /**
   * Wraps file_scan_directory().
   *
   * @param $dir
   *   The base directory or URI to scan, without trailing slash.
   * @param $mask
   *   The preg_match() regular expression for files to be included.
   * @param $options
   *   An associative array of additional options.
   *
   * @return array
   *   An associative array (keyed on the chosen key) of objects with 'uri',
   *   'filename', and 'name' properties corresponding to the matched files.
   */
  protected function fileScanDirectory($dir, $mask, $options = array()) {
    return $this->fileSystem->scanDirectory($dir, $mask, $options);
  }

}
