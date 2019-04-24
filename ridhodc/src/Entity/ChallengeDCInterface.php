<?php

namespace Drupal\ridhodc\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Challenge dc entities.
 *
 * @ingroup ridhodc
 */
interface ChallengeDCInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Challenge dc name.
   *
   * @return string
   *   Name of the Challenge dc.
   */
  public function getName();

  /**
   * Sets the Challenge dc name.
   *
   * @param string $name
   *   The Challenge dc name.
   *
   * @return \Drupal\ridhodc\Entity\ChallengeDCInterface
   *   The called Challenge dc entity.
   */
  public function setName($name);

  /**
   * Gets the Challenge dc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Challenge dc.
   */
  public function getCreatedTime();

  /**
   * Sets the Challenge dc creation timestamp.
   *
   * @param int $timestamp
   *   The Challenge dc creation timestamp.
   *
   * @return \Drupal\ridhodc\Entity\ChallengeDCInterface
   *   The called Challenge dc entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Challenge dc published status indicator.
   *
   * Unpublished Challenge dc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Challenge dc is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Challenge dc.
   *
   * @param bool $published
   *   TRUE to set this Challenge dc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodc\Entity\ChallengeDCInterface
   *   The called Challenge dc entity.
   */
  public function setPublished($published);

  /**
   * Gets the Challenge dc revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Challenge dc revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ridhodc\Entity\ChallengeDCInterface
   *   The called Challenge dc entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Challenge dc revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Challenge dc revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ridhodc\Entity\ChallengeDCInterface
   *   The called Challenge dc entity.
   */
  public function setRevisionUserId($uid);

}
