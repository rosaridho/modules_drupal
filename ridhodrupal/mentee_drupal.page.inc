<?php

/**
 * @file
 * Contains mentee_drupal.page.inc.
 *
 * Page callback for Mentee drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Mentee drupal templates.
 *
 * Default template: mentee_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_mentee_drupal(array &$variables) {
  // Fetch MenteeDrupal Entity Object.
  $mentee_drupal = $variables['elements']['#mentee_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
