<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Director dc entity.
 *
 * @see \Drupal\ridhodc\Entity\DirectorDC.
 */
class DirectorDCAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodc\Entity\DirectorDCInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished director dc entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published director dc entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit director dc entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete director dc entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add director dc entities');
  }

}
