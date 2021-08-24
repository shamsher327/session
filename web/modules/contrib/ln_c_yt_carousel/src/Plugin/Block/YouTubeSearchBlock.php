<?php

namespace Drupal\ln_c_yt_carousel\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\ln_c_yt_carousel\YouTubeApiServices;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a 'YouTube Search' configurable block.
 *
 * @Block(
 *   id = "youtube_search",
 *   admin_label = @Translation("YouTube Search block")
 * )
 */
class YouTubeSearchBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The YouTube API services.
   *
   * @var \Drupal\ln_c_yt_carousel\YouTubeApiServices
   */
  protected $youTubeServices;

  /**
   * Current Request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $currentRequest;

  /**
   * Creates a custom YouTube search block instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\ln_c_yt_carousel\YouTubeApiServices $youtube_services
   *   YouTube API services.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   Current request object.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, YouTubeApiServices $youtube_services, RequestStack $request) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->youTubeServices = $youtube_services;
    $this->currentRequest = $request->getCurrentRequest();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('youtube.api'),
      $container->get('request_stack')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'channel' => '',
      'items-per-page' => 10,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form['channel'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Enter channel ID'),
      '#default_value' => $this->configuration['channel'],
      '#required' => TRUE,
    ];

    $form['items-per-page'] = [
      '#type' => 'number',
      '#title' => $this->t('Youtube Item Per Page'),
      '#default_value' => $this->configuration['items-per-page'],
      '#description' => $this->t('Maximum number of results per page'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['channel'] = $form_state->getValue('channel');
    $this->configuration['items-per-page'] = $form_state->getValue('items-per-page');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $keyword = $this->currentRequest->get('keyword');
    $videoData = NULL;

    // Fetch the data from youtube.
    if (!empty($keyword)) {
      $videoData = $this->youTubeServices->getVideosBySearchOnChannel($this->configuration['channel'], $keyword, NULL, $this->configuration['items-per-page']);
    }

    // As this will be first page of search results, create the next page url.
    $nextPageUrl = [
      'channelId' => $this->configuration['channel'],
      'keyword' => $keyword,
      'maxResults' => $this->configuration['items-per-page'],
      'pageCounter' => 1,
      'pageType' => 'next',
      'pageToken' => $videoData['metadata']['nextPageToken'],
    ];

    // Create the block's render array.
    $build = [
      '#theme' => 'youtube_search_block',
      '#youtube_data' => $videoData,
      '#pagecounter' => 1,
      '#nextpageurl' => Url::fromRoute('youtube_api.pager', [], ['query' => $nextPageUrl])->toString(),
      '#maxresults' => $this->configuration['items-per-page'],
      '#keyword' => $keyword,
      '#attached' => ['library' => ['core/drupal.ajax']],
    ];

    return $build;
  }

}
