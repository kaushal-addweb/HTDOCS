<?php

namespace Drupal\core_event_dispatcher\Event\Block;

use Drupal\core_event_dispatcher\BlockHookEvents;
use Drupal\hook_event_dispatcher\Event\PluginDefinitionAlterEventBase;

/**
 * Class BlockAlterEvent.
 */
class BlockAlterEvent extends PluginDefinitionAlterEventBase {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return BlockHookEvents::BLOCK_ALTER;
  }

}
