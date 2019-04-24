<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface ChallengeDCStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Challenge dc revision IDs for a specific Challenge dc.
   *
   * @param \Drupal\ridhodc\Entity\ChallengeDCInterface $entity
   *   The Challenge dc entity.
   *
   * @return int[]
   *   Challenge dc revision IDs (in ascending order).
   */
  public function revisionIds(ChallengeDCInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Challenge dc author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Challenge dc revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\ridhodc\Entity\ChallengeDCInterface $entity
   *   The Challenge dc entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(ChallengeDCInterface $entity);

  /**
   * Unsets the language for all Challenge dc with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
