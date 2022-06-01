<?php

namespace Drupal\field_event_dispatcher\Event\Field;

/**
 * Class WidgetTypeFormAlterEvent.
 *
 * @deprecated in hook_event_dispatcher:3.0.0-rc1 and is removed from
 *   hook_event_dispatcher:4.0.0. Use WidgetSingleElementTypeFormAlterEvent
 *   instead.
 *
 * @see https://www.drupal.org/node/3180429
 * @see \Drupal\field_event_dispatcher\Event\Field\WidgetSingleElementTypeFormAlterEvent
 *
 * @phpstan-ignore-next-line
 */
class WidgetTypeFormAlterEvent extends WidgetFormAlterEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    /** @var \Drupal\Core\Field\FieldItemListInterface $items */
    $items = $this->getContext()['items'];
    $fieldDefinition = $items->getFieldDefinition();
    return 'hook_event_dispatcher.widget_' . $fieldDefinition->getType() . '.alter';
  }

}
