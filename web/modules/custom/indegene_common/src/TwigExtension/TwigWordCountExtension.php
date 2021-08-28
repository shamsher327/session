<?php

namespace Drupal\indegene_common;

use Drupal\block\Entity\Block;
use Drupal\user\Entity\User;
use Drupal\node\Entity\Node;

/**
 * Class DefaultService.
 *
 * @package Drupal\demo_module
 */
class TwigWordCountExtension extends \Twig_Extension {

  /**
   * {@inheritdoc}
   * This function must return the name of the extension. It must be unique.
   */
  public function getName() {
    return 'indegene_name_print';
  }

  /**
   * In this function we can declare the extension function.
   */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('indegene_name_print', [
        $this,
        'indegene_name_print',
      ], ['is_safe' => ["html"]]),
    ];
  }

  /*
  * This function is used to return alt of an image
  * Set image title as alt.
  */
  public function indegene_name_print($data) {

    return 'shamsher';
  }

}