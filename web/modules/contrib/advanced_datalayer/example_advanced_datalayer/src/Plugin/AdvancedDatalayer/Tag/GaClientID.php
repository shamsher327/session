<?php

namespace Drupal\example_advanced_datalayer\Plugin\AdvancedDatalayer\Tag;

use Drupal\advanced_datalayer\Plugin\AdvancedDatalayer\Tag\DatalayerDynamicNameBase;

/**
 * The basic "gaClientID" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "ga_client_id",
 *   label = @Translation("GA client ID"),
 *   description = @Translation("This  parameter  should  contain  the  User's  GA  Client  ID.    This  is automatically generated by Google Analytics and stored  in a cookie on the user's system"),
 *   group = "site_Information",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 4,
 * )
 */
class GaClientID extends DatalayerDynamicNameBase {
  // Nothing here yet. Just a placeholder class for a plugin
  // GA will be calculated on JS side.
}
