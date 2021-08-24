<?php

namespace Drupal\dsu_srh\Controller;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 */
class SearchService extends ControllerBase {

  /**
   * Configuration state Drupal Site.
   *
   * @var array
   */

  protected $configFactory;

  /**
   * /* Particular configuration object of SRH importer.
   *
   * @var array
   */
  protected $config;

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
   * SearchService constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactory $configFactory
   * @param \Drupal\Component\Serialization\Json $serialization
   * @param \Drupal\dsu_srh\Controller\Importer $importer
   */
  public function __construct(ConfigFactory $configFactory, Json $serialization, Importer $importer) {
    $this->configFactory = $configFactory;
    $this->config = $this->configFactory->getEditable('dsu_srh.settings');
    $this->serialization = $serialization;
    $this->importer = $importer;

  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *
   * @return \Drupal\dsu_srh\Controller\SearchService|static
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('serialization.json'),
      $container->get('dsu_srh.importer')
    );
  }

  /**
   * Main search function.
   * This function recive optional parameters, and construct a call to SRH
   * with this parameters. Returns an array of recipes, or "no_results".
   */
  public function getRecipes($valid = '', $tags = [], $collection = '', $start = '0', $number = '5') {

    /*
     * Construct de complex query, with the brands configureds and the selected tags (if selected)
     */
    $complexQuery = $this->constructComplexQuery($tags);
    /*
     * We get the current lenguage and perform the search in the selected market lenguages *
     */
    $market = $this->getMarket();
    if ($market == 'no_market') {
      return $content = ['response' => $market];
    }
    $query = [
      'ciamnum'        => $this->config->get('dsu_srh.dsu_connect_ciamnum'),
      'q'              => $valid,
      'numRows'        => $number,
      'start'          => $start,
      'idEntity'       => 'recipes',
      'locale'         => $market['connect_markets'],
      'market'         => $this->config->get('dsu_srh.dsu_connect_market_code'),
      'complexQuery'   => $complexQuery,
      'collectionName' => $collection,
    ];
    Drupal::logger('SRH')
      ->notice('LANG; <pre><code>' . print_r($query, TRUE) . '</code></pre');
    $url = $this->config->get('dsu_srh.dsu_connect_url');
    $apikey = $this->config->get('dsu_srh.dsu_connect_apikey');
    $channel_id = $this->get('dsu_srh.dsu_connect_channel_id');
    /*
     * Perform the Call
     */
    $client = new Client([
      'headers' => [
        'x-api-key'    => $apikey,
        'x-channel-id' => $channel_id,
      ],
    ]);
    try {
      $response = $client->request('GET', $url . '/search', ['query' => $query]);
      $content = $this->serialization->decode($response->getBody()
        ->getContents());
    } catch (RequestException $e) {
      Drupal::logger('SRH')
        ->notice('Exception with message:  ' . $e->getMessage());
      $message = $this->t('Service not available, contact to admin');
    }
    if ($content['recipes']['numResults'] != '0' || $content['recipes']['numResults'] = NULL) {
      // Check if the recipes are migrated, if not, call importer.
      foreach ($content['recipes']['items'] as $key => $recipe) {
        /**
         * /* Check if recipe exists in local storage, if not, import it and load the Node
         */
        // Get Nid if recipe is exist or not.
        $entity_ids = Drupal::entityQuery('node')
          ->condition('type', 'recipe')
          ->condition('field_recipe_id', $recipe['id'])
          ->execute();
        $node_exists = Node::load($entity_ids[key($entity_ids)]);
        if ($node_exists == NULL) {
          $params = [
            'values' => $recipe['id'],
            'market' => $market,
          ];
          Drupal::logger('SRH')
            ->notice('PARAMS; <pre><code>' . print_r($params, TRUE) . '</code></pre');
          $this->importer::syncroRecipes($params);
          $node_exists = Node::load($entity_ids[key($entity_ids)]);
          // Once the recipe are migrated, we check if has the new tag ON.
          $recipe_isnew = $node_exists->get('field_recipe_isnew')->getValue();
          if ($recipe_isnew['0']['value'] == TRUE) {
            $content['recipes']['items'][$key]['isnew'] = TRUE;
          }
          else {
            $content['recipes']['items'][$key]['isnew'] = FALSE;
          }
        }
      }
      $content['response'] = 'ok';

      return $content;
    }
    else {
      return $content = ['response' => 'no_results'];
    }
  }

  /**
   * Match the current lenguage of the website with the market langcode.
   */
  public function constructComplexQuery($tags) {

    $brands = $this->config->get('dsu_srh.dsu_connect_brands');
    $brandsArray = explode(',', $brands);
    $tagsArray = $tags;
    $complexQuery = 'recipes@';
    if (!empty($tags)) {
      foreach ($tagsArray as $tagKey => $value) {
        if (!$value == '') {
          $complexQuery = $complexQuery . ' tag:' . $value;
          end($tagsArray);
          if ($tagKey === key($tagsArray)) {
            // If there are Branches, set the tag AND.
            if (!empty($brands)) {
              $complexQuery = $complexQuery . ' AND ';
            }
          }
          else {
            $complexQuery = $complexQuery . ' AND ';
          }
        }
      }
    }
    if (!empty($brands)) {
      $complexQuery = $complexQuery . 'brand:';
      foreach ($brandsArray as $brakey => $brand) {
        $brand = ltrim($brand);
        $complexQuery = $complexQuery . $brand;
        end($brandsArray);
        if ($brakey === key($brandsArray)) {
          $complexQuery = $complexQuery;
        }
        else {
          $complexQuery = $complexQuery . ' OR brand:';
        }
      }
    }
    if ($complexQuery == 'recipes@') {
      $complexQuery = '';
    }

    return $complexQuery;
  }

  /**
   * Construct de complexQuery using brands and tags parameter.
   */
  public function getMarket() {
    $language = Drupal::languageManager()->getCurrentLanguage()->getId();
    $locales = $this->config->get('dsu_srh.dsu_connect_locales');
    foreach ($locales as $key => $value) {
      if ($value['langcode'] == $language) {
        $market = $value;
        break;
      }
    }
    if ($market == NULL) {
      return 'no_market';
    }
    else {
      return $market;
    }
  }

}
