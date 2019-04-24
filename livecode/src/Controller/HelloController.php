<?php
/**
 * @file
 * Contains \Drupal\subject\Controller\HelloController.
 */
namespace Drupal\livecode\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, livecode Model has been made!'),
    );
  }
}