<?php

namespace Drupal\core_event_dispatcher\Event\Form;

use Drupal\core_event_dispatcher\FormHookEvents;

/**
 * Class FormAlterEvent.
 */
class FormAlterEvent extends AbstractFormEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FormHookEvents::FORM_ALTER;
  }

}
