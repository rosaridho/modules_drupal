<?php

namespace Drupal\mentor\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface for defining Bank entities.
 *
 * @ingroup gada_profile
 */
interface MentorInterface extends ContentEntityInterface {

  /**
   * Gets the Bank name.
   *
   * @return string
   *   Name of the Bank.
   */
  public function getName();

  /**
   * Gets the Bank name.
   *
   * @return string
   *   Name of the Bank.
   */
  public function getMentorName();

  /**
   * Sets the Bank name.
   *
   * @param string $name
   *   The Bank name.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setName($name);

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
