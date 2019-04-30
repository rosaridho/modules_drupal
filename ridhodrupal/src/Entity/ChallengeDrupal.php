<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Challenge drupal entity.
 *
 * @ingroup ridhodrupal
 *
 * @ContentEntityType(
 *   id = "challenge_drupal",
 *   label = @Translation("Challenge drupal"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ridhodrupal\ChallengeDrupalListBuilder",
 *     "views_data" = "Drupal\ridhodrupal\Entity\ChallengeDrupalViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\ridhodrupal\Form\ChallengeDrupalForm",
 *       "add" = "Drupal\ridhodrupal\Form\ChallengeDrupalForm",
 *       "edit" = "Drupal\ridhodrupal\Form\ChallengeDrupalForm",
 *       "delete" = "Drupal\ridhodrupal\Form\ChallengeDrupalDeleteForm",
 *     },
 *     "access" = "Drupal\ridhodrupal\ChallengeDrupalAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\ridhodrupal\ChallengeDrupalHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "challenge_drupal",
 *   admin_permission = "administer challenge drupal entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *     "question" = "question",
 *     "percentage" = "percentage",
 *     "subject" = "subject",
 *  
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/challenge_drupal/{challenge_drupal}",
 *     "add-form" = "/admin/structure/challenge_drupal/add",
 *     "edit-form" = "/admin/structure/challenge_drupal/{challenge_drupal}/edit",
 *     "delete-form" = "/admin/structure/challenge_drupal/{challenge_drupal}/delete",
 *     "collection" = "/admin/structure/challenge_drupal",
 *   },
 *   field_ui_base_route = "challenge_drupal.settings"
 * )
 */
class ChallengeDrupal extends ContentEntityBase implements ChallengeDrupalInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
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
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return (bool) $this->getEntityKey('status');
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    $this->set('status', $published ? TRUE : FALSE);
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

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The user ID of author of the Challenge drupal entity.'))
      ->setRevisionable(TRUE)
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setTranslatable(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'author',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Challenge drupal entity.'))
      ->setSettings([
        'max_length' => 50,
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
      ->setRequired(TRUE);

    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Publishing status'))
      ->setDescription(t('A boolean indicating whether the Challenge drupal is published.'))
      ->setDefaultValue(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

      $fields['question'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Question'))
      ->setDescription(t('The number of question.'))
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
      ->setLabel(t('Percentage'))
      ->setDescription(t('The percentage of the challenge.'))
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

    $fields['subject'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Subject'))
      ->setDescription(t('The name of the Subject.'))
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
