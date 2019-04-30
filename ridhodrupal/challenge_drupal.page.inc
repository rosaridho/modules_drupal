<?php

/**
 * @file
 * Contains challenge_drupal.page.inc.
 *
 * Page callback for Challenge drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Challenge drupal templates.
 *
 * Default template: challenge_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_challenge_drupal(array &$variables) {
  // Fetch ChallengeDrupal Entity Object.
  $challenge_drupal = $variables['elements']['#challenge_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
