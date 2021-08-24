<?php

namespace Drupal\ln_srh_mymenuiq\Controller;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\paragraphs\Entity\Paragraph;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;


class MyMenuIqController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new MyBlock.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  public function getDishes($recipe_id, $nutritional_score, $dish_type) {

    $build = [
      '#theme'             => 'my_menu_iq_side_dishes',
      '#nutritional_score' => $nutritional_score,
      '#side_dishes'       => $this->getSideDishes($recipe_id, $dish_type),
    ];

    return new Response(render($build));

  }

  /**
   * Function to get recipe side dishes
   *
   * @param $recipe_id
   * The recipe id to get from database
   *
   * @return array
   * Returns an array containing info about side dishes related with the recipe
   *   passed in first param
   *
   */
  public function getSideDishes($recipe_id, $dish_type) {
    $recipe_settings = ln_srh_mymenuiq_get_recipe_settings_term_fields();
    $config = Drupal::service('config.factory')
      ->getEditable('dsu_srh.settings');
    $url = $config->get('dsu_srh.dsu_connect_url');
    $apikey = $config->get('dsu_srh.dsu_connect_apikey');
    $client = new Client([
      'headers' => [
        'x-api-key' => $apikey,
      ],
    ]);
    try {
      $response = $client->request('GET', $config->get('dsu_srh.dsu_connect_url') . '/recipe/' . $recipe_id . '/sidedishes', ['http_errors' => FALSE]);
      $content = JSON::decode($response->getBody()->getContents());
    } catch (Exception $error) {
      $logger = Drupal::logger('SRH');
      $logger->notice('HTTP Client error getting side dishes: ' . $error->getMessage());
    }

    $side_dishes = [
      'side_dish_added_message'    => !empty($recipe_settings['side_dish_added_message']) ? $recipe_settings['side_dish_added_message'] : '',
      'side_dish_removed_message'  => !empty($recipe_settings['side_dish_removed_message']) ? $recipe_settings['side_dish_removed_message'] : '',
      'side_dish_to_add_message'   => !empty($recipe_settings['side_dish_to_add_message']) ? $recipe_settings['side_dish_to_add_message'] : '',
      'side_dish_to_remove_messag' => !empty($recipe_settings['side_dish_to_remove_messag']) ? $recipe_settings['side_dish_to_remove_messag'] : '',
    ];
    // Loop response data and make a query to get node id from recipe id
    $counter = 0;
    foreach ($content as $value) {
      $counter++;
      if ($value['idsidedishtype'] == $dish_type) {
        // Check if it is a full recipe or a generic item.
        if (isset($value['idrecipe'])) {
          $database = \Drupal::database();
          $query = $database->select('node', 'n');
          $query->join('node__field_recipe_id', 'f', 'n.nid = f.entity_id');
          $query
            ->fields('n', ['nid'])
            ->fields('f', ['field_recipe_id_value'])
            ->condition('f.field_recipe_id_value', $value['idrecipe']);
          $result = $query
            ->execute()
            ->fetchAssoc();
          // If recipe is in Drupal database, we construct a variable to pass data to template
          if ($result) {
            $nid = $result['nid'];
            $field_recipe_id_value = $result['field_recipe_id_value'];
            $node_storage = $this->entityTypeManager->getStorage('node');
            $node_data = $node_storage->load($nid);
            $field_recipe_total_time = $node_data->field_recipe_total_time->getValue()[0]['value'];
            $field_recipe_difficult_level = $node_data->field_recipe_difficulty->getValue()[0]['value'];
            $field_image = $node_data->field_recipe_images->getValue();
            $img_resized = '';
            foreach ($field_image as $image) {
              $image = Paragraph::load($image['target_id']);
              $mime_type = $image->field_media_info_mime_type->getValue()[0]['value'];
              $is_image = strpos($mime_type, 'image/');
              if (is_numeric($is_image) && $is_image === 0) {
                $image_path = $image->field_media_info_path->getValue()[0]['value'];
                // Get resized image.
                $img_resized = recipe_img_dynamic_urls($image_path, [
                  'small'  => '_126_126',
                  'medium' => '_708_600',
                ]);
              }
            }
            $alias = Drupal::service('path_alias.manager')
              ->getAliasByPath('/node/' . $nid);
            $side_dishes['dishtype'][$value['idsidedishtype']][] = [
              'title'             => $value['title'],
              'total_time'        => isset($field_recipe_total_time)
                ? $field_recipe_total_time . ' Min' : '',
              'difficulty_level'  => $field_recipe_difficult_level,
              'image_path'        => $img_resized['small'] ? $img_resized['small'] : $img_resized,
              'image_path_medium' => $img_resized['medium'] ? $img_resized['medium'] : $img_resized,
              'recipe_path'       => $alias,
              'score'             => $value['myMenuIQ']['score'],
              'nid'               => $field_recipe_id_value,
              'is_generic'        => FALSE,
              'side_dish_type'    => $value['sidedishtype'],

            ];
          }
        }
        else {  // It is a generic item.
          $img_resized = $value['complementMetadata']['media'] ? $value['complementMetadata']['media'] : '';
          $side_dishes['dishtype'][$value['idsidedishtype']][] = [
            'title'             => $value['title'],
            'image_path'        => $img_resized,
            'image_path_medium' => $img_resized,
            'recipe_path'       => "",
            'score'             => $value['myMenuIQ']['score'],
            'nid'               => $counter,
            'is_generic'        => TRUE,
            'side_dish_type'    => $value['sidedishtype'],
          ];
        }
      }
    }
    return $side_dishes;
  }

}
