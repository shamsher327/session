<?php

namespace Drupal\ln_bazaarvoice\Service;

use Drupal\Core\Entity\EntityInterface;

/**
 * Ligtnest Bazaarvoice interface to extend or getting services.
 */
interface LnBazaarvoiceServiceInterface {

  /**
   * Get entity locale Codes.
   */
  public function getEntityLocale(EntityInterface $entity);

  /**
   * Replace entity code with mapping required for bazaarvoice api.
   */
  public function getBazaarvoiceLocaleCode($locale);

  /**
   * Get current language code for entity.
   */
  public function getBazaarvoiceLangCode();

}
