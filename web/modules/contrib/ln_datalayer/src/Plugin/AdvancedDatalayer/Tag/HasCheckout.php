<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

/**
 * The basic "hasCheckout" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "hasCheckout",
 *   label = @Translation("Site has Checkout functionality"),
 *   description = @Translation("This parameter should be checked if site has Checkout functionality"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 6,
 * )
 */
class HasCheckout extends DatalayerBoolBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
