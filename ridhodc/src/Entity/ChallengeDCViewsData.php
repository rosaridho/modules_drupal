<?php

namespace Drupal\ridhodc\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Challenge dc entities.
 */
class ChallengeDCViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
