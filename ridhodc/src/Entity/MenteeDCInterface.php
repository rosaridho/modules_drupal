<?php

namespace Drupal\ridhodc\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Mentee dc entities.
 *
 * @ingroup ridhodc
 */
interface MenteeDCInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Mentee dc name.
   *
   * @return string
   *   Name of the Mentee dc.
   */
  public function getName();

  /**
   * Sets the Mentee dc name.
   *
   * @param string $name
   *   The Mentee dc name.
   *
   * @return \Drupal\ridhodc\Entity\MenteeDCInterface
   *   The called Mentee dc entity.
   */
  public function setName($name);

  /**
   * Gets the Mentee dc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Mentee dc.
   */
  public function getCreatedTime();

  /**
   * Sets the Mentee dc creation timestamp.
   *
   * @param int $timestamp
   *   The Mentee dc creation timestamp.
   *
   * @return \Drupal\ridhodc\Entity\MenteeDCInterface
   *   The called Mentee dc entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Mentee dc published status indicator.
   *
   * Unpublished Mentee dc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Mentee dc is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Mentee dc.
   *
   * @param bool $published
   *   TRUE to set this Mentee dc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodc\Entity\MenteeDCInterface
   *   The called Mentee dc entity.
   */
  public function setPublished($published);

  /**
   * Gets the Mentee dc revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Mentee dc revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ridhodc\Entity\MenteeDCInterface
   *   The called Mentee dc entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Mentee dc revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Mentee dc revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ridhodc\Entity\MenteeDCInterface
   *   The called Mentee dc entity.
   */
  public function setRevisionUserId($uid);

}
