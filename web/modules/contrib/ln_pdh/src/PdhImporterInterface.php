<?php

namespace Drupal\ln_pdh;

/**
 * Class PdhImporter.
 *
 * @package Drupal\ln_pdh
 */
interface PdhImporterInterface {

  /**
   * Checks if PDH connection is working.
   *
   * @return bool
   *   TRUE if successful, FALSE otherwise.
   */
  public function testConnection();

  /**
   * Synchronizes a product given a PDH product list item.
   *
   * @param object $product
   *   The product definition object.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function syncProduct($product);

  /**
   * Retrieves a list of products updated since a given date.
   *
   * @param \DateTime|null $since_date
   *   (Optional) The datetime for filtering updated products.
   *
   * @return array|false
   *   Array containing the returned products. FALSE if anything went wrong.
   */
  public function getProducts(\DateTime $since_date = NULL);

  /**
   * Toggles automatic node indexing ad-hoc to avoid performance issues.
   *
   * @param bool $status
   *   Boolean indicating whether indexing should be enabled or disabled.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function toggleSolrSearchIndexingServer($status);

}
