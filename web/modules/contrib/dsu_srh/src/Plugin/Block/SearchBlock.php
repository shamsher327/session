<?php

namespace Drupal\dsu_srh\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'search recipe' block.
 *
 * @Block(
 *   id = "search_recipes",
 *   admin_label = @Translation("Recipes block"),
 *   category = @Translation("Recipes block ")
 * )
 */
class SearchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = Drupal::formBuilder()
      ->getForm('Drupal\dsu_srh\Form\RecipeSearch');

    return $form;
  }

}
