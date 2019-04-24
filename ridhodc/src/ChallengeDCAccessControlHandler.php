<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Challenge dc entity.
 *
 * @see \Drupal\ridhodc\Entity\ChallengeDC.
 */
class ChallengeDCAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodc\Entity\ChallengeDCInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished challenge dc entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published challenge dc entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit challenge dc entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete challenge dc entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add challenge dc entities');
  }

}
