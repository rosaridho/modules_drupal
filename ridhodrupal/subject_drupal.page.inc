<?php

/**
 * @file
 * Contains subject_drupal.page.inc.
 *
 * Page callback for Subject drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Subject drupal templates.
 *
 * Default template: subject_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_subject_drupal(array &$variables) {
  // Fetch SubjectDrupal Entity Object.
  $subject_drupal = $variables['elements']['#subject_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
