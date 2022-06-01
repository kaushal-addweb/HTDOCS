<?php

namespace Drupal\field_event_dispatcher\Event\Field;

use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class WidgetMultivalueFormAlterEvent.
 *
 * @deprecated in hook_event_dispatcher:3.0.0-rc1 and is removed from
 *   hook_event_dispatcher:4.0.0. Use WidgetCompleteFormAlterEvent instead.
 *
 * @see https://www.drupal.org/node/3180429
 * @see \Drupal\field_event_dispatcher\Event\Field\WidgetCompleteFormAlterEvent
 */
class WidgetMultivalueFormAlterEvent extends WidgetCompleteFormAlterEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return HookEventDispatcherInterface::WIDGET_MULTIVALUE_FORM_ALTER;
  }

}
