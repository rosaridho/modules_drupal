<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\ridhodc\Entity\SubjectDCInterface;

/**
 * Defines the storage handler class for Subject dc entities.
 *
 * This extends the base storage class, adding required special handling for
 * Subject dc entities.
 *
 * @ingroup ridhodc
 */
interface SubjectDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Subject dc revision IDs for a specific Subject dc.
   *
   * @param \Drupal\ridhodc\Entity\SubjectDCInterface $entity
   *   The Subject dc entity.
   *
   * @return int[]
   *   Subject dc revision IDs (in ascending order).
   */
  public function revisionIds(SubjectDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Subject dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Subject dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\SubjectDCInterface $entity
   *   The Subject dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(SubjectDCInterface $entity);

  /**
   * Unsets the language for all Subject dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
