<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\ChallengeDCInterface;

/**
 * Defines the storage handler class for Challenge dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Challenge dc entities.
 *
 * @ingroup ridhodc
 */
class ChallengeDCStorage extends SqlContentEntityStorage implements ChallengeDCStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(ChallengeDCInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {challenge_d_c_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {challenge_d_c_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(ChallengeDCInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {challenge_d_c_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('challenge_d_c_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
