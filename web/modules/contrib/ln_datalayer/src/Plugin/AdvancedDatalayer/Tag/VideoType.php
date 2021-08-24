<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerNameBase;

/**
 * The basic "VideoType" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "videoType",
 *   label = @Translation("Video type"),
 *   description = @Translation("This parameter should contain the official Nestlé Video type of the website (e.g., Promo, Explainer, Recipe, etc.)"),
 *   group = "siteInformation",
 *   global = TRUE,
 *   required = TRUE,
 *   translatable = FALSE,
 *   show_empty = FALSE,
 *   weight = 19,
 * )
 */
class VideoType extends DatalayerNameBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
