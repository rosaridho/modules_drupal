<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Challenge drupal entity.
 *
 * @see \Drupal\ridhodrupal\Entity\ChallengeDrupal.
 */
class ChallengeDrupalAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodrupal\Entity\ChallengeDrupalInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished challenge drupal entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published challenge drupal entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit challenge drupal entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete challenge drupal entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add challenge drupal entities');
  }

}
