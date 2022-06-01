<?php

namespace Drupal\field_event_dispatcher\Event\Field;

use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class WidgetFormAlterEvent.
 *
 * @deprecated in hook_event_dispatcher:3.0.0-rc1 and is removed from
 *   hook_event_dispatcher:4.0.0. Use WidgetSingleElementFormAlterEvent instead.
 *
 * @see https://www.drupal.org/node/3180429
 * @see \Drupal\field_event_dispatcher\Event\Field\WidgetSingleElementFormAlterEvent
 */
class WidgetFormAlterEvent extends WidgetSingleElementFormAlterEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return HookEventDispatcherInterface::WIDGET_FORM_ALTER;
  }

}
