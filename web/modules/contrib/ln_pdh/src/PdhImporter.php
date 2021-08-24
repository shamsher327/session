<?php

namespace Drupal\ln_pdh;

use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Entity\EntityStorageException;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Logger\LoggerChannelTrait;
use Drupal\Core\State\StateInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Utility\Error;
use Drupal\file\FileInterface;
use Drupal\media\Entity\Media;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\search_api\Entity\Index;

/**
 * PDH Importer service.
 *
 * @package Drupal\ln_pdh
 */
class PdhImporter implements PdhImporterInterface {

  use LoggerChannelTrait;
  use StringTranslationTrait;

  /**
   * Configuration state Drupal Site.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * The PDH config  settings.
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $config;

  /**
   * The PDH connector service.
   *
   * @var \Drupal\ln_pdh\PdhConnectorInterface
   */
  protected $pdhConnector;

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The state service.
   *
   * @var \Drupal\Core\State\StateInterface
   */
  protected $state;

  /**
   * The file system service.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * PdhImporter constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config_factory
   *   Configuration state Drupal Site.
   * @param \Drupal\ln_pdh\PdhConnectorInterface $pdh_connector
   *   The PDH connector service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager service.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   * @param \Drupal\Core\State\StateInterface $state
   *   The state service.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   File System interface.
   */
  public function __construct(ConfigFactory $config_factory, PdhConnectorInterface $pdh_connector, EntityTypeManagerInterface $entity_type_manager, LanguageManagerInterface $language_manager, ModuleHandlerInterface $module_handler, StateInterface $state, FileSystemInterface $file_system) {
    $this->configFactory = $config_factory;
    $this->config = $this->configFactory->get('ln_pdh.settings');
    $this->pdhConnector = $pdh_connector;
    $this->entityTypeManager = $entity_type_manager;
    $this->languageManager = $language_manager;
    $this->moduleHandler = $module_handler;
    $this->state = $state;
    $this->fileSystem = $file_system;
  }

  /**
   * {@inheritdoc}
   */
  public function testConnection() {
    return $this->pdhConnector->testConnection();
  }

  /**
   * {@inheritdoc}
   */
  public function syncProduct($product) {
    // For each result we check if exists,
    // if needs to update or if needs to be created.
    if (isset($product->gtin)) {
      $product_info = $this->pdhConnector->getProductInfo($product->gtin, $product->label_version);
      // Avoid creating empty nodes.
      if ($product_info === FALSE) {
        return;
      }
      $storage = $this->entityTypeManager->getStorage('node');
      $entities = $storage->loadByProperties([
        'type' => 'dsu_product',
        'field_al_gtin' => $product->gtin,
      ]);

      if (!empty($entities)) {
        /** @var \Drupal\node\NodeInterface $node */
        $node = reset($entities);
        $this->saveProduct($product_info, $node);
      }
      else {
        // The Product doesn't exists locally. Importing it.
        $this->saveProduct($product_info);
      }
    }
  }

