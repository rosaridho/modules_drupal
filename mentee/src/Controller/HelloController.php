<?php
/**
 * @file
 * Contains \Drupal\mentee\Controller\HelloController.
 */
namespace Drupal\mentee\Controller;

class HelloController {
  public function content() {
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello, mentee Model has been made!'),
    );
  }
}