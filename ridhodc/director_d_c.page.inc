<?php

/**
 * @file
 * Contains director_d_c.page.inc.
 *
 * Page callback for Director dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Director dc templates.
 *
 * Default template: director_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_director_d_c(array &$variables) {
  // Fetch DirectorDC Entity Object.
  $director_d_c = $variables['elements']['#director_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
