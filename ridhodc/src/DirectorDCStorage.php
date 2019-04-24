<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\DirectorDCInterface;

/**
 * Defines the storage handler class for Director dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Director dc entities.
 *
 * @ingroup ridhodc
 */
class DirectorDCStorage extends SqlContentEntityStorage implements DirectorDCStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(DirectorDCInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {director_d_c_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {director_d_c_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(DirectorDCInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {director_d_c_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('director_d_c_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
