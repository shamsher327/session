<?php

namespace Drupal\noreferrer\Plugin\Filter;

use Drupal\Component\Utility\Html;
use Drupal\Component\Utility\UrlHelper;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a filter to apply the noreferrer attribute.
 *
 * @Filter(
 *   id = "noreferrer",
 *   title = @Translation("Add rel=&quot;noopener&quot; and/or rel=&quot;noreferrer&quot; to links"),
 *   description = @Translation("Adds <code>rel=&quot;noopener&quot;</code> to links with a target and/or <code>rel=&quot;noreferrer&quot;</code> to non-whitelisted links."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 *   weight = 10
 * )
 */
class NoReferrerFilter extends FilterBase implements ContainerFactoryPluginInterface {

  /**
   * Contains the configuration object factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs No Referrer filter.
   *
   * @param array $configuration
   *   Plugin configuration.
   * @param string $plugin_id
   *   Plugin ID.
   * @param mixed $plugin_definition
   *   Plugin definition.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ConfigFactoryInterface $config_factory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   Container.
   * @param array $configuration
   *   Plugin configuration.
   * @param string $plugin_id
   *   Plugin ID.
   * @param mixed $plugin_definition
   *   Plugin definition.
   *
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $modified = FALSE;
    $result = new FilterProcessResult($text);
    $html_dom = Html::load($text);
    $links = $html_dom->getElementsByTagName('a');
    $config = $this->configFactory->get('noreferrer.settings');
    $noopener = $config->get('noopener');
    $noreferrer = $config->get('noreferrer');
    foreach ($links as $link) {
      $types = [];
      if ($noopener && $link->getAttribute('target') !== '') {
        $types[] = 'noopener';
      }
      if ($noreferrer && ($href = $link->getAttribute('href')) && UrlHelper::isExternal($href) && !noreferrer_is_whitelisted($href)) {
        $types[] = 'noreferrer';
      }
      if ($types) {
        $rel = $link->getAttribute('rel');
        foreach ($types as $type) {
          $rel .= $rel ? " $type" : $type;
        }
        $link->setAttribute('rel', $rel);
        $modified = TRUE;
      }
    }
    if ($modified) {
      $result->setProcessedText(Html::serialize($html_dom));
    }
    return $result;
  }

}
