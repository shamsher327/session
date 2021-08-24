<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerNameBase;

/**
 * The basic "floodlightAdvertiserID" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "floodlightAdvertiserID",
 *   label = @Translation("Parent Advertiser ID"),
 *   description = @Translation("This parameter should contain the official Nestlé Advertiser ID for Floodlight added on the site"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = FALSE,
 *   weight = 1,
 * )
 */
class FloodlightAdvertiserID extends DatalayerNameBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
