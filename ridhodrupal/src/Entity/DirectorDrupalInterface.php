<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Director drupal entities.
 *
 * @ingroup ridhodrupal
 */
interface DirectorDrupalInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Director drupal name.
   *
   * @return string
   *   Name of the Director drupal.
   */
  public function getName();

  /**
   * Sets the Director drupal name.
   *
   * @param string $name
   *   The Director drupal name.
   *
   * @return \Drupal\ridhodrupal\Entity\DirectorDrupalInterface
   *   The called Director drupal entity.
   */
  public function setName($name);

  /**
   * Gets the Director drupal creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Director drupal.
   */
  public function getCreatedTime();

  /**
   * Sets the Director drupal creation timestamp.
   *
   * @param int $timestamp
   *   The Director drupal creation timestamp.
   *
   * @return \Drupal\ridhodrupal\Entity\DirectorDrupalInterface
   *   The called Director drupal entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Director drupal published status indicator.
   *
   * Unpublished Director drupal are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Director drupal is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Director drupal.
   *
   * @param bool $published
   *   TRUE to set this Director drupal to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodrupal\Entity\DirectorDrupalInterface
   *   The called Director drupal entity.
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
  public function getStatus();

  /**
   * Sets the Branch.
   *
   * @param string $branch
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setStatus($status);


}
