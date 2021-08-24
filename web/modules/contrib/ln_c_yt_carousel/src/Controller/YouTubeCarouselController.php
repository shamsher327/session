<?php

namespace Drupal\ln_c_yt_carousel\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\ln_c_yt_carousel\YouTubeApiServices;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * YouTube carousel Controller class.
 *
 * @package Drupal\ln_c_yt_carousel\Controller
 */
class YouTubeCarouselController extends ControllerBase {
  /**
   * Current Request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $currentRequest;

  /**
   * The YouTube API services.
   *
   * @var \Drupal\ln_c_yt_carousel\YouTubeApiServices
   */
  protected $youTubeServices;

  /**
   * Creates a custom YouTube search block instance.
   *
   * @param \Drupal\ln_c_yt_carousel\YouTubeApiServices $youtube_services
   *   YouTube API services.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request
   *   Current request object.
   */
  public function __construct(YouTubeApiServices $youtube_services, RequestStack $request) {
    $this->youTubeServices = $youtube_services;
    $this->currentRequest = $request->getCurrentRequest();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('youtube.api'),
      $container->get('request_stack')
    );
  }

  /**
   * Returns YouTube video data from given pageToken.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   Ajax response with ne
   */
  public function getPagebyPageToken() {

    // Collect all the parameters from url.
    $channelId = $this->currentRequest->get('channelId');
    $keyword = $this->currentRequest->get('keyword');
    $pageToken = $this->currentRequest->get('pageToken');
    $page = $this->currentRequest->get('pageType');
    $maxResults = $this->currentRequest->get('maxResults');
    $pagerCounter = $this->currentRequest->get('pageCounter');

    // Request youtube for data.
    $videoData = $this->youTubeServices->getVideosBySearchOnChannel($channelId, $keyword, $pageToken, $maxResults);

    // Update pager counter.
    switch ($page) {
      case 'prev':
        $pagerCounter--;
        break;

      case 'next':
        $pagerCounter++;
        break;
    }

    // Update the URL parameters for generating the previous and next urls.
    $default_url_params = [
      'channelId' => $channelId,
      'keyword' => $keyword,
      'maxResults' => $maxResults,
      'pageCounter' => $pagerCounter,
    ];

    // Create the next URL.
    $nextPageUrl = $default_url_params + [
      'pageType' => 'next',
      'pageToken' => $videoData['metadata']['nextPageToken'],
    ];

    // Prepare response.
    $response = new AjaxResponse();

    // Provide a selector.
    $selector = '#youtube-search-block';

    // Update the block render array with latest paramteres.
    $content = [
      '#theme' => 'youtube_search_block',
      '#youtube_data' => $videoData,
      '#pagecounter' => $pagerCounter,
      '#nextpageurl' => Url::fromRoute('youtube_api.pager', [], ['query' => $nextPageUrl])->toString(),
      '#maxresults' => $maxResults,
      '#keyword' => $this->currentRequest->get('keyword'),
      '#attached' => ['library' => ['core/drupal.ajax']],
    ];

    // Add prev page url only if prevpagetoken is available in YouTube response.
    if ($videoData['metadata']['prevPageToken']) {
      $prevPageUrl = $default_url_params + [
        'pageType' => 'prev',
        'pageToken' => $videoData['metadata']['prevPageToken'],
      ];

      $content['#prevpageurl'] = Url::fromRoute('youtube_api.pager', [], ['query' => $prevPageUrl])->toString();
    }

    // Set commands to replace the HTML.
    $response->addCommand(new ReplaceCommand($selector, $content));

    return $response;
  }

}
