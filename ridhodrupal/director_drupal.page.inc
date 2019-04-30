<?php

/**
 * @file
 * Contains director_drupal.page.inc.
 *
 * Page callback for Director drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Director drupal templates.
 *
 * Default template: director_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_director_drupal(array &$variables) {
  // Fetch DirectorDrupal Entity Object.
  $director_drupal = $variables['elements']['#director_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
