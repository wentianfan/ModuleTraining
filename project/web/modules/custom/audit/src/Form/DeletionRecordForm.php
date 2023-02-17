<?php

namespace Drupal\audit\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the deletion record entity edit forms.
 */
class DeletionRecordForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New deletion record %label has been created.', $message_arguments));
      $this->logger('audit')->notice('Created new deletion record %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The deletion record %label has been updated.', $message_arguments));
      $this->logger('audit')->notice('Updated new deletion record %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.deletion_record.canonical', ['deletion_record' => $entity->id()]);
  }

}
