<?php

/**
 * @file
 * Contains mentor_d_c.page.inc.
 *
 * Page callback for Mentor dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Mentor dc templates.
 *
 * Default template: mentor_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_mentor_d_c(array &$variables) {
  // Fetch MentorDC Entity Object.
  $mentor_d_c = $variables['elements']['#mentor_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
