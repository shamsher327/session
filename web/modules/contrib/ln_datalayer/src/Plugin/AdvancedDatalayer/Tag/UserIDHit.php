<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerDynamicNameBase;

/**
 * The basic "userID_Hit" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "userID_Hit",
 *   label = @Translation("User ID"),
 *   description = @Translation("This parameter should contain current user ID"),
 *   group = "userInformation",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 2,
 * )
 */
class UserIDHit extends DatalayerDynamicNameBase {

  /**
   * {@inheritdoc}
   */
  public function processValue($value) {
    return 'ID' . \Drupal::currentUser()->id();
  }

}
