<?php

namespace Drupal\core_event_dispatcher\Event\File;

use Drupal\core_event_dispatcher\FileHookEvents;
use Drupal\hook_event_dispatcher\Event\PluginDefinitionAlterEventBase;

/**
 * Class ArchiverInfoAlterEvent.
 */
class ArchiverInfoAlterEvent extends PluginDefinitionAlterEventBase {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FileHookEvents::ARCHIVER_INFO_ALTER;
  }

}
