<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerNameBase;

/**
 * The basic "countGroupTagString" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "countGroupTagString",
 *   label = @Translation("Floodlight Count Group Tag String"),
 *   description = @Translation("The Group Tag String for the site’s Floodlight Count"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = FALSE,
 *   weight = 9,
 * )
 */
class CountGroupTagString extends DatalayerNameBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
