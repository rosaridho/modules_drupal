<?php

namespace Drupal\ridhodc;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Mentor dc entity.
 *
 * @see \Drupal\ridhodc\Entity\MentorDC.
 */
class MentorDCAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodc\Entity\MentorDCInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished mentor dc entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published mentor dc entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit mentor dc entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete mentor dc entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add mentor dc entities');
  }

}
