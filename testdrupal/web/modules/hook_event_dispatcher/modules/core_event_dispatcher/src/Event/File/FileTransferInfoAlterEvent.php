<?php

namespace Drupal\core_event_dispatcher\Event\File;

use Drupal\core_event_dispatcher\FileHookEvents;
use Drupal\hook_event_dispatcher\Event\PluginDefinitionAlterEventBase;

/**
 * Class FiletransferInfoAlterEvent.
 */
class FileTransferInfoAlterEvent extends PluginDefinitionAlterEventBase {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FileHookEvents::FILE_TRANSFER_INFO_ALTER;
  }

}
