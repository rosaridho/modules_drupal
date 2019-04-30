<?php

/**
 * @file
 * Contains mentor_drupal.page.inc.
 *
 * Page callback for Mentor drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Mentor drupal templates.
 *
 * Default template: mentor_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_mentor_drupal(array &$variables) {
  // Fetch MentorDrupal Entity Object.
  $mentor_drupal = $variables['elements']['#mentor_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
