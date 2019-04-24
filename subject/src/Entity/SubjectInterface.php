<?php

namespace Drupal\subject\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface for defining Bank entities.
 *
 * @ingroup gada_profile
 */
interface SubjectInterface extends ContentEntityInterface {

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
  public function getSubjectName();

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
