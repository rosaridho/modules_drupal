<?php
/**
 * @file
 * Contains \Drupal\director\Controller\HelloController.
 */
namespace Drupal\director\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, Director!'),
    );
  }
}