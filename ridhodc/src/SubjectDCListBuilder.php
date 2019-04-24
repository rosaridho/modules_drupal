<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Subject dc entities.
 *
 * @ingroup ridhodc
 */
class SubjectDCListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Subject dc ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodc\Entity\SubjectDC */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.subject_d_c.edit_form',
      ['subject_d_c' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