  /**
   * Saves product data given the full product info object and the Drupal node.
   *
   * @param \SimpleXMLElement $data
   *   Product data array.
   * @param \Drupal\node\NodeInterface|null $node
   *   (Optional) The node object. When provided, the node will be updated,
   *   otherwise a new node will be created.
   *
   * @return int
   *   Either SAVED_NEW or SAVED_UPDATED, depending on the operation performed.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   *   In case of failures an exception is thrown.
   */
  protected function saveProduct(\SimpleXMLElement $data, NodeInterface $node = NULL) {
    $langcode = $this->languageManager->getCurrentLanguage()->getId();

    // For checking empty objects.
    $empty_object = new \stdClass();
    $item_langcode = $this->config->get('auth.langcode');

    // Check for old nodes.
    if (!isset($node)) {
      /* Generating node entity, and setting the content from the recipe*/
      $node = Node::create(['type' => 'dsu_product']);
      $node->enforceIsNew();
      $node->setUnpublished();
    }

    // Agency.
    $agency_text = '';
    foreach ($data->xpath('//tradeItem//alternateItemIdentification') as $item) {
      if (isset($item->agency) && $item->agency == '90') {
        $agency_text = (string) $item->id;
        break;
      }
    }

    $consumerGenders = [];
    // Get target consumer gender list.
    foreach ($data->xpath('//marketingInformationModule//targetConsumerGender') as $item) {
      $consumerGenders[] = (string) $item;
    }

    // Get food and beverage ingredients.
    $ingredients = $data->xpath('//foodAndBeverageIngredientModule//foodAndBevIngredient');
    if (isset($data->foodAndBeverageIngredientModule->foodAndBevIngredient->ingredientName->{$item_langcode}) /*&& is_array($data->foodAndBeverageIngredientModule->foodAndBevIngredient->ingredientName)*/) {
      $ingredients = $data->foodAndBeverageIngredientModule->foodAndBevIngredient->ingredientName->{$item_langcode};
    }

    // Get number of servings pre package.
    if (isset($data->foodAndBeveragePreparationServingModule->numberOfServingsPerPackage) && isset($data->foodAndBeveragePreparationServingModule->measurementPrecisionOfNumberOfServingsPerPackage)) {
      $numberOfServings = (string) $data->foodAndBeveragePreparationServingModule->measurementPrecisionOfNumberOfServingsPerPackage .
                          ':' . (string) $data->foodAndBeveragePreparationServingModule->numberOfServingsPerPackage;
    }

    // Get Synonyms.
    $synonyms = [];
    foreach ($data->xpath('//marketingInformationModule//multi') as $item) {
      if (isset($item->tradeItemKeyWords)) {
        $synonyms[] = (string) $item->tradeItemKeyWords->{$item_langcode};
      }
    }
    $synonyms_text = implode(' ', $synonyms);

    // Get Benefits.
    $feature_benefits = [];
    foreach ($data->xpath('//marketingInformationModule//tradeItemFeatureBenefit') as $item) {
      if (isset($item->featureBenefit->{$item_langcode}) && $item->featureBenefit->{$item_langcode} != $empty_object) {
        $feature_benefits[] = (string) $item->featureBenefit->{$item_langcode};
      }
    }

    // Get Marketing Message (it will be an array).
    $marketing_messages = [];
    foreach ($data->xpath('//marketingInformationModule//marketingMessage') as $item) {
      if (isset($item->tradeItemMarketingMessage->{$item_langcode})) {
        $marketing_messages[] = (string) $item->tradeItemMarketingMessage->{$item_langcode};
      }
    }

    // Get the images.
    $product_images = [];
    $text_images = [];
    $i = 0;
    foreach ($data->xpath('//referencedFileDetailInformationModule//externalFileLink//uniformResourceIdentifier') as $image) {
      $i++;
      $txt_img = (string) $image;
      $product_images[] = $txt_img;
      if (strlen($txt_img) > 255) {
        continue;
      }
      $text_images[] = $txt_img;

    }

    /*
     * Map array to simplify the field mapping between PDH & Drupal.
     * This is the format
     *   'field_name_drupal' => [
     *     'path/to/property/in/pdh',
     *     "value if not set, default to ''",
     *   ]
     */
    $map = [
      'title' => [
        '//tradeItemDescriptionModule//shortDescription//' . $item_langcode,
        'No title',
      ],
      'field_dsu_product_desc' => [
        '//tradeItemDescriptionModule//productDescription//' . $item_langcode,
      ],
      'field_al_gtin' => [
        '//GTIN',
      ],
      'field_dsu_sku' => [
        '//GTIN',
      ],
      'field_pdh_label_version' => [
        '//PDHID',
      ],
      'field_al_sub_brand_text' => [
        '//tradeItemDescriptionModule//subBrand',
      ],
      'field_al_name_public_long' => [
        '//tradeItemDescriptionModule//productDescription//' . $item_langcode,
      ],
      'field_al_name_public_short' => [
        '//tradeItemDescriptionModule//shortDescription//' . $item_langcode,
      ],
      'field_al_product_benefits' => [
        '//tradeItemDescriptionModule//tradeItemDescriptionInformation//additionalDescription//' . $item_langcode,
      ],
      'field_al_nutrients' => [
        '//nutritionalInformationModule//multi//descriptionOnANutrient//' . $item_langcode,
      ],
      'field_al_allergens' => [
        '//allergenInformationModule//allergenRelatedInformation//allergenStatement//' . $item_langcode,
      ],
      'field_al_good_to_know' => [
        '//nonGDSN//label//compass//goodToKnow//' . $item_langcode,
      ],
      'field_al_good_question' => [
        '//nonGDSN//label//compass//goodQuestion//' . $item_langcode,
      ],
      'field_al_good_to_remember' => [
        '//nonGDSN//label//compass//goodToRemember//' . $item_langcode,
      ],
      'field_al_consumer_age' => [
        '//marketingInformationModule//targetConsumerAge//' . $item_langcode,
      ],
      'field_al_health_allegations' => [
        '//healthRelatedInformationModule//healthClaimDescription//' . $item_langcode,
      ],
      'field_al_coffee_variety' => [
        '//tradeItemDescriptionModule//tradeItemVariant//tradeItemVariantValue//' . $item_langcode,
      ],
    ];

    foreach ($map as $field => $config) {
      $value = $this->getDescendent($data, $config[0], isset($config[1]) ? $config[1] : '');
      $node->set($field, $value);
    }

    $node->set('path', '/product/' . $data->GTIN);
    $node->set('langcode', $langcode);
    $node->set('field_al_pictures_f', isset($text_images) ? $text_images : '');
    $node->set('field_al_supplier_code', isset($agency_text) ? $agency_text : '');
    $node->set('field_al_keywords', isset($synonyms_text) ? $synonyms_text : '');
    $node->set('field_al_consumer_gender', isset($consumerGenders) ? $consumerGenders : '');

    $node->set('field_al_number_of_servings', isset($numberOfServings) ? $numberOfServings : '');
    $node->set('field_al_ingredient_description', isset($ingredients) ? $ingredients : '');
    $node->set('field_al_description', isset($marketing_messages) ? $marketing_messages : '');
    $node->set('field_al_consumerbenefits', isset($feature_benefits) ? $feature_benefits : '');

    // hook_alter for adding products from outside of module.
    $this->moduleHandler->alter('ln_pdh_import', $node, $data);

    try {
      $node->save();

      // Get the images from the API response using node id for the subfolders.
      if (!empty($product_images)) {
        $images = [];

        $i = 0;
        foreach ($product_images as $image) {
          $i++;
          // If the image is not already in the system we
          // download and create the Media Entity.
          if (!empty($image) && !$this->imageExists($image, $node->id())) {
            $file = $this->downloadImage($image, $node->id(), $i);
            if ($file) {
              $images[] = [
                'target_id' => $this->mediaCreate(
                  $file,
                  $langcode, $node->getTitle()
                )->id(),
              ];
            }
          }
        }
        if (!empty($images)) {
          $current_images = $node->get('field_dsu_image')->getValue();
          $images = array_merge($current_images, $images);

          $node->set('field_dsu_image', $images);

          return $node->save();
        }
      }
    }
    catch (\Exception $e) {
      $this->getLogger('pdh_importer')
        ->notice('Cannot save node: ' . $e->getMessage());
      throw $e;
    }

  }

