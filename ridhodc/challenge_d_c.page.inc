<?php

/**
 * @file
 * Contains challenge_d_c.page.inc.
 *
 * Page callback for Challenge dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Challenge dc templates.
 *
 * Default template: challenge_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_challenge_d_c(array &$variables) {
  // Fetch ChallengeDC Entity Object.
  $challenge_d_c = $variables['elements']['#challenge_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
