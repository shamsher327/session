<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerNameBase;

/**
 * The basic "pageType" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "pageType",
 *   label = @Translation("Page type"),
 *   description = @Translation("This parameter should contain the type of page (ex node type or taxonomy vacabulary.)"),
 *   group = "pageInformation",
 *   global = FALSE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = FALSE,
 *   weight = 3,
 * )
 */
class PageType extends DatalayerNameBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
