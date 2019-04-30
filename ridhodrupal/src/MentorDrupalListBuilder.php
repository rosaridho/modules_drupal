<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Mentor drupal entities.
 *
 * @ingroup ridhodrupal
 */
class MentorDrupalListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Mentor drupal ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodrupal\Entity\MentorDrupal */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.mentor_drupal.edit_form',
      ['mentor_drupal' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
