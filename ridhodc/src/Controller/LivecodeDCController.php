<?php

namespace Drupal\ridhodc\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\ridhodc\Entity\LivecodeDCInterface;

/**
 * Class LivecodeDCController.
 *
 *  Returns responses for Livecode dc routes.
 */
class LivecodeDCController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Livecode dc  revision.
   *
   * @param int $livecode_d_c_revision
   *   The Livecode dc  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($livecode_d_c_revision) {
    $livecode_d_c = $this->entityManager()->getStorage('livecode_d_c')->loadRevision($livecode_d_c_revision);
    $view_builder = $this->entityManager()->getViewBuilder('livecode_d_c');

    return $view_builder->view($livecode_d_c);
  }

  /**
   * Page title callback for a Livecode dc  revision.
   *
   * @param int $livecode_d_c_revision
   *   The Livecode dc  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($livecode_d_c_revision) {
    $livecode_d_c = $this->entityManager()->getStorage('livecode_d_c')->loadRevision($livecode_d_c_revision);
    return $this->t('Revision of %title from %date', ['%title' => $livecode_d_c->label(), '%date' => format_date($livecode_d_c->getRevisionCreationTime())]);
  }

  /**
   * Generates an overview table of older revisions of a Livecode dc .
   *
   * @param \Drupal\ridhodc\Entity\LivecodeDCInterface $livecode_d_c
   *   A Livecode dc  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(LivecodeDCInterface $livecode_d_c) {
    $account = $this->currentUser();
    $langcode = $livecode_d_c->language()->getId();
    $langname = $livecode_d_c->language()->getName();
    $languages = $livecode_d_c->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $livecode_d_c_storage = $this->entityManager()->getStorage('livecode_d_c');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $livecode_d_c->label()]) : $this->t('Revisions for %title', ['%title' => $livecode_d_c->label()]);
    $header = [$this->t('Revision'), $this->t('Operations')];

    $revert_permission = (($account->hasPermission("revert all livecode dc revisions") || $account->hasPermission('administer livecode dc entities')));
    $delete_permission = (($account->hasPermission("delete all livecode dc revisions") || $account->hasPermission('administer livecode dc entities')));

    $rows = [];

    $vids = $livecode_d_c_storage->revisionIds($livecode_d_c);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\ridhodc\LivecodeDCInterface $revision */
      $revision = $livecode_d_c_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $livecode_d_c->getRevisionId()) {
          $link = $this->l($date, new Url('entity.livecode_d_c.revision', ['livecode_d_c' => $livecode_d_c->id(), 'livecode_d_c_revision' => $vid]));
        }
        else {
          $link = $livecode_d_c->link($date);
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => \Drupal::service('renderer')->renderPlain($username),
              'message' => ['#markup' => $revision->getRevisionLogMessage(), '#allowed_tags' => Xss::getHtmlTagList()],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.livecode_d_c.translation_revert', ['livecode_d_c' => $livecode_d_c->id(), 'livecode_d_c_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('entity.livecode_d_c.revision_revert', ['livecode_d_c' => $livecode_d_c->id(), 'livecode_d_c_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.livecode_d_c.revision_delete', ['livecode_d_c' => $livecode_d_c->id(), 'livecode_d_c_revision' => $vid]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['livecode_d_c_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
