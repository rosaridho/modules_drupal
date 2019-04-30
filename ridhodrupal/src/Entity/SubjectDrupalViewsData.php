<?php

namespace Drupal\ridhodrupal\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Subject drupal entities.
 */
class SubjectDrupalViewsData extends EntityViewsData {

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
