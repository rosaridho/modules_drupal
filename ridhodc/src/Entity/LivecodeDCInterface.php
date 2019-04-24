<?php

namespace Drupal\ridhodc\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Livecode dc entities.
 *
 * @ingroup ridhodc
 */
interface LivecodeDCInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Livecode dc name.
   *
   * @return string
   *   Name of the Livecode dc.
   */
  public function getName();

  /**
   * Sets the Livecode dc name.
   *
   * @param string $name
   *   The Livecode dc name.
   *
   * @return \Drupal\ridhodc\Entity\LivecodeDCInterface
   *   The called Livecode dc entity.
   */
  public function setName($name);

  /**
   * Gets the Livecode dc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Livecode dc.
   */
  public function getCreatedTime();

  /**
   * Sets the Livecode dc creation timestamp.
   *
   * @param int $timestamp
   *   The Livecode dc creation timestamp.
   *
   * @return \Drupal\ridhodc\Entity\LivecodeDCInterface
   *   The called Livecode dc entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Livecode dc published status indicator.
   *
   * Unpublished Livecode dc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Livecode dc is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Livecode dc.
   *
   * @param bool $published
   *   TRUE to set this Livecode dc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodc\Entity\LivecodeDCInterface
   *   The called Livecode dc entity.
   */
  public function setPublished($published);

  /**
   * Gets the Livecode dc revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Livecode dc revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ridhodc\Entity\LivecodeDCInterface
   *   The called Livecode dc entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Livecode dc revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Livecode dc revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ridhodc\Entity\LivecodeDCInterface
   *   The called Livecode dc entity.
   */
  public function setRevisionUserId($uid);

}
