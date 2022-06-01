<?php

namespace Drupal\core_event_dispatcher\Event\Core;

use Drupal\core_event_dispatcher\CoreHookEvents;
use Drupal\hook_event_dispatcher\Event\PluginDefinitionAlterEventBase;

/**
 * Class MailBackendInfoAlterEvent.
 */
class MailBackendInfoAlterEvent extends PluginDefinitionAlterEventBase {

  /**
   * Gets mail backend plugin definitions.
   *
   * @return array
   *   The mail backend plugin definitions.
   */
  public function &getInfo(): array {
    return $this->definitions;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return CoreHookEvents::MAIL_BACKEND_INFO_ALTER;
  }

}
