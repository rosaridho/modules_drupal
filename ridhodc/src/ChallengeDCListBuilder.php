<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Challenge dc entities.
 *
 * @ingroup ridhodc
 */
class ChallengeDCListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Challenge dc ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodc\Entity\ChallengeDC */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.challenge_d_c.edit_form',
      ['challenge_d_c' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