  /**
   * {@inheritdoc}
   */
  public function getProducts(\DateTime $since_date = NULL) {
    return $this->pdhConnector->getProducts($since_date);
  }

  /**
   * {@inheritdoc}
   */
  public function toggleSolrSearchIndexingServer($status) {
    // Get indexing for existing database server.
    if ($this->moduleHandler->moduleExists('search_api')) {
      $indexList = Index::loadMultiple();

      // Set and enable for indexing options.
      if ($status) {
        // Check if indexing server having list of index id.
        $indexHistory = $this->state->get('ln_pdh.search_indexes', []);
        if (!empty($indexHistory)) {
          foreach ($indexList as $index) {
            if (in_array($index->id(), $indexHistory)) {
              $index->setOption('index_directly', $status);
              $index->save();
            }
          }
        }
      }
      // Disable and keep history of indexing server for indexing options.
      elseif ($status === FALSE) {
        $indexList = Index::loadMultiple();
        foreach ($indexList as $index) {
          if ($index->getOption('index_directly')) {
            $indexHistory[] = $index->id();
            $index->setOption('index_directly', $status);
            $index->save();
          }
        }

        // Set if variable is exist.
        if (!empty($indexHistory) && isset($indexHistory)) {
          $this->state->set('ln_pdh.search_indexes', array_unique($indexHistory));
        }
      }
    }
  }

