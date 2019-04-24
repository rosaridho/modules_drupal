<?php

/**
 * @file
 * Contains mentee_d_c.page.inc.
 *
 * Page callback for Mentee dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Mentee dc templates.
 *
 * Default template: mentee_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_mentee_d_c(array &$variables) {
  // Fetch MenteeDC Entity Object.
  $mentee_d_c = $variables['elements']['#mentee_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}