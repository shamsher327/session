<?php

namespace Drupal\ln_c_hotspot_areas\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\ln_c_hotspot_areas\HotspotAreaInterface;

/**
 * Defines the image hotspot area entity class.
 *
 * @ingroup ln_c_hotspot_areas
 *
 * @ContentEntityType(
 *   id = "hotspot_area",
 *   label = @Translation("Hotspot Area"),
 *   base_table = "hotspot_area",
 *   entity_keys = {
 *     "id" = "hid",
 *     "label" = "title",
 *     "uuid" = "uuid",
 *   }
 * )
 */
class HotspotArea extends ContentEntityBase implements HotspotAreaInterface {

  /**
   * @inheritdoc
   */
  public function getTarget() {
    return [
      'field_name' => $this->field_name->getValue()[0]['target_id'],
      'fid' => $this->fid->getValue()[0]['target_id'],
      'image_style' => $this->image_style->getValue()[0]['target_id'],
      'entity_id' => $this->entity_id->getValue()[0]['target_id'],
      'lang' => $this->lang->getValue()[0]['target_id'],
    ];
  }

  /**
   * @inheritdoc
   */
  public function getUid() {
    return $this->uuid->value;
  }

  /**
   * @inheritdoc
   */
  public function getTitle() {
    return $this->title->value;
  }

  /**
   * @inheritdoc
   */
  public function setTitle($title) {
    $this->title->value = $title;
  }

  /**
   * @inheritdoc
   */
  public function getDescription() {
    return $this->description->value;
  }

  /**
   * @inheritdoc
   */
  public function setDescription($description) {
    $this->description->value = $description;
  }

  /**
   * @inheritdoc
   */
  public function getDescriptionFormat() {
    return $this->description->format;
  }

  /**
   * @inheritdoc
   */
  public function setDescriptionFormat($format) {
    $this->description->format = $format;
  }

  /**
   * @inheritdoc
   */
  public function getLink() {
    return $this->link->value;
  }

  /**
   * @inheritdoc
   */
  public function setLink($url) {
    $this->link->value = $url;
  }

  /**
   * @inheritdoc
   */
  public function getLinkTitle() {
    return $this->link_title->value;
  }

  /**
   * @inheritdoc
   */
  public function setLinkTitle($url) {
    $this->link_title->value = $url;
  }

  /**
   * @inheritdoc
   */
  public function getShape() {
    return $this->shape->value;
  }

  /**
   * @inheritdoc
   */
  public function setShape($url) {
    $this->shape->value = $url;
  }

  /**
   * @inheritdoc
   */
  public function getMouseBehaviour() {
    return $this->mouse_behaviour->value;
  }

  /**
   * @inheritdoc
   */
  public function setMouseBehaviour($url) {
    $this->mouse_behaviour->value = $url;
  }

  /**
   * @inheritdoc
   */
  public function getCoordinates() {
    return [
      'x' => $this->x->value,
      'y' => $this->y->value,
      'x2' => $this->x2->value,
      'y2' => $this->y2->value,
    ];
  }

  /**
   * @inheritdoc
   */
  public function setCoordinates(array $coordinates) {
    $this->x->value = $coordinates['x'];
    $this->y->value = $coordinates['y'];
    $this->x2->value = $coordinates['x2'];
    $this->y2->value = $coordinates['y2'];
  }

  /**
   * @inheritdoc
   */
  public static function loadByTarget($values) {
    $storage = \Drupal::entityTypeManager()->getStorage('hotspot_area');
    return $storage->loadByProperties($values);
  }

  /**
   * @inheritdoc
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['hid'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Hid'))
      ->setDescription(t('The hotspot area id.'))
      ->setReadOnly(TRUE)
      ->setSetting('unsigned', TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('Uuid'))
      ->setDescription(t('The hotspot area uuid.'))
      ->setReadOnly(TRUE);

    $fields['field_name'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Image field with hotspot area'))
      ->setDescription(t('The id of image field with the hotspot area.'))
      ->setSetting('target_type', 'field_config');

    $fields['fid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('File Id'))
      ->setDescription(t('Image file id.'))
      ->setSetting('target_type', 'file');

    $fields['image_style'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Image style'))
      ->setDescription(t('Image style.'))
      ->setSetting('target_type', 'image_style');

    $fields['entity_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Entity'))
      ->setDescription(t('Entity where the hotspot was created'))
      ->setSetting('target_type', 'node');

    $fields['lang'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Language'))
      ->setDescription(t('Language used to create the hotspot'));

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('User Id'))
      ->setDescription(t('The id of user that created hotspot area.'))
      ->setSetting('target_type', 'user');

    $fields['shape'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Shape'))
      ->setDescription(t('Shape of the hotspot area: square or circle.'));

    $fields['mouse_behaviour'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Mouse'))
      ->setDescription(t('Mouse behaviour: click or over'));

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('Title of the hotspot.'));

    $fields['description'] = BaseFieldDefinition::create('text_long')
      ->setLabel(t('Description'))
      ->setDescription(t('Description of the hotspot area.'));

    $fields['link'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Link'))
      ->setDescription(t('link of the hotspot area.'));

    $fields['link_title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Link title'))
      ->setDescription(t('link title of the hotspot area.'));

    $fields['x'] = BaseFieldDefinition::create('float')
      ->setLabel(t('X coordinate'))
      ->setDescription(t('The X coordinate of hotspot area.'))
      ->setSetting('unsigned', TRUE);

    $fields['y'] = BaseFieldDefinition::create('float')
      ->setLabel(t('Y coordinate'))
      ->setDescription(t('The Y coordinate of hotspot area.'))
      ->setSetting('unsigned', TRUE);

    $fields['y2'] = BaseFieldDefinition::create('float')
      ->setLabel(t('Y2 coordinate'))
      ->setDescription(t('The Y2 coordinate of hotspot area.'))
      ->setSetting('unsigned', TRUE);

    $fields['x2'] = BaseFieldDefinition::create('float')
      ->setLabel(t('X2 coordinate'))
      ->setDescription(t('The X2 coordinate of hotspot area.'))
      ->setSetting('unsigned', TRUE);

    return $fields;
  }

}