  /**
   * Gets a nested value in product object or a default value if does not exist.
   *
   * @param \SimpleXMLElement $product
   *   The product info object.
   * @param string $path
   *   The product object path in XPath format.
   * @param mixed $null_value
   *   Default value to return if the expected path is not valid.
   *
   * @return mixed
   *   The value stored in the given path.
   */
  protected function getDescendent(\SimpleXMLElement $product, string $path, $null_value = NULL) {
    $item = (is_array($product->xpath($path)) && isset($product->xpath($path)[0])) ? (string) $product->xpath($path)[0] : '';

    return (empty($item)) ? $null_value : $item;
  }

  /**
   * Downloads the given image to the right product folder.
   *
   * @param string $url
   *   The url of the image.
   * @param string $id
   *   The node id, to sort the images in subfolders.
   *
   * @param $i
   *   counter to rename the file if needed.
   *
   * @return false|\Drupal\file\FileInterface
   *   The File entity.
   */
  protected function downloadImage(string $url, $id,  $i) {
    $target_dir = $this->configFactory->get('system.file')->get('default_scheme') . '://pdh_product_images/' . $id;

    if ($this->fileSystem->prepareDirectory($target_dir, FileSystemInterface::CREATE_DIRECTORY | FileSystemInterface::MODIFY_PERMISSIONS)) {
      $info = pathinfo($url);
      $filename =  (strlen($info['basename']) > 255) ? 'image_' . $i . '.' . $info['extension'] : $info['basename'];
      $destination = $target_dir . DIRECTORY_SEPARATOR . $filename;

      return system_retrieve_file($url, $destination, TRUE, FileSystemInterface::EXISTS_REPLACE);
    }

    return FALSE;
  }

  /**
   * Checks if an image exists already.
   *
   * @param string $url
   *   The url of the image to be downloaded.
   * @param string $id
   *   The node id to know the subfolder.
   *
   * @return bool
   *   TRUE if the image is in the system, FALSE otherwise.
   */
  protected function imageExists(string $url, $id) {
    $target_dir = $this->configFactory->get('system.file')->get('default_scheme') . '://pdh_product_images/' . $id;

    return file_exists($target_dir . DIRECTORY_SEPARATOR . pathinfo($url, PATHINFO_BASENAME));
  }

  /**
   * Creates the Media entity with the File.
   *
   * @param \Drupal\file\FileInterface $file
   *   File entity referenced by the Media.
   * @param string $langcode
   *   Langcode of the content.
   * @param string $title
   *   Node title to use it.
   *
   * @return \Drupal\media\Entity\Media|false
   *   The Media entity.
   */
  protected function mediaCreate(FileInterface $file, string $langcode, string $title) {
    $media = Media::create([
      'bundle' => 'image',
      'langcode' => $langcode,
      'name' => $file->label(),
    ]);
    // We saw different versions of the entity with different fields.
    if ($media->hasField('field_media_image')) {
      $media->set('field_media_image', [
        'target_id' => $file->id(),
        'alt' => $this->t('Picture of %title', ['%title' => $title]),
        'title' => $this->t('Picture of %title', ['%title' => $title]),
      ]);
    }
    elseif ($media->hasField('image')) {
      $media->set('image', [
        'target_id' => $file->id(),
        'alt' => $this->t('Picture of %title', ['%title' => $title]),
        'title' => $this->t('Picture of %title', ['%title' => $title]),
      ]);
    }
    $media->setPublished();
    try {
      $media->save();
    }
    catch (EntityStorageException $e) {
      $variables = Error::decodeException($e);
      $this->getLogger('pdh_importer')->log(isset($variables['severity']) ? $variables['severity'] : 'error', 'Cannot save image. %type: @message in %function (line %line of %file). <br /> @backtrace_string', $variables);

      return FALSE;
    }

    return $media;
  }

}
