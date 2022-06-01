<?php

namespace Drupal\field_event_dispatcher\Event\Field;

use Drupal\field_event_dispatcher\FieldHookEvents;

/**
 * Class FieldFormatterSettingsSummaryAlterEvent.
 */
class FieldFormatterSettingsSummaryAlterEvent extends AbstractFieldSettingsSummaryFormEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FieldHookEvents::FIELD_FORMATTER_SETTINGS_SUMMARY_ALTER;
  }

}
