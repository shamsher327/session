<?php

namespace Drupal\ln_datalayer\Plugin\AdvancedDatalayer\Tag;

/**
 * The basic "hasCouponPrint" datalayer tag.
 *
 * @AdvancedDatalayerTag(
 *   id = "hasCouponPrint",
 *   label = @Translation("Site has Coupon Print functionality"),
 *   description = @Translation("This parameter should be checked if site has Coupon Print functionality"),
 *   group = "doubleClickData",
 *   global = TRUE,
 *   required = FALSE,
 *   translatable = FALSE,
 *   show_empty = TRUE,
 *   weight = 5,
 * )
 */
class HasCouponPrint extends DatalayerBoolBase {
  // Nothing here yet. Just a placeholder class for a plugin.
}
