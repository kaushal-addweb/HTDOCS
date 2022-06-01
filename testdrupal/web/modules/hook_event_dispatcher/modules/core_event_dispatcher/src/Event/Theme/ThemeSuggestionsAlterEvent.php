<?php

namespace Drupal\core_event_dispatcher\Event\Theme;

use Drupal\core_event_dispatcher\ThemeHookEvents;

/**
 * Class ThemeSuggestionsAlterEvent.
 */
class ThemeSuggestionsAlterEvent extends AbstractThemeSuggestionsEvent {

  /**
   * Returns the hook dispatcher type.
   *
   * @return string
   *   Dispatcher type.
   */
  public function getDispatcherType(): string {
    return ThemeHookEvents::THEME_SUGGESTIONS_ALTER;
  }

}
