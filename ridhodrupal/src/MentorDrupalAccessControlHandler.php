<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Mentor drupal entity.
 *
 * @see \Drupal\ridhodrupal\Entity\MentorDrupal.
 */
class MentorDrupalAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodrupal\Entity\MentorDrupalInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished mentor drupal entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published mentor drupal entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit mentor drupal entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete mentor drupal entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add mentor drupal entities');
  }

}
