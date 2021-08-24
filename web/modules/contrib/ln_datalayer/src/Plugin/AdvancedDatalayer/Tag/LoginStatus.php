<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerDynamicNameBase;

/**
 * The basic "loginStatus" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "loginStatus",
 *   label = @Translation("Login status"),
 *   description = @Translation("This parameter should contain current user Login status"),
 *   group = "userInformation",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 3,
 * )
 */
class LoginStatus extends DatalayerDynamicNameBase {

  /**
   * {@inheritdoc}
   */
  public function processValue($value) {
    // Return string true or false for bool tags.
    return \Drupal::currentUser()->id() ? 'true' : 'false';
  }

}
