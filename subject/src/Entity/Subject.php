<?php

namespace Drupal\subject\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Subject entity.
 *
 * @ingroup subject
 *
 * @ContentEntityType(
 *   id = "subject",
 *   label = @Translation("Subject"),
 *   base_table = "subject",
 *   admin_permission = "administer subject entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "name" = "name",
 *   },
 *   field_ui_base_route = "subject.settings"
 * )
 */

class Subject extends ContentEntityBase implements SubjectInterface {

  /**
   * {@inheritdoc}
   */
  public function getSubjectName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $return = [$this->get('name')->value];
    if (trim($this->get('startAt')->value) != "") {
      $return[] = trim($this->get('startAt')->value);
    }
    if (trim($this->get('finishAt')->value) != "") {
      $return[] = trim($this->get('finishAt')->value);
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
  public function getStartAt() {
    return $this->get('startAt')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setStartAt($startAt) {
    $this->set('startAt', $startAt);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFinishAt() {
    return $this->get('finishAt')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setFinishAt($finishAt) {
    $this->set('finishAt', $finishAt);
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

    $fields['startAt'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Subject Start Time'))
      ->setDescription(t('The time that the subject started'));
      // ->setSettings([
      //   'max_length' => 32,
      //   'text_processing' => 0,
      // ])
      // ->setDefaultValue('')
      // ->setDisplayOptions('view', [
      //   'label' => 'above',
      //   'type' => 'string',
      //   'weight' => -4,
      // ])
      // ->setDisplayOptions('form', [
      //   'type' => 'string_textfield',
      //   'weight' => -4,
      // ])
      // ->setDisplayConfigurable('form', TRUE)
      // ->setDisplayConfigurable('view', TRUE)
      // ->setStorageRequired(TRUE)
      // ->setRequired(TRUE);

      $fields['finishAt'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Subject Finish Time'))
      ->setDescription(t('The time that the subject finished'));
    

    return $fields;
  }

}
