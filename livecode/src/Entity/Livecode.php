<?php

namespace Drupal\livecode\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Livecode entity.
 *
 * @ingroup livecode
 *
 * @ContentEntityType(
 *   id = "livecode",
 *   label = @Translation("Livecode"),
 *   base_table = "livecode",
 *   admin_permission = "administer livecode entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "name" = "name",
 *   },
 *   field_ui_base_route = "livecode.settings"
 * )
 */

class Livecode extends ContentEntityBase implements LivecodeInterface {

  /**
   * {@inheritdoc}
   */
  public function getLivecodeName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    $return = [$this->get('name')->value];
    if (trim($this->get('question')->value) != "") {
      $return[] = trim($this->get('question')->value);
    }
    if (trim($this->get('percentage')->value) != "") {
      $return[] = trim($this->get('percentage')->value);
    }
    if (trim($this->get('date')->value) != "") {
      $return[] = trim($this->get('date')->value);
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
  public function getQuestion() {
    return $this->get('question')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setQuestion($question) {
    $this->set('question', $question);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPercentage() {
    return $this->get('percentage')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPercentage($percentage) {
    $this->set('percentage', $percentage);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDate() {
    return $this->get('date')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDate($date) {
    $this->set('date', $date);
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

      $fields['question'] = BaseFieldDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('Question'))
      ->setDescription(new TranslatableMarkup('The number of question.'))
      // ->setSettings([
      //   'max_length' => 255,
      //   'text_processing' => 0,
      // ])
      ->setDefaultValue(0)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number',
        'weight' => -2,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => -2,
      ])
      ->setStorageRequired(FALSE)
      ->setRequired(FALSE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['percentage'] = BaseFieldDefinition::create('decimal')
      ->setLabel(new TranslatableMarkup('Percentage'))
      ->setDescription(new TranslatableMarkup('The percentage of the challenge.'))
      // ->setSettings([
      //   'max_length' => 255,
      //   'text_processing' => 0,
      // ])
      ->setDefaultValue(0)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number',
        'weight' => -2,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => -2,
      ])
      ->setStorageRequired(FALSE)
      ->setRequired(FALSE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['date'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('live code date'))
      ->setDescription(t('The date that of the livecode'));

    $fields['subject'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Subject'))
      ->setDescription(new TranslatableMarkup('The name of the Subject.'))
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
    

    return $fields;
  }

}
