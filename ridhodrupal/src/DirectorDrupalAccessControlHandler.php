<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Director drupal entity.
 *
 * @see \Drupal\ridhodrupal\Entity\DirectorDrupal.
 */
class DirectorDrupalAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodrupal\Entity\DirectorDrupalInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished director drupal entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published director drupal entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit director drupal entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete director drupal entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add director drupal entities');
  }

}
