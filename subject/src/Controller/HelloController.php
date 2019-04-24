<?php
/**
 * @file
 * Contains \Drupal\subject\Controller\HelloController.
 */
namespace Drupal\subject\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, subject Model has been made!'),
    );
  }
}