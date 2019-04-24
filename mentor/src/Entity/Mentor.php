<?php

namespace Drupal\mentor\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Mentor entity.
 *
 * @ingroup mentor
 *
 * @ContentEntityType(
 *   id = "mentor",
 *   label = @Translation("Mentor"),
 *   base_table = "mentor",
 *   admin_permission = "administer mentor entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "name" = "name",
 *   },
 *   field_ui_base_route = "mentor.settings"
 * )
 */

class Mentor extends ContentEntityBase implements MentorInterface {

  /**
   * {@inheritdoc}
   */
  public function getMentorName() {
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
    if (trim($this->get('subject')->value) != "") {
      $return[] = trim($this->get('subject')->value);
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
  public function getSubject() {
    return $this->get('subject')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setSubject($subject) {
    $this->set('subject', $subject);
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

    $fields['subject'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Subject'))
      ->setDescription(new TranslatableMarkup('The responsible subject.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -2,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -2,
      ])
      ->setStorageRequired(FALSE)
      ->setRequired(FALSE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    

    return $fields;
  }

}
