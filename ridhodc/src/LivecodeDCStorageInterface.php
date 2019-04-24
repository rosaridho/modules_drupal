<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface LivecodeDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Livecode dc revision IDs for a specific Livecode dc.
   *
   * @param \Drupal\ridhodc\Entity\LivecodeDCInterface $entity
   *   The Livecode dc entity.
   *
   * @return int[]
   *   Livecode dc revision IDs (in ascending order).
   */
  public function revisionIds(LivecodeDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Livecode dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Livecode dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\LivecodeDCInterface $entity
   *   The Livecode dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(LivecodeDCInterface $entity);

  /**
   * Unsets the language for all Livecode dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
