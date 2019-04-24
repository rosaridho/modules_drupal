<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Mentee dc entities.
 *
 * @ingroup ridhodc
 */
class MenteeDCListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Mentee dc ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodc\Entity\MenteeDC */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.mentee_d_c.edit_form',
      ['mentee_d_c' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
