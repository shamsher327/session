<?php

namespace Drupal\ln_bazaarvoice\Controller;

use DateTime;
use DateTimeZone;
use DOMDocument;
use Drupal;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Drupal\media\Entity\Media;
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductFeedController.
 *
 * @package Drupal\ln_bazaarvoice\Controller
 */
class ProductFeedController extends ControllerBase {

  /**
   * Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * ProductFeedController constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('config.factory'));
  }

  /**
   * Displaying data with XML format.
   *
   * @return \Symfony\Component\HttpFoundation\Response
   *   a custom response that contains raw XML.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   * @throws \Drupal\Core\Entity\EntityMalformedException
   */
  public function content() {
    $config = $this->configFactory->get('ln_bazaarvoice_feed.settings');

    // Initialize products feed example.
    $feeds = new DOMDocument('1.0', 'UTF-8');
    $feeds->preserveWhiteSpace = FALSE;
    $feeds->formatOutput = TRUE;

    /* create the root element of the xml tree */
    $xmlRoot = $feeds->createElement("Feed");

    $now = new DateTime(NULL, new DateTimeZone('UTC'));
    $xmlDate = $now->format("c");

    /* set attributes */
    $xmlRoot->setAttribute('name', $config->get('brand_external_id'));
    $xmlRoot->setAttribute('extractDate', $xmlDate);
    $xmlRoot->setAttribute('incremental', 'false');
    $xmlRoot->setAttribute('xmlns', 'http://www.bazaarvoice.com/xs/PRR/ProductFeed/5.6');

    /* append it to the document created */
    $xmlRoot = $feeds->appendChild($xmlRoot);

    // Define Brands structure.
    $brands = $xmlRoot->appendChild($feeds->createElement("Brands"));
    $brand = $brands->appendChild($feeds->createElement('Brand'));

    $brand->appendChild($feeds->createElement('Name', $config->get('brand_name')));
    $brand->appendChild($feeds->createElement('ExternalId', $config->get('brand_external_id')));

    // Define Categories structure.
    $categories = $feeds->createElement("Categories");
    $categories = $xmlRoot->appendChild($categories);

    // Get all category of recipe category.
    $recipe_cat_vid = 'ln_bazaarvoice_category';
    $terms_recipe_cat = Drupal::entityTypeManager()
      ->getStorage('taxonomy_term')
      ->loadTree($recipe_cat_vid);

    foreach ($terms_recipe_cat as $term_recipe_cat) {
      $term_recipe_cat_obj = Drupal::entityTypeManager()
        ->getStorage('taxonomy_term')
        ->load($term_recipe_cat->tid);

      $recipe_category = $feeds->createElement('Category');
      $recipe_category = $categories->appendChild($recipe_category);

      $recipe_category->appendChild($feeds->createElement('ExternalId', $term_recipe_cat_obj->get('field_bv_external_id')
        ->getString()));
      $recipe_cat_elm = $recipe_category->appendChild($feeds->createElement('Name'));
      $recipe_cat_elm->appendChild($feeds->createCDATASection($term_recipe_cat->name));

      // Get Image.
      if (!($term_recipe_cat_obj)->get('field_bv_image')->isEmpty()) {
        $file = $this->getFileUri($term_recipe_cat_obj->get('field_bv_image')
          ->first()
          ->get('target_id')
          ->getString());
        $file ? $recipe_category->appendChild($feeds->createElement('ImageUrl', $file)) : '';
      }

      // Get Category Page URL.
      if (!$term_recipe_cat_obj->get('field_bv_link_to')->isEmpty()) {
        $recipe_category->appendChild($feeds->createElement('CategoryPageUrl', Url::fromUri($term_recipe_cat_obj->get('field_bv_link_to')->uri)
          ->setAbsolute()
          ->toString()));
      }
    }

    // Getting Only Products.
    $nids = Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('type', 'dsu_product')
      ->execute();

    // Products feed initialize.
    $products = $feeds->createElement("Products");
    $products = $xmlRoot->appendChild($products);
    if (isset($nids)) {
      foreach ($nids as $nid) {
        $node = Node::load($nid);
        if (empty($node->id()) || $this->isSkipData($node)) {
          continue;
        }

        // Product feed initialize.
        $product = $feeds->createElement("Product");
        $product = $products->appendChild($product);

        // Get all products node and load field values.
        if ($node->hasField('field_dsu_bv_category')) {
          $field_dsu_category = !$node->get('field_dsu_bv_category')
            ->isEmpty() ? $node->get('field_dsu_bv_category')
            ->first()
            ->get('target_id')
            ->getString() : FALSE;

          if ($field_dsu_category) {
            $term = Term::load($field_dsu_category);
            if (is_object($term)) {
              $field_dsu_category_name = $term->getName();

              if ($term->hasField('field_bv_external_id')) {
                // Get Product Categories.
                $product->appendChild($feeds->createElement('CategoryExternalId', $term->get('field_bv_external_id')
                  ->getString()));
                $prd_cat_elm = $product->appendChild($feeds->createElement('CategoryName'));
                $prd_cat_elm->appendChild($feeds->createCDATASection($field_dsu_category_name));
              }
            }
          }

          // Get Product Name.
          $prd_name_elm = $product->appendChild($feeds->createElement('Name'));
          $prd_name_elm->appendChild($feeds->createCDATASection($node->getTitle()));
        }
        // Get Description.
        if ($node->hasField('field_dsu_product_desc')) {
          if (!$node->get('field_dsu_product_desc')->isEmpty()) {
            $prd_desc_alm = $product->appendChild($feeds->createElement('Description'));
            $prd_desc_alm->appendChild($feeds->createCDATASection(preg_replace('/\s\s+/', '', strip_tags($node->get('field_dsu_product_desc')
              ->first()
              ->get('value')
              ->getString()))));
          }
        }

        // Get Image.
        if ($node->hasField('field_dsu_image')) {
          if (!$node->get('field_dsu_image')->isEmpty()) {
            $file = $this->getFileUri($node->get('field_dsu_image')
              ->first()
              ->get('target_id')
              ->getString());
            $file ? $product->appendChild($feeds->createElement('ImageUrl', $file)) : '';
          }
        }
        // Get Product ID.
        if ($node->hasField('field_bv_product_id')) {
          $rating_id = !$node->get('field_bv_product_id')
            ->isEmpty() ? $node->get('field_bv_product_id')->getString() : '';
          $product->appendChild($feeds->createElement('ExternalId', $rating_id));

          // Get Product Page URL.
          $product->appendChild($feeds->createElement('ProductPageUrl', $node->toUrl()
            ->setAbsolute()
            ->toString()));
        }

        // Get Product EANs.
        if ($node->hasField('field_dsu_sku')) {
          if (!$node->get('field_dsu_sku')->isEmpty()) {
            $product_eans = $feeds->createElement('EANs');
            $product_eans = $product->appendChild($product_eans);
            foreach (explode(';', $node->get('field_dsu_sku')->value) as $sku_item) {
              $product_eans->appendChild($feeds->createElement('EAN', $sku_item));
            }
          }
        }
        // Get Product brand.
        if ($node->hasField('brand_external_id')) {
          $product->appendChild($feeds->createElement('BrandExternalId', $config->get('brand_external_id')));
        }
      }
    }

    $response = new Response();
    $response->setContent($feeds->saveXML());
    $response->headers->set('Content-Type', 'text/xml');

    return $response;
  }

  /**
   * Get uri of file by file id.
   *
   * @param int $file_id
   *   The file id.
   *
   * @return bool|string
   *   The Url of file, OR Null
   */
  protected function getFileUri($file_id) {
    $entity_image = Media::load($file_id);
    $field_name = ($entity_image->hasField('image')) ? 'image' : (($entity_image->hasField('field_media_image')) ? 'field_media_image' : 'field_media_image');
    if (!empty($entity_image) && !empty($entity_image->get($field_name)
        ->first())) {
      $image_file_id = $entity_image->get($field_name)
        ->first()
        ->get('target_id')
        ->getString();
      $image_file_id = File::load($image_file_id);
      $uri = $image_file_id->getFileUri();
    }


    return isset($uri) ? file_create_url($uri) : FALSE;
  }

  /**
   * Checking whether the node need to skip or not.
   *
   * @param mixed $node
   *   The node object.
   *
   * @return bool
   *   TRUE if eligible to processing, FALSE if not eligible.
   */
  protected function isSkipData($node) {
    return ($node->get('field_dsu_bv_category')->isEmpty());
  }

}
