<?php

namespace Drupal\ridhodc\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Subject dc entities.
 *
 * @ingroup ridhodc
 */
interface SubjectDCInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Subject dc name.
   *
   * @return string
   *   Name of the Subject dc.
   */
  public function getName();

  /**
   * Sets the Subject dc name.
   *
   * @param string $name
   *   The Subject dc name.
   *
   * @return \Drupal\ridhodc\Entity\SubjectDCInterface
   *   The called Subject dc entity.
   */
  public function setName($name);

  /**
   * Gets the Subject dc creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Subject dc.
   */
  public function getCreatedTime();

  /**
   * Sets the Subject dc creation timestamp.
   *
   * @param int $timestamp
   *   The Subject dc creation timestamp.
   *
   * @return \Drupal\ridhodc\Entity\SubjectDCInterface
   *   The called Subject dc entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Subject dc published status indicator.
   *
   * Unpublished Subject dc are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Subject dc is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Subject dc.
   *
   * @param bool $published
   *   TRUE to set this Subject dc to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodc\Entity\SubjectDCInterface
   *   The called Subject dc entity.
   */
  public function setPublished($published);

  /**
   * Gets the Subject dc revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Subject dc revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\ridhodc\Entity\SubjectDCInterface
   *   The called Subject dc entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Subject dc revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Subject dc revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\ridhodc\Entity\SubjectDCInterface
   *   The called Subject dc entity.
   */
  public function setRevisionUserId($uid);

}
