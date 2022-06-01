<?php

namespace Drupal\webform_event_dispatcher\Event\WebformElement;

use Drupal\hook_event_dispatcher\Event\PluginDefinitionAlterEventBase;
use Drupal\webform_event_dispatcher\WebformHookEvents;

/**
 * Class WebformElementInfoAlterEvent.
 */
class WebformElementInfoAlterEvent extends PluginDefinitionAlterEventBase {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return WebformHookEvents::WEBFORM_ELEMENT_INFO_ALTER;
  }

}
