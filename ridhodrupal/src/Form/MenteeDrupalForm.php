<?php

namespace Drupal\ridhodrupal\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Mentee drupal edit forms.
 *
 * @ingroup ridhodrupal
 */
class MenteeDrupalForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\ridhodrupal\Entity\MenteeDrupal */
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
        drupal_set_message($this->t('Created the %label Mentee drupal.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Mentee drupal.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.mentee_drupal.canonical', ['mentee_drupal' => $entity->id()]);
  }

}
