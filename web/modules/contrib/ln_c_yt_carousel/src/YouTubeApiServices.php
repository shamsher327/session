<?php

namespace Drupal\ln_c_yt_carousel;

use DateInterval;
use DateTime;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Youtube API services.
 */
class YouTubeApiServices {

  /**
   * YouTube API endpoint.
   *
   * @var string
   */
  protected $endPoint;

  /**
   * Config Factory services object.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $config;

  /**
   * Maximum number of videos to fetch from playlist.
   *
   * @var int
   */
  protected $maxVideos;

  /**
   * Cache services.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cacheServices;

  /**
   * YouTube services constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Config factory object.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cacheBackend
   *   The cache services.
   */
  public function __construct(ConfigFactoryInterface $configFactory, CacheBackendInterface $cacheBackend) {
    $this->config = $configFactory;
    $this->cacheServices = $cacheBackend;
    $this->maxVideos = 0;
  }

  /**
   * Get Google API key.
   */
  public function setEndpoint($endpoint) {
    $this->endPoint = $endpoint;
  }

  /**
   * Get Google API key.
   */
  public function getApiKey() {

    $getApiKey = $this->config->get('ln_c_yt_carousel.settings')->get('api_key');

    if ($getApiKey != NULL) {
      return $getApiKey;
    }

  }

  /**
   * Get maxmimum videos to be display.
   *
   * @param int $max
   *   Maximum number of videos to be fetched.
   */
  public function setMaxVideos($max) {
    $this->maxVideos = $max;
  }

  /**
   * Get YouTube vides in a playlist.
   *
   * @param string $playlistId
   *   YouTube Playlist ID.
   *
   * @return null|string
   *   Array containing youtube data.
   */
  public function getVideosbyPlaylist($playlistId) {

    $apikey = $this->getApiKey();

    if ($apikey != NULL && $playlistId != NULL) {

      // Set the YouTube API endpoint.
      $this->setEndpoint("https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=$this->maxVideos&playlistId=$playlistId&key=$apikey");

      $content = file_get_contents($this->endPoint);

      $jsonData = Json::decode($content);

      if ($jsonData !== NULL) {
        $data = [];
        $items_count = count($jsonData['items']);

        for ($i = 0; $i < $items_count; $i++) {

          $videoId     = $jsonData['items'][$i]['snippet']['resourceId']['videoId'];
          $videoTitle  = $jsonData['items'][$i]['snippet']['title'];
          $thumbnail   = $jsonData['items'][$i]['snippet']['thumbnails']['high']['url'];
          $description = $jsonData['items'][$i]['snippet']['description'];

          $data[$i]['video_id'] = $videoId;
          $data[$i]['video_title'] = $videoTitle;
          $data[$i]['thumbnail'] = $thumbnail;
          $data[$i]['description'] = $description;
        }
        return $data;
      }
    }
    else {
      return NULL;
    }
  }

  /**
   * Get Current video that display on page.
   *
   * @param string $videoIds
   *   Comma separated Video Ids.
   *
   * @return array
   *   Array containing youtube data.
   */
  public function getVideobyIds($videoIds) {
    $apikey = $this->getApiKey();

    if ($apikey != NULL && $videoIds != NULL) {
      $this->setEndpoint("https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$videoIds&key=$apikey");

      $content = file_get_contents($this->endPoint);

      $jsonData = Json::decode($content);

      if ($jsonData !== NULL) {
        $data = [];
        $items_count = count($jsonData['items']);

        for ($i = 0; $i < $items_count; $i++) {
          $videoId     = $jsonData['items'][$i]['id'];
          $videoTitle  = $jsonData['items'][$i]['snippet']['title'];
          $thumbnail   = $jsonData['items'][$i]['snippet']['thumbnails']['high']['url'];
          $description = $jsonData['items'][$i]['snippet']['description'];

          $data[$i]['video_id'] = $videoId;
          $data[$i]['video_title'] = $videoTitle;
          $data[$i]['thumbnail'] = $thumbnail;
          $data[$i]['description'] = $description;

        }
        return $data;
      }
    }
    else {
      return NULL;
    }
  }

  /**
   * Get videos by searched keyword in a specified youtube channel.
   *
   * @param string $channelIds
   *   YouTube Channel ID in which keyword needs to be searched.
   * @param string $keyword
   *   Search keyword.
   * @param null|string $pageToken
   *   Next or Prev page token.
   * @param int $maxResults
   *   Maximum number of results per page.
   *
   * @return array
   *   Array containing youtube data.
   */
  public function getVideosBySearchOnChannel($channelIds, $keyword, $pageToken = NULL, $maxResults = 10) {
    $apikey = $this->getApiKey();

    if ($apikey != NULL && $channelIds != NULL) {
      $endPoint = "https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=$channelIds&q=$keyword&key=$apikey&maxResults=$maxResults";

      // Check if the pageToken is present.
      if (!empty($pageToken)) {
        $endPoint = $endPoint . "&&pageToken=$pageToken";
      }

      $this->setEndpoint($endPoint);

      $content = file_get_contents($this->endPoint);

      $jsonData = Json::decode($content);

      if ($jsonData !== NULL) {
        $data = [];

        // Accumulate metadata about search results.
        $data['metadata'] = [
          'totalResults' => $jsonData['pageInfo']['totalResults'],
          'prevPageToken' => $jsonData['prevPageToken'] ?? NULL,
          'nextPageToken' => $jsonData['nextPageToken'] ?? NULL,
        ];

        $items_count = count($jsonData['items']);

        for ($i = 0; $i < $items_count; $i++) {
          if ($jsonData['items'][$i]['id']['kind'] == 'youtube#video') {
            $videoUrl    = 'https://www.youtube.com/watch?v=' . $jsonData['items'][$i]['id']['videoId'];
            $videoTitle  = $jsonData['items'][$i]['snippet']['title'];
            $description = $jsonData['items'][$i]['snippet']['description'];
            $thumbnail   = $jsonData['items'][$i]['snippet']['thumbnails']['high']['url'];

            $data[$i]['url'] = $videoUrl;
            $data[$i]['title'] = $videoTitle;
            $data[$i]['thumbnail'] = $thumbnail;
            $data[$i]['description'] = $description;
          }
        }
        return $data;
      }
    }
    else {
      return NULL;
    }
  }

  /**
   * Convert youtube time to human readable format.
   *
   * @param string $video_id
   *   Video ID of youtube.
   *
   * @return string
   *   Youtube time in text
   *
   * @throws \Exception
   */
  public function getVideoDuration($video_id): string {
    $apikey = $this->getApiKey();

    if ($apikey != NULL && $video_id != NULL) {
      $this->setEndpoint("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$video_id&key=$apikey");

      $content = file_get_contents($this->endPoint);

      $jsonData = Json::decode($content);

      if ($jsonData !== NULL) {
        $youtube_time = $jsonData['items'][0]['contentDetails']['duration'];
        // Unix epoch.
        $start = new DateTime('@0');
        $start->add(new DateInterval($youtube_time));
        return $start->format('H:i:s');

      }
    }

    return '';
  }

}
