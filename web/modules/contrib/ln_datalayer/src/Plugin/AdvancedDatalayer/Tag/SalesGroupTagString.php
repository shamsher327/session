<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerNameBase;

/**
 * The basic "salesGroupTagString" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "salesGroupTagString",
 *   label = @Translation("Floodlight Sales Group Tag String"),
 *   description = @Translation("The Group Tag String for the site’s Floodlight Sales"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = FALSE,
 *   weight = 9,
 * )
 */
class SalesGroupTagString extends DatalayerNameBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
