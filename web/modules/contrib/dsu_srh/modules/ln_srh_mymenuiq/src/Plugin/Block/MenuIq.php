<?php

namespace Drupal\ln_srh_mymenuiq\Plugin\Block;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Path\CurrentPathStack;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\paragraphs\Entity\Paragraph;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Menu IQ' block.
 *
 * @Block(
 *   id = "ln_srh_mymenuiq",
 *   admin_label = @Translation("Menu IQ"),
 *   category = @Translation("Menu IQ"),
 *   module = "ln_srh_mymenuiq",
 * )
 */
class MenuIq extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Request stack.
   *
   * @var \Drupal\Core\Path\CurrentPathStack
   */
  protected $path;

  /**
   * String or number for main course id.
   *
   * @var string
   */
  const MAIN_COURSE_SRH_TAG_ID = 61;


  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $routeMatch;

  /**
   * The language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Constructs a new MyBlock.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param array $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   * @param \Drupal\Core\Path\CurrentPathStack $path
   *   The path service.
   * @param \Drupal\Core\Routing\CurrentRouteMatch $route_match
   *   The route manager service.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager service.
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, EntityTypeManagerInterface $entity_type_manager, CurrentPathStack $path, CurrentRouteMatch $route_match, LanguageManagerInterface $language_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->path = $path;
    $this->routeMatch = $route_match;
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('entity_type.manager'), $container->get('path.current'), $container->get('current_route_match'), $container->get('language_manager'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_path = $this->path->getPath();
    $exploded_path = explode('/', $current_path);
    $nid = end($exploded_path);
    $node_storage = $this->entityTypeManager->getStorage('node');
    $node_data = !empty($nid) ? $node_storage->load($nid) : [];
    $node_title = !empty($node_data) ? $node_data->getTitle() : '';
    global $base_url;
    $langcount = count($this->languageManager->getLanguages());
    $langcode = $this->languageManager->getCurrentLanguage()->getId();
    if ($langcount > 1 && !empty($langcode)) {
      $mymenuwidget_url = $base_url . '/' . $langcode;
    }
    else {
      $mymenuwidget_url = $base_url;
    }

    // Check if current recipes having main course id or not.
    if (!empty($node_data)) {
      // Avoid loading the block if the recipe score field is empty.
      if ($this->disableMenuIqBlockRule($node_data)) {
        return [];
      }
    }
    $recipe_settings = [];
    // Get values of Taxonomy from common utility module.
    $recipe_settings = ln_srh_mymenuiq_get_recipe_settings_term_fields();
    // Get Menu Flyout Heading.
    $menu_flyout_heading = !empty($recipe_settings['menu_flyout_heading']) ? $recipe_settings['menu_flyout_heading'] : '';

    // Get color code of widget arrow.
    $mymenu_iq_widget_arrow_color_code = !empty($recipe_settings['widget_arrow_color_code']) ? $recipe_settings['widget_arrow_color_code'] : '#ffed00';
    // Menu Flyout Subheading.
    $menu_flyout_subheading = !empty($recipe_settings['menu_flyout_subheading']) ? $recipe_settings['menu_flyout_subheading'] : '';
    // Balance improvement text.
    $balance_improvement_title = !empty($recipe_settings['balance_improvement_title']) ? $recipe_settings['balance_improvement_title'] : '';
    $balance_improvement_text = !empty($recipe_settings['balance_improvement_text']) ? $recipe_settings['balance_improvement_text'] : '';
    // Min Range for Room for Improvement Score.
    $min_range_balance_improvement = !empty($recipe_settings['min_value_balance_improvement']) ? $recipe_settings['min_value_balance_improvement'] : 0;
    // Max Value for Room for Improvement Score.
    $max_range_balance_improvement = !empty($recipe_settings['max_value_balance_improvement']) ? $recipe_settings['max_value_balance_improvement'] : '';
    // Room for Balance Improvement Description.
    $balance_improvement_description = !empty($recipe_settings['balance_improvement_description']) ? $recipe_settings['balance_improvement_description'] : '';
    // Good Balance text.
    $good_balance_title = !empty($recipe_settings['good_balance_title']) ? $recipe_settings['good_balance_title'] : '';
    $good_balance_text = !empty($recipe_settings['good_balance_text']) ? $recipe_settings['good_balance_text'] : '';
    // Min Value for Good Balance Nutritional Score.
    $min_value_good_balance = !empty($recipe_settings['min_value_good_balance']) ? $recipe_settings['min_value_good_balance'] : '';
    $max_value_good_balance = !empty($recipe_settings['max_value_good_balance']) ? $recipe_settings['max_value_good_balance'] : '';
    $good_balance_description = !empty($recipe_settings['good_balance_description']) ? $recipe_settings['good_balance_description'] : '';
    // Great Balance text.
    $great_balance_title = !empty($recipe_settings['great_balance_title']) ? $recipe_settings['great_balance_title'] : '';
    $great_balance_text = !empty($recipe_settings['great_balance_text']) ? $recipe_settings['great_balance_text'] : '';
    $min_value_great_balance = !empty($recipe_settings['min_value_great_balance']) ? $recipe_settings['min_value_great_balance'] : '';
    $max_value_great_balance = !empty($recipe_settings['max_value_great_balance']) ? $recipe_settings['max_value_great_balance'] : '';
    $great_balance_description = !empty($recipe_settings['great_balance_description']) ? $recipe_settings['great_balance_description'] : '';

    // Tex button open tips.
    $text_button_open_tips = !empty($recipe_settings['text_button_open_tips']) ? $recipe_settings['text_button_open_tips'] : '';
    // Accordion First Title.
    $accordion_first_title = !empty($recipe_settings['flyout_accordion_first_title']) ? $recipe_settings['flyout_accordion_first_title'] : '';
    // Accordion First Subtitle.
    $accordion_first_subtitle = !empty($recipe_settings['flyout_accordion_first_subtitle']) ? $recipe_settings['flyout_accordion_first_subtitle'] : '';
    // Accordion First Description.
    $accordion_first_description = !empty($recipe_settings['flyout_accordion_first_description']) ? $recipe_settings['flyout_accordion_first_description'] : '';
    // Accordion Second Title.
    $accordion_second_title = !empty($recipe_settings['flyout_accordion_second_title']) ? $recipe_settings['flyout_accordion_second_title'] : '';
    // Accordion First Second Title.
    $accordion_first_acc_min_max_title = !empty($recipe_settings['flyout_acoordion_first_second_title']) ? $recipe_settings['flyout_acoordion_first_second_title'] : '';
    // Disclaimer Text.
    $flyout_disclaimer_text = !empty($recipe_settings['flyout_disclaimer_text']) ? $recipe_settings['flyout_disclaimer_text'] : '';
    // Macronutrients.
    $pre_macro_field = !empty($recipe_settings['macronutrients_graph']) ? $recipe_settings['macronutrients_graph'] : '';
    // Disclaimer Text for Nutritional Breakup.
    $energy_breakdown_text = !empty($recipe_settings['energybreakdown_disclaimer']) ? $recipe_settings['energybreakdown_disclaimer'] : '';
    // Nutritional Finalization message.
    $overlay_nutritional_finalization_message = !empty($recipe_settings['mymenu_iq_finalization_msg']) ? $recipe_settings['mymenu_iq_finalization_msg'] : '';
    // Nutritional Tips Title.
    $nutritional_tips_title = !empty($recipe_settings['nutitional_tips_title']) ? $recipe_settings['nutitional_tips_title'] : '';
    // Nutritional tips points.
    $nutritional_tips = !empty($recipe_settings['nutritional_points']) ? $recipe_settings['nutritional_points'] : '';
    // If the recipe has nutritional tips points, it's mandatory to take it. In this case we'll override $nutritional_tips.
    if ($node_data && $node_data->hasField('field_recipe_nutritional_tip') && !empty($node_data->get('field_recipe_nutritional_tip')
        ->getValue())) {
      $paragraphs = $node_data->get('field_recipe_nutritional_tip')->getValue();
      foreach ($paragraphs as $paragraph) {
        $paragraph = Paragraph::load($paragraph['target_id']);
        $tips_from_recipe[] = $paragraph->field_title_speech_output->value;
      }
      $nutritional_tips = $tips_from_recipe;
    }
    // Process node.
    $type = (is_object($node_data)) ? $node_data->getType() : '';
    if ($type == 'recipe') {
      // Get nutritional score recipe node.
      if ($node_data->hasField('field_recipe_score') && !empty($node_data->get('field_recipe_score')
          ->first())) {
        $variables['nutritional_score'] = $node_data->get('field_recipe_score')
          ->first()
          ->get('value')
          ->getString();
      }
      if (!empty($variables['nutritional_score'])) {
        // Process here to pass text depending upon the nutritional score 0-44.
        if (($variables['nutritional_score'] >= $min_range_balance_improvement) && ($variables['nutritional_score'] <= $max_range_balance_improvement)) {
          $overlay_nutritional_balance_title = $balance_improvement_title;
          $overlay_nutritional_balance_text = $balance_improvement_text;
        }
        // Process here to pass text depending upon the nutritional score 45-69.
        if (($variables['nutritional_score'] >= $min_value_good_balance) && ($variables['nutritional_score'] <= $max_value_good_balance)) {
          $overlay_nutritional_balance_title = $good_balance_title;
          $overlay_nutritional_balance_text = $good_balance_text;
        }
        // Process here to pass text depending upon the
        // nutritional score 70-100.
        if (($variables['nutritional_score'] >= $min_value_great_balance) && ($variables['nutritional_score'] <= $max_value_great_balance)) {
          $overlay_nutritional_balance_title = $great_balance_title;
          $overlay_nutritional_balance_text = $great_balance_text;
        }
      }

      // Get macronutrients.
      if ($node_data->hasField('field_recipe_macronutrients')) {
        $field_recipe_nutrients = $node_data->get('field_recipe_macronutrients')
          ->getValue();
        // Get Total Sum of macronitrients.
        $nutrient_data = $this->getTotalSum($field_recipe_nutrients);
        $total_sum = $nutrient_data['sum'];
        $max_nutrient = $nutrient_data['key_of_max'];
        foreach ($field_recipe_nutrients as $value) {
          $target_id = $value['target_id'];
          $nutrient_paragraph = Paragraph::load($target_id);
          if ($nutrient_paragraph->get('field_para_macro_quantity')
              ->first() != NULL) {
            $actual_macro_quan = $nutrient_paragraph->get('field_para_macro_quantity')
                                   ->first()
                                   ->getValue()['value'];
            // Rounding off the quantity value.
            if ($nutrient_paragraph->hasField('field_para_macro_unit_type') && $nutrient_paragraph->get('field_para_macro_unit_type')
                ->first() != NULL) {
              $nutrients_unit_type_para = $nutrient_paragraph->get('field_para_macro_unit_type')
                                            ->getValue()[0]['target_id'];
              $unit_type_para = Paragraph::load($nutrients_unit_type_para);
              if ($actual_macro_quan > 1) {
                if ($unit_type_para->get('field_ingredient_unit_abbrevplur')
                    ->first() != NULL) {
                  $plural_unit_abbr = !empty($unit_type_para->get('field_ingredient_unit_abbrevplur')
                    ->first()
                    ->get('value')
                    ->getString()) ? $unit_type_para->get('field_ingredient_unit_abbrevplur')
                    ->first()
                    ->get('value')
                    ->getString() : '';
                  $plural_unit_name = !empty($unit_type_para->get('field_ingredient_unittype_plural')
                    ->first()
                    ->get('value')
                    ->getString()) ? $unit_type_para->get('field_ingredient_unittype_plural')
                    ->first()
                    ->get('value')
                    ->getString() : '';
                  $macroname_unit = !empty($plural_unit_abbr) ? $plural_unit_abbr : $plural_unit_name;
                }
              }
              else {
                if ($unit_type_para->get('field_ingredient_unit_abbrevsing')
                    ->first() != NULL) {
                  $singular_unit_abbr = !empty($unit_type_para->get('field_ingredient_unit_abbrevsing')
                    ->first()
                    ->get('value')
                    ->getString()) ? $unit_type_para->get('field_ingredient_unit_abbrevsing')
                    ->first()
                    ->get('value')
                    ->getString() : '';
                  $singular_unit_name = !empty($unit_type_para->get('field_ingredient_unittype_singul')
                    ->first()
                    ->get('value')
                    ->getString()) ? $unit_type_para->get('field_ingredient_unittype_singul')
                    ->first()
                    ->get('value')
                    ->getString() : '';
                  $macroname_unit = !empty($singular_unit_abbr) ? $singular_unit_abbr : $singular_unit_name;
                }
              }
            }
          }
          if ($nutrient_paragraph->get('field_para_macro_name')
              ->first() != NULL) {
            $macro_name = $nutrient_paragraph->get('field_para_macro_name')
                            ->first()
                            ->getValue()['value'];
          }

          if ($nutrient_paragraph->get('field_para_macro_display')
              ->first() != NULL) {
            $macro_display_name = $nutrient_paragraph->get('field_para_macro_display')
                                    ->first()
                                    ->getValue()['value'];
          }

          // Match pre-decided micronutrient value then set it to array.
          if (!empty($macro_name) && in_array($macro_name, $pre_macro_field)) {
            if ($macro_name == 'fat') {
              $fat_total = 9 * $actual_macro_quan;
              $fat_percentage = (int) ($fat_total * 100 / $total_sum);
              if ($max_nutrient == 'fat') {
                $fat_percentage = $fat_percentage + 1;
              }
              else {
                $fat_percentage = (int) ($fat_total * 100 / $total_sum);
              }
              $final = [
                'unit'    => round($actual_macro_quan, 1) . $macroname_unit,
                'percent' => $fat_percentage,
                'name'    => $macro_display_name,
              ];
            }
            if ($macro_name == 'protein') {
              $protein_total = 4 * $actual_macro_quan;
              $protein_percentage = (int) ($protein_total * 100 / $total_sum);
              if ($max_nutrient == 'protein') {
                $protein_percentage = $protein_percentage + 1;
              }
              else {
                $protein_percentage = (int) ($protein_total * 100 / $total_sum);
              }
              $final = [
                'unit'    => round($actual_macro_quan, 1) . $macroname_unit,
                'percent' => $protein_percentage,
                'name'    => $macro_display_name,
              ];
            }
            if ($macro_name == 'carbohydrates') {
              $carbo_total = 4 * $actual_macro_quan;
              $carbohydrates_percentage = (int) ($carbo_total * 100 / $total_sum);
              if ($max_nutrient == 'carbohydrates') {
                $carbohydrates_percentage = $carbohydrates_percentage + 1;
              }
              else {
                $carbohydrates_percentage = (int) ($carbo_total * 100 / $total_sum);
              }
              $final = [
                'unit'    => round($actual_macro_quan, 1) . $macroname_unit,
                'percent' => $carbohydrates_percentage,
                'name'    => $macro_display_name,
              ];
            }
            $quantity_unit = $final;
            $nutritional_data[$macro_name] = $quantity_unit;
          }
        }
      }

      // Final Nutritional Data.
      foreach ($nutritional_data as $value) {
        $final_breakup[] = $value;
      }
      // Array for Min Max Range for Nutritional Score.
      $accordion_nutritional_range_data = [
        'balance_improvement' => [
          'title'       => $balance_improvement_title,
          'text'        => $balance_improvement_text,
          'min'         => $min_range_balance_improvement,
          'max'         => $max_range_balance_improvement,
          'description' => $balance_improvement_description,
        ],
        'good_balance'        => [
          'title'       => $good_balance_title,
          'text'        => $good_balance_text,
          'min'         => $min_value_good_balance,
          'max'         => $max_value_good_balance,
          'description' => $good_balance_description,
        ],
        'great_balance'       => [
          'title'       => $great_balance_title,
          'text'        => $great_balance_text,
          'min'         => $min_value_great_balance,
          'max'         => $max_value_great_balance,
          'description' => $great_balance_description,
        ],
      ];
      // First Accordion Array.
      $accordian_first = [
        'title'                => $accordion_first_title,
        'subtitle'             => $accordion_first_subtitle,
        'description'          => $accordion_first_description,
        'min_max_data'         => $accordion_nutritional_range_data,
        'disclaimer_text'      => $flyout_disclaimer_text,
        'min_max_data_heading' => $accordion_first_acc_min_max_title,
      ];
      // Accordion second.
      $accordion_second = [
        'title'               => $accordion_second_title,
        'nutritional_breakup' => $final_breakup,
        'disclaimer_text'     => $energy_breakdown_text,
      ];

      // Nutritional Tips.
      $nutritional_tips = [
        'heading' => $nutritional_tips_title,
        'list'    => $nutritional_tips,
      ];
      // Recipe image.
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
      // Final Overlay Data.
      $overlay_data = [
        'nutritional_balance'              => str_replace('"', '', $overlay_nutritional_balance_title),
        'nutritional_balance_text'         => str_replace('"', '', $overlay_nutritional_balance_text),
        'nutritional_finalization_message' => str_replace('"', '', $overlay_nutritional_finalization_message),
        'overlay_subheading'               => $menu_flyout_subheading,
        'overlay_heading'                  => $menu_flyout_heading,
        'widget_arrow_color_code'          => $mymenu_iq_widget_arrow_color_code,
        'nutritional_score'                => $variables['nutritional_score'],
        'seperator_text'                   => $this->t('of'),
        'open_tips_button'                 => $text_button_open_tips,
        'accordion_first'                  => $accordian_first,
        'accordion_second'                 => $accordion_second,
        'nutritional_tips'                 => $nutritional_tips,
        'image_path'                       => $img_resized['small'] ? $img_resized['small'] : $img_resized,
        'image_path_medium'                => $img_resized['medium'] ? $img_resized['medium'] : $img_resized,
        'recipe_title'                     => $node_data->getTitle(),
      ];

      // Side dishes data.
      $recipe_id = $node_data->get('field_recipe_id')->getValue()[0]['value'];
      $side_dishes_menu = $this->getSideDishes($recipe_id, $recipe_settings);

      // Get recipe instructions final array.
      $recipe_menu_flyout = [
        '#theme'                   => 'my_menu_iq_block',
        '#nutritional_score'       => $variables['nutritional_score'],
        '#overlay'                 => $overlay_data,
        '#seperator_text'          => $this->t('of'),
        '#heading'                 => $menu_flyout_heading,
        '#widget_arrow_color_code' => $mymenu_iq_widget_arrow_color_code,
        '#subheading'              => $menu_flyout_subheading,
        '#recipe_name'             => $node_title,
        '#module_path'             => '/' . drupal_get_path('module', 'ln_srh_mymenuiq'),
        '#side_dishes_menu'        => $side_dishes_menu,
        '#attached'                => [
          'library'        => [
            'ln_srh_mymenuiq/mymenuiq',
          ],
          'drupalSettings' => [
            'recipeId'         => $recipe_id,
            'nutritionalScore' => $variables['nutritional_score'],
            'baseUrl'          => $mymenuwidget_url,
          ],
        ],
      ];

      return $recipe_menu_flyout;
    }
  }

  /**
   * Function to get total sum.
   */
  public function getTotalSum($field_recipe_nutrients) {
    foreach ($field_recipe_nutrients as $value) {
      $target_id = $value['target_id'];
      $nutrient_paragraph = Paragraph::load($target_id);
      if ($nutrient_paragraph->get('field_para_macro_quantity')
          ->first() != NULL) {
        $macro_quantity = $nutrient_paragraph->get('field_para_macro_quantity')
          ->first()
          ->get('value')
          ->getString();
      }
      if ($nutrient_paragraph->get('field_para_macro_name')->first() != NULL) {
        $macro_name = $nutrient_paragraph->get('field_para_macro_name')
                        ->first()
                        ->getValue()['value'];
      }
      if ($macro_name == 'fat') {
        $fat_total = 9 * $macro_quantity;
        // (int) ($fat_total * 100 / $total_sum);
        $fat_int_percent = 0;
        $fat_whole = floor($fat_total);
        $fat_fraction = $fat_total - $fat_whole;
      }
      if ($macro_name == 'carbohydrates') {
        $carbo_total = 4 * $macro_quantity;
        // (int) ($carbo_total * 100 / $total_sum);
        $carbo_int_percent = 0;
        $carbo_whole = floor($carbo_total);
        $carbo_fraction = $carbo_total - $carbo_whole;
      }
      if ($macro_name == 'protein') {
        $protein_total = 4 * $macro_quantity;
        // (int) ($protein_total * 100 / $total_sum);
        $protein_int_percent = 0;
        $protein_whole = floor($protein_total);
        $protein_fraction = $protein_total - $protein_whole;
      }
    }

    $total_sum = $protein_total + $carbo_total + $fat_total;
    $sum_percent = $fat_int_percent + $carbo_int_percent + $protein_int_percent;
    // If sum of percentages is les than 100.
    if ($sum_percent < 100) {
      $nutrient_arr = [
        'fat'           => $fat_fraction,
        'carbohydrates' => $carbo_fraction,
        'protein'       => $protein_fraction,
      ];
      $max_nutrient = max($nutrient_arr);
      arsort($nutrient_arr);
      $key_of_max = key($nutrient_arr);
    }
    else {
      $key_of_max = '';
    }

    $nutrient_arr = [
      'sum'        => $total_sum,
      'key_of_max' => $key_of_max,
    ];
    return $nutrient_arr;
  }

  /**
   * Function to get recipe side dishes.
   *
   * @param string $recipe_id
   *   The recipe id to get from database.
   * @param array $recipe_settings
   *   An array containing information about config page recipe.
   *
   * @return array
   *   An array of side dishes related to recipe passed in first param.
   */
  public function getSideDishes($recipe_id, array $recipe_settings) {
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
      $response = $client->request('GET', $url . '/recipe/' . $recipe_id . '/sidedishes', ['http_errors' => FALSE]);
      $code = $response->getStatusCode();
      $content = JSON::decode($response->getBody()->getContents());
    } catch (Exception $error) {
      $logger = Drupal::logger('SRH');
      $logger->notice('HTTP Client error getting side dishes: ' . $error->getMessage());
    }
    // Avoid render if no data.
    if ($code == '200') {
      $tabs = [];
      // Loop response data and and get side dishes types to construct the available tabs.
      foreach ($content as $value) {
        $idsidedishtype = $value['idsidedishtype'];
        if (is_numeric($idsidedishtype)) {
          $tabs[$idsidedishtype] = !empty($recipe_settings['side_dish_tab_' . $idsidedishtype . '_title']) ? $recipe_settings['side_dish_tab_' . $idsidedishtype . '_title'] : '';
        }
      }
      $side_dishes = [
        'response_code'   => 200,
        'side_dish_title' => !empty($recipe_settings['side_dish_title']) ? $recipe_settings['side_dish_title'] : '',
        'side_dish_tabs'  => $tabs,
      ];
      return $side_dishes;
    }
  }

  /**
   * Function to get the cache tags.
   */
  public function getCacheTags() {
    // With this when node change block will rebuild.
    if ($node = $this->routeMatch->getParameter('node')) {
      // If there is node add its cachetag.
      return Cache::mergeTags(parent::getCacheTags(), ['node:' . $node->id()]);
    }
    else {
      // Return default tags instead.
      return parent::getCacheTags();
    }
  }

  /**
   * Function to get the cache contexts.
   */
  public function getCacheContexts() {
    // Every new route this block will rebuild.
    return Cache::mergeContexts(parent::getCacheContexts(), ['route']);
  }

  /**
   * @param $node_data
   *
   * @return bool
   */
  public function disableMenuIqBlockRule($node_data) {
    if ($node_data->hasField('field_recipe_tag_course') && is_array($node_data->get('field_recipe_tag_course')
        ->referencedEntities())) {
      $reference_tags = $node_data->get('field_recipe_tag_course')
        ->referencedEntities();
      foreach ($reference_tags as $key => $term) {
        $check_match_main_course[$key] = ($term->get('field_recipe_tags_id')
          ->first()
          ->get('value')
          ->getString());
      }
    }
    // Avoid loading the block if the recipe score field is empty.
    if ((!in_array(self::MAIN_COURSE_SRH_TAG_ID, $check_match_main_course)) || ($node_data->hasField('field_recipe_score') && empty($node_data->get('field_recipe_score')
          ->first()))) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

}
