<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Livecode drupal entity.
 *
 * @see \Drupal\ridhodrupal\Entity\LivecodeDrupal.
 */
class LivecodeDrupalAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodrupal\Entity\LivecodeDrupalInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished livecode drupal entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published livecode drupal entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit livecode drupal entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete livecode drupal entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add livecode drupal entities');
  }

}
