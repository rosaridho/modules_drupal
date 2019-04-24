<?php

namespace Drupal\ridhodc\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\ridhodc\Entity\SubjectDCInterface;

/**
 * Class SubjectDCController.
 *
 *  Returns responses for Subject dc routes.
 */
class SubjectDCController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Subject dc  revision.
   *
   * @param int $subject_d_c_revision
   *   The Subject dc  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($subject_d_c_revision) {
    $subject_d_c = $this->entityManager()->getStorage('subject_d_c')->loadRevision($subject_d_c_revision);
    $view_builder = $this->entityManager()->getViewBuilder('subject_d_c');

    return $view_builder->view($subject_d_c);
  }

  /**
   * Page title callback for a Subject dc  revision.
   *
   * @param int $subject_d_c_revision
   *   The Subject dc  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($subject_d_c_revision) {
    $subject_d_c = $this->entityManager()->getStorage('subject_d_c')->loadRevision($subject_d_c_revision);
    return $this->t('Revision of %title from %date', ['%title' => $subject_d_c->label(), '%date' => format_date($subject_d_c->getRevisionCreationTime())]);
  }

  /**
   * Generates an overview table of older revisions of a Subject dc .
   *
   * @param \Drupal\ridhodc\Entity\SubjectDCInterface $subject_d_c
   *   A Subject dc  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(SubjectDCInterface $subject_d_c) {
    $account = $this->currentUser();
    $langcode = $subject_d_c->language()->getId();
    $langname = $subject_d_c->language()->getName();
    $languages = $subject_d_c->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $subject_d_c_storage = $this->entityManager()->getStorage('subject_d_c');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $subject_d_c->label()]) : $this->t('Revisions for %title', ['%title' => $subject_d_c->label()]);
    $header = [$this->t('Revision'), $this->t('Operations')];

    $revert_permission = (($account->hasPermission("revert all subject dc revisions") || $account->hasPermission('administer subject dc entities')));
    $delete_permission = (($account->hasPermission("delete all subject dc revisions") || $account->hasPermission('administer subject dc entities')));

    $rows = [];

    $vids = $subject_d_c_storage->revisionIds($subject_d_c);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\ridhodc\SubjectDCInterface $revision */
      $revision = $subject_d_c_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $subject_d_c->getRevisionId()) {
          $link = $this->l($date, new Url('entity.subject_d_c.revision', ['subject_d_c' => $subject_d_c->id(), 'subject_d_c_revision' => $vid]));
        }
        else {
          $link = $subject_d_c->link($date);
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
              Url::fromRoute('entity.subject_d_c.translation_revert', ['subject_d_c' => $subject_d_c->id(), 'subject_d_c_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('entity.subject_d_c.revision_revert', ['subject_d_c' => $subject_d_c->id(), 'subject_d_c_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.subject_d_c.revision_delete', ['subject_d_c' => $subject_d_c->id(), 'subject_d_c_revision' => $vid]),
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

    $build['subject_d_c_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
