<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface MentorDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Mentor dc revision IDs for a specific Mentor dc.
   *
   * @param \Drupal\ridhodc\Entity\MentorDCInterface $entity
   *   The Mentor dc entity.
   *
   * @return int[]
   *   Mentor dc revision IDs (in ascending order).
   */
  public function revisionIds(MentorDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Mentor dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Mentor dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\MentorDCInterface $entity
   *   The Mentor dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(MentorDCInterface $entity);

  /**
   * Unsets the language for all Mentor dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}