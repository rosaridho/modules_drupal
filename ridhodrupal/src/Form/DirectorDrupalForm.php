<?php

namespace Drupal\ridhodrupal\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Director drupal edit forms.
 *
 * @ingroup ridhodrupal
 */
class DirectorDrupalForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\ridhodrupal\Entity\DirectorDrupal */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Director drupal.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Director drupal.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.director_drupal.canonical', ['director_drupal' => $entity->id()]);
  }

}
