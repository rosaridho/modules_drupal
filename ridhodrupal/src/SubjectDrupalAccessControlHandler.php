<?php

namespace Drupal\ridhodrupal;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Subject drupal entity.
 *
 * @see \Drupal\ridhodrupal\Entity\SubjectDrupal.
 */
class SubjectDrupalAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\ridhodrupal\Entity\SubjectDrupalInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished subject drupal entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published subject drupal entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit subject drupal entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete subject drupal entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add subject drupal entities');
  }

}
