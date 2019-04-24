<?php

namespace Drupal\ridhodc\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Director dc entities.
 */
class DirectorDCViewsData extends EntityViewsData {

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
