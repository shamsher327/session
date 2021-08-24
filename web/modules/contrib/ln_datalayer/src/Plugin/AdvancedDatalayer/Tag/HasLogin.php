<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

/**
 * The basic "hasLogin" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "hasLogin",
 *   label = @Translation("Site has Login functionality"),
 *   description = @Translation("This parameter should be checked if site has Login functionality"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 3,
 * )
 */
class HasLogin extends DatalayerBoolBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
