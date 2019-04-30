<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Challenge drupal entities.
 *
 * @ingroup ridhodrupal
 */
class ChallengeDrupalListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Challenge drupal ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\ridhodrupal\Entity\ChallengeDrupal */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.challenge_drupal.edit_form',
      ['challenge_drupal' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
