<?php

/**
 * @file
 * Contains subject_d_c.page.inc.
 *
 * Page callback for Subject dc entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Subject dc templates.
 *
 * Default template: subject_d_c.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_subject_d_c(array &$variables) {
  // Fetch SubjectDC Entity Object.
  $subject_d_c = $variables['elements']['#subject_d_c'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
