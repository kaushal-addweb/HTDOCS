<?php

namespace Drupal\field_event_dispatcher\Event\Field;

use Drupal\field_event_dispatcher\FieldHookEvents;

/**
 * Class FieldWidgetSettingsSummaryAlterEvent.
 */
class FieldWidgetSettingsSummaryAlterEvent extends AbstractFieldSettingsSummaryFormEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FieldHookEvents::FIELD_WIDGET_SETTINGS_SUMMARY_ALTER;
  }

}
