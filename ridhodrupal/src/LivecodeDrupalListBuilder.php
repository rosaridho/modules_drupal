<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Livecode drupal entities.
 *
 * @ingroup ridhodrupal
 */
class LivecodeDrupalListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Livecode drupal ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodrupal\Entity\LivecodeDrupal */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.livecode_drupal.edit_form',
      ['livecode_drupal' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
