<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface DirectorDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Director dc revision IDs for a specific Director dc.
   *
   * @param \Drupal\ridhodc\Entity\DirectorDCInterface $entity
   *   The Director dc entity.
   *
   * @return int[]
   *   Director dc revision IDs (in ascending order).
   */
  public function revisionIds(DirectorDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Director dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Director dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\DirectorDCInterface $entity
   *   The Director dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(DirectorDCInterface $entity);

  /**
   * Unsets the language for all Director dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
