<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Livecode dc entity.
 *
 * @see \Drupal\ridhodc\Entity\LivecodeDC.
 */
class LivecodeDCAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodc\Entity\LivecodeDCInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished livecode dc entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published livecode dc entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit livecode dc entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete livecode dc entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add livecode dc entities');
  }

}
