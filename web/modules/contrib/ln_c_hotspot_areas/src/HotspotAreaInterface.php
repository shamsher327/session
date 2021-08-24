<?php

namespace Drupal\ln_c_hotspot_areas;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Interface HotspotAreaInterface.
 *
 * @ingroup ln_c_hotspot_areas
 *
 * @package Drupal\ln_c_hotspot_areas
 */
interface HotspotAreaInterface extends ContentEntityInterface {

  /**
   * Returns the target image with applied style.
   *
   * @return string
   *   Uuid/id of target.
   */
  public function getTarget();

  /**
   * Returns the uid of user that created hotspot.
   *
   * @return mixed
   */
  public function getUid();

  /**
   * Returns title of the hotspot.
   *
   * @return string
   *   Hotspot title.
   */
  public function getTitle();

  /**
   * Sets new title of the hotspot.
   *
   * @param string $title
   *  New title.
   */
  public function setTitle($title);

  /**
   * Returns description of the hotspot.
   *
   * @return string
   *   Hotspot description.
   */
  public function getDescription();

  /**
   * Sets new description of the hotspot.
   *
   * @param $description
   *   New description.
   */
  public function setDescription($description);

  /**
   * Returns description format of the hotspot.
   *
   * @return string
   *   Hotspot description format.
   */
  public function getDescriptionFormat();

  /**
   * Sets new description of the hotspot format.
   *
   * @param $format
   *   New description format.
   */
  public function setDescriptionFormat($format);

  /**
   * Returns link of the hotspot.
   *
   * @return string
   *   Hotspot link.
   */
  public function getLink();

  /**
   * Sets new link of the hotspot.
   *
   * @param $url
   *   Url of new link.
   */
  public function setLink($url);

  /**
   * Returns link title of the hotspot.
   *
   * @return string
   *   Hotspot link.
   */
  public function getLinkTitle();

  /**
   * Sets new link title of the hotspot.
   *
   * @param $url
   *   Url of new link.
   */
  public function setLinkTitle($url);

  /**
   * Returns shape of the hotspot.
   *
   * @return string
   *   Hotspot link.
   */
  public function getShape();

  /**
   * Sets shape of the hotspot.
   *
   * @param $url
   *   Url of new link.
   */
  public function setShape($url);

  /**
   * Returns mouse behaviour of the hotspot.
   *
   * @return string
   *   Hotspot link.
   */
  public function getMouseBehaviour();

  /**
   * Sets mouse behaviour of the hotspot.
   *
   * @param $url
   *   Url of new link.
   */
  public function setMouseBehaviour($url);

  /**
   * Returns hotspot base coordinates.
   *
   * @return array
   *   Array with X and Y keys for coordinates.
   */
  public function getCoordinates();

  /**
   * Sets new coordinates for hotspot.
   *
   * @param array $coordinates
   *   Array with X and Y keys for new coordinates
   */
  public function setCoordinates(array $coordinates);

  /**
   * Load all hotspots that referencing to selected fid of field with style.
   *
   * @param $values
   *   An array with keys: 'field_name', 'fid', 'image_style'.
   *
   * @return array
   *   An array with hotspots.
   */
  public static function loadByTarget($values);

}
