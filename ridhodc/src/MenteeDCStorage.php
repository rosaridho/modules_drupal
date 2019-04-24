<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\MenteeDCInterface;

/**
 * Defines the storage handler class for Mentee dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Mentee dc entities.
 *
 * @ingroup ridhodc
 */
class MenteeDCStorage extends SqlContentEntityStorage implements MenteeDCStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(MenteeDCInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {mentee_d_c_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {mentee_d_c_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(MenteeDCInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {mentee_d_c_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('mentee_d_c_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
