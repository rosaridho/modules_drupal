<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Mentor drupal entity.
 *
 * @ingroup ridhodrupal
 *
 * @ContentEntityType(
 *   id = "mentor_drupal",
 *   label = @Translation("Mentor drupal"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\ridhodrupal\MentorDrupalListBuilder",
 *     "views_data" = "Drupal\ridhodrupal\Entity\MentorDrupalViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\ridhodrupal\Form\MentorDrupalForm",
 *       "add" = "Drupal\ridhodrupal\Form\MentorDrupalForm",
 *       "edit" = "Drupal\ridhodrupal\Form\MentorDrupalForm",
 *       "delete" = "Drupal\ridhodrupal\Form\MentorDrupalDeleteForm",
 *     },
 *     "access" = "Drupal\ridhodrupal\MentorDrupalAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\ridhodrupal\MentorDrupalHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "mentor_drupal",
 *   admin_permission = "administer mentor drupal entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *     "telephone" = "telephone",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/mentor_drupal/{mentor_drupal}",
 *     "add-form" = "/admin/structure/mentor_drupal/add",
 *     "edit-form" = "/admin/structure/mentor_drupal/{mentor_drupal}/edit",
 *     "delete-form" = "/admin/structure/mentor_drupal/{mentor_drupal}/delete",
 *     "collection" = "/admin/structure/mentor_drupal",
 *   },
 *   field_ui_base_route = "mentor_drupal.settings"
 * )
 */
class MentorDrupal extends ContentEntityBase implements MentorDrupalInterface {

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

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The user ID of author of the Mentor drupal entity.'))
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
      ->setDescription(t('The name of the Mentor drupal entity.'))
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
      ->setDescription(t('A boolean indicating whether the Mentor drupal is published.'))
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
