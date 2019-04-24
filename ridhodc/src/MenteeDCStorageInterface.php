<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface MenteeDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Mentee dc revision IDs for a specific Mentee dc.
   *
   * @param \Drupal\ridhodc\Entity\MenteeDCInterface $entity
   *   The Mentee dc entity.
   *
   * @return int[]
   *   Mentee dc revision IDs (in ascending order).
   */
  public function revisionIds(MenteeDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Mentee dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Mentee dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\MenteeDCInterface $entity
   *   The Mentee dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(MenteeDCInterface $entity);

  /**
   * Unsets the language for all Mentee dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
