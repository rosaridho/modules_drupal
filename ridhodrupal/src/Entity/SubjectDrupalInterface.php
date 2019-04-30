<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Subject drupal entities.
 *
 * @ingroup ridhodrupal
 */
interface SubjectDrupalInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Subject drupal name.
   *
   * @return string
   *   Name of the Subject drupal.
   */
  public function getName();

  /**
   * Sets the Subject drupal name.
   *
   * @param string $name
   *   The Subject drupal name.
   *
   * @return \Drupal\ridhodrupal\Entity\SubjectDrupalInterface
   *   The called Subject drupal entity.
   */
  public function setName($name);

  /**
   * Gets the Subject drupal creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Subject drupal.
   */
  public function getCreatedTime();

  /**
   * Sets the Subject drupal creation timestamp.
   *
   * @param int $timestamp
   *   The Subject drupal creation timestamp.
   *
   * @return \Drupal\ridhodrupal\Entity\SubjectDrupalInterface
   *   The called Subject drupal entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Subject drupal published status indicator.
   *
   * Unpublished Subject drupal are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Subject drupal is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Subject drupal.
   *
   * @param bool $published
   *   TRUE to set this Subject drupal to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodrupal\Entity\SubjectDrupalInterface
   *   The called Subject drupal entity.
   */
  public function setPublished($published);

  /**
   * Gets the City.
   *
   * @return string
   *   SWIFT code.
   */
  public function getStartAt();

  /**
   * Sets the City.
   *
   * @param string $city
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setStartAt($telephone);

  /**
   * Gets the Branch.
   *
   * @return string
   *   SWIFT code.
   */
  public function getFinishAt();

  /**
   * Sets the Branch.
   *
   * @param string $branch
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setFinishAt($attendance_number);


}
