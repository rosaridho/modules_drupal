<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Livecode drupal entities.
 *
 * @ingroup ridhodrupal
 */
interface LivecodeDrupalInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Livecode drupal name.
   *
   * @return string
   *   Name of the Livecode drupal.
   */
  public function getName();

  /**
   * Sets the Livecode drupal name.
   *
   * @param string $name
   *   The Livecode drupal name.
   *
   * @return \Drupal\ridhodrupal\Entity\LivecodeDrupalInterface
   *   The called Livecode drupal entity.
   */
  public function setName($name);

  /**
   * Gets the Livecode drupal creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Livecode drupal.
   */
  public function getCreatedTime();

  /**
   * Sets the Livecode drupal creation timestamp.
   *
   * @param int $timestamp
   *   The Livecode drupal creation timestamp.
   *
   * @return \Drupal\ridhodrupal\Entity\LivecodeDrupalInterface
   *   The called Livecode drupal entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Livecode drupal published status indicator.
   *
   * Unpublished Livecode drupal are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Livecode drupal is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Livecode drupal.
   *
   * @param bool $published
   *   TRUE to set this Livecode drupal to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\ridhodrupal\Entity\LivecodeDrupalInterface
   *   The called Livecode drupal entity.
   */
  public function setPublished($published);

}
