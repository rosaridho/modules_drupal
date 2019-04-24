<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\MentorDCInterface;

/**
 * Defines the storage handler class for Mentor dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Mentor dc entities.
 *
 * @ingroup ridhodc
 */
class MentorDCStorage extends SqlContentEntityStorage implements MentorDCStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(MentorDCInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {mentor_d_c_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {mentor_d_c_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(MentorDCInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {mentor_d_c_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('mentor_d_c_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
