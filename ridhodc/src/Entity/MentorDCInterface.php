<?php

namespace Drupal\ridhodc\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Mentor dc entities.
 *
 * @ingroup ridhodc
 */
interface MentorDCInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Mentor dc name.
   *
   * @return string
   *   Name of the Mentor dc.
   */
  public function getName();

  /**
   * Sets the Mentor dc name.
   *
   * @param string $name
   *   The Mentor dc name.
   *
   * @return \Drupal\ridhodc\Entity\MentorDCInterface
   *   The called Mentor dc entity.
   */
  public function setName($name);

  /**
   * Gets the Mentor dc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Mentor dc.
   */
  public function getCreatedTime();

  /**
   * Sets the Mentor dc creation timestamp.
   *
   * @param int $timestamp
   *   The Mentor dc creation timestamp.
   *
   * @return \Drupal\ridhodc\Entity\MentorDCInterface
   *   The called Mentor dc entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Mentor dc published status indicator.
   *
   * Unpublished Mentor dc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Mentor dc is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Mentor dc.
   *
   * @param bool $published
   *   TRUE to set this Mentor dc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodc\Entity\MentorDCInterface
   *   The called Mentor dc entity.
   */
  public function setPublished($published);

  /**
   * Gets the Mentor dc revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Mentor dc revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ridhodc\Entity\MentorDCInterface
   *   The called Mentor dc entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Mentor dc revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Mentor dc revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ridhodc\Entity\MentorDCInterface
   *   The called Mentor dc entity.
   */
  public function setRevisionUserId($uid);

}
