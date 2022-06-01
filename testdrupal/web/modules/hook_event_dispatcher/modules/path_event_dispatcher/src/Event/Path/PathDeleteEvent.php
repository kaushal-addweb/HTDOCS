<?php

namespace Drupal\path_event_dispatcher\Event\Path;

use Drupal\path_event_dispatcher\PathHookEvents;

/**
 * Class PathDeleteEvent.
 */
final class PathDeleteEvent extends AbstractPathEvent {

  /**
   * Getter.
   *
   * @return bool
   *   If it's a redirect.
   */
  public function isRedirect(): bool {
    return FALSE;
  }

  /**
   * Get the dispatcher type.
   *
   * @return string
   *   The dispatcher type.
   */
  public function getDispatcherType(): string {
    return PathHookEvents::PATH_DELETE;
  }

}
