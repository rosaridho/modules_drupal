<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Mentor drupal entities.
 *
 * @ingroup ridhodrupal
 */
interface MentorDrupalInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Mentor drupal name.
   *
   * @return string
   *   Name of the Mentor drupal.
   */
  public function getName();

  /**
   * Sets the Mentor drupal name.
   *
   * @param string $name
   *   The Mentor drupal name.
   *
   * @return \Drupal\ridhodrupal\Entity\MentorDrupalInterface
   *   The called Mentor drupal entity.
   */
  public function setName($name);

  /**
   * Gets the Mentor drupal creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Mentor drupal.
   */
  public function getCreatedTime();

  /**
   * Sets the Mentor drupal creation timestamp.
   *
   * @param int $timestamp
   *   The Mentor drupal creation timestamp.
   *
   * @return \Drupal\ridhodrupal\Entity\MentorDrupalInterface
   *   The called Mentor drupal entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Mentor drupal published status indicator.
   *
   * Unpublished Mentor drupal are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Mentor drupal is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Mentor drupal.
   *
   * @param bool $published
   *   TRUE to set this Mentor drupal to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodrupal\Entity\MentorDrupalInterface
   *   The called Mentor drupal entity.
   */
  public function setPublished($published);

  /**
   * Gets the City.
   *
   * @return string
   *   SWIFT code.
   */
  public function getTelephone();

  /**
   * Sets the City.
   *
   * @param string $city
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setTelephone($telephone);

  /**
   * Gets the Branch.
   *
   * @return string
   *   SWIFT code.
   */
  public function getSubject();

  /**
   * Sets the Branch.
   *
   * @param string $branch
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setSubject($status);

}
