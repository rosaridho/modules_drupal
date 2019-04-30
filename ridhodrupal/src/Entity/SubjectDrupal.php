<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Subject drupal entity.
 *
 * @ingroup ridhodrupal
 *
 * @ContentEntityType(
 *   id = "subject_drupal",
 *   label = @Translation("Subject drupal"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ridhodrupal\SubjectDrupalListBuilder",
 *     "views_data" = "Drupal\ridhodrupal\Entity\SubjectDrupalViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\ridhodrupal\Form\SubjectDrupalForm",
 *       "add" = "Drupal\ridhodrupal\Form\SubjectDrupalForm",
 *       "edit" = "Drupal\ridhodrupal\Form\SubjectDrupalForm",
 *       "delete" = "Drupal\ridhodrupal\Form\SubjectDrupalDeleteForm",
 *     },
 *     "access" = "Drupal\ridhodrupal\SubjectDrupalAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\ridhodrupal\SubjectDrupalHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "subject_drupal",
 *   admin_permission = "administer subject drupal entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *     "startAt" = "startAt",
 *     "finishAt" = "finishAt",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/subject_drupal/{subject_drupal}",
 *     "add-form" = "/admin/structure/subject_drupal/add",
 *     "edit-form" = "/admin/structure/subject_drupal/{subject_drupal}/edit",
 *     "delete-form" = "/admin/structure/subject_drupal/{subject_drupal}/delete",
 *     "collection" = "/admin/structure/subject_drupal",
 *   },
 *   field_ui_base_route = "subject_drupal.settings"
 * )
 */
class SubjectDrupal extends ContentEntityBase implements SubjectDrupalInterface {

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

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The user ID of author of the Subject drupal entity.'))
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
      ->setDescription(t('The name of the Subject drupal entity.'))
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
      ->setDescription(t('A boolean indicating whether the Subject drupal is published.'))
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

    $fields['startAt'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Subject Start Time'))
      ->setDescription(t('The time that the subject started'));
     
    $fields['finishAt'] = BaseFieldDefinition::create('timestamp')
      ->setLabel(t('Subject Finish Time'))
      ->setDescription(t('The time that the subject finished'));

    return $fields;
  }

}
