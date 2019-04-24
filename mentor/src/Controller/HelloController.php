<?php
/**
 * @file
 * Contains \Drupal\mentor\Controller\HelloController.
 */
namespace Drupal\mentor\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, Mentor Model has been made!'),
    );
  }
}