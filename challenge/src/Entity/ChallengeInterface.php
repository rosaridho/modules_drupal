<?php

namespace Drupal\challenge\Entity;

use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Provides an interface for defining Bank entities.
 *
 * @ingroup gada_profile
 */
interface ChallengeInterface extends ContentEntityInterface {

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
  public function getChallengeName();

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
  public function getQuestion();

  /**
   * Sets the City.
   *
   * @param string $city
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setQuestion($question);

  /**
   * Gets the Branch.
   *
   * @return string
   *   SWIFT code.
   */
  public function getPercentage();

  /**
   * Sets the Branch.
   *
   * @param string $branch
   *   The SWIFT code.
   *
   * @return \Drupal\gada_profile\Entity\BankInterface
   *   The called Bank entity.
   */
  public function setPercentage($percentage);

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
  public function setSubject($subject);


}
