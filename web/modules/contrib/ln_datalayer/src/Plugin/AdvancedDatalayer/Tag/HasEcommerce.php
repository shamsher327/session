<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

/**
 * The basic "hasEcommerce" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "hasEcommerce",
 *   label = @Translation("Site has Ecommerce functionality"),
 *   description = @Translation("This parameter should be checked if site has Ecommerce functionality"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 2,
 * )
 */
class HasEcommerce extends DatalayerBoolBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
