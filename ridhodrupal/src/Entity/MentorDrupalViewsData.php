<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Mentor drupal entities.
 */
class MentorDrupalViewsData extends EntityViewsData {

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
