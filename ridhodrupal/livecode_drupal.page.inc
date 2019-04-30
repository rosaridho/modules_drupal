<?php

/**
 * @file
 * Contains livecode_drupal.page.inc.
 *
 * Page callback for Livecode drupal entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Livecode drupal templates.
 *
 * Default template: livecode_drupal.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_livecode_drupal(array &$variables) {
  // Fetch LivecodeDrupal Entity Object.
  $livecode_drupal = $variables['elements']['#livecode_drupal'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
