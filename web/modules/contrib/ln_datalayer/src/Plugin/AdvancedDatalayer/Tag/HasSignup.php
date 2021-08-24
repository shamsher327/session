<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

/**
 * The basic "hasSignup" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "hasSignup",
 *   label = @Translation("Site has Signup functionality"),
 *   description = @Translation("This parameter should be checked if site has Signup functionality"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 4,
 * )
 */
class HasSignup extends DatalayerBoolBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
