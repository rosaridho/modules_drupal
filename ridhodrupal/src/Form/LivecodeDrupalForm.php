<?php

namespace Drupal\ridhodrupal\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Livecode drupal edit forms.
 *
 * @ingroup ridhodrupal
 */
class LivecodeDrupalForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\ridhodrupal\Entity\LivecodeDrupal */
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
        drupal_set_message($this->t('Created the %label Livecode drupal.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Livecode drupal.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.livecode_drupal.canonical', ['livecode_drupal' => $entity->id()]);
  }

}
