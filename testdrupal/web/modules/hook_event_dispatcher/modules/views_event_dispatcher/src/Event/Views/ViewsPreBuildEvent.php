<?php

namespace Drupal\views_event_dispatcher\Event\Views;

use Drupal\views_event_dispatcher\ViewsHookEvents;

/**
 * Class ViewsPreBuildEvent.
 */
class ViewsPreBuildEvent extends AbstractViewsEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return ViewsHookEvents::VIEWS_PRE_BUILD;
  }

}
