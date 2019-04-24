<?php

namespace Drupal\mentee\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Mentee entity.
 *
 * @ingroup mentee
 *
 * @ContentEntityType(
 *   id = "mentee",
 *   label = @Translation("Mentee"),
 *   base_table = "mentee",
 *   admin_permission = "administer mentee entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "name" = "name",
 *   },
 *   field_ui_base_route = "mentee.settings"
 * )
 */

class Mentee extends ContentEntityBase implements MenteeInterface {

  /**
   * {@inheritdoc}
   */
  public function getMenteeName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $return = [$this->get('name')->value];
    if (trim($this->get('telephone')->value) != "") {
      $return[] = trim($this->get('telephone')->value);
    }
    if (trim($this->get('attendance_number')->value) != "") {
      $return[] = trim($this->get('attendance_number')->value);
    }
    if (trim($this->get('score')->value) != "") {
      $return[] = trim($this->get('score')->value);
    }
    return implode(" - ", $return);
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTelephone() {
    return $this->get('telephone')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTelephone($telephone) {
    $this->set('telephone', $telephone);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAttendanceNumber() {
    return $this->get('attendance_number')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setAttendanceNumber($attendance_number) {
    $this->set('attendance_number', $attendance_number);
    return $this;
  }

  public function getScore() {
    return $this->get('score')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setScore($score) {
    $this->set('score', $score);
    return $this;
  }

 

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Name'))
      ->setDescription(new TranslatableMarkup('The name of the Director.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setStorageRequired(TRUE)
      ->setRequired(TRUE);

    $fields['telephone'] = BaseFieldDefinition::create('telephone')
      ->setName('telephone')
      ->setLabel(new TranslatableMarkup('Telephone'))
      ->setSettings([])
      ->setDisplayOptions('form', [
        'weight' => 2,
      ]);

      $fields['attendace_number'] = BaseFieldDefinition::create('integer')
    ->setLabel(new TranslatableMarkup('Name'))
    ->setDescription(new TranslatableMarkup('Mentee\'s attencdance number.'))
    ->setSettings([
      'max_length' => 255,
      'text_processing' => 0,
    ])
    ->setDefaultValue('')
    ->setDisplayOptions('view', [
      'label' => 'above',
      'type' => 'number',
      'weight' => -4,
    ])
    ->setDisplayOptions('form', [
      'type' => 'number',
      'weight' => -4,
    ])
    ->setDisplayConfigurable('form', TRUE)
    ->setDisplayConfigurable('view', TRUE)
    ->setStorageRequired(TRUE)
    ->setRequired(TRUE);
  
    $fields['score'] = BaseFieldDefinition::create('integer')
    ->setLabel(new TranslatableMarkup('Name'))
    ->setDescription(new TranslatableMarkup('Mentee\'s score.'))
    ->setSettings([
      'max_length' => 255,
      'text_processing' => 0,
    ])
    ->setDefaultValue('')
    ->setDisplayOptions('view', [
      'label' => 'above',
      'type' => 'number',
      'weight' => -4,
    ])
    ->setDisplayOptions('form', [
      'type' => 'number',
      'weight' => -4,
    ])
    ->setDisplayConfigurable('form', TRUE)
    ->setDisplayConfigurable('view', TRUE)
    ->setStorageRequired(TRUE)
    ->setRequired(TRUE);
    

    return $fields;
  }

}
