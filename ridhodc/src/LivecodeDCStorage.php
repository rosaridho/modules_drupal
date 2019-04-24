<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\LivecodeDCInterface;

/**
 * Defines the storage handler class for Livecode dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Livecode dc entities.
 *
 * @ingroup ridhodc
 */
class LivecodeDCStorage extends SqlContentEntityStorage implements LivecodeDCStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(LivecodeDCInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {livecode_d_c_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {livecode_d_c_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(LivecodeDCInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {livecode_d_c_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('livecode_d_c_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
