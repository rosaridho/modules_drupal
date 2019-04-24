<?php
/**
 * @file
 * Contains \Drupal\challenge\Controller\HelloController.
 */
namespace Drupal\challenge\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, Challenge Model has been made!'),
    );
  }
}