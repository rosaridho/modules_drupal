<?php

/**
 * @file
 * Contains livecode_d_c.page.inc.
 *
 * Page callback for Livecode dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Livecode dc templates.
 *
 * Default template: livecode_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_livecode_d_c(array &$variables) {
  // Fetch LivecodeDC Entity Object.
  $livecode_d_c = $variables['elements']['#livecode_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
