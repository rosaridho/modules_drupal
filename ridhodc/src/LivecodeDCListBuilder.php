<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Livecode dc entities.
 *
 * @ingroup ridhodc
 */
class LivecodeDCListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Livecode dc ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodc\Entity\LivecodeDC */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.livecode_d_c.edit_form',
      ['livecode_d_c' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
