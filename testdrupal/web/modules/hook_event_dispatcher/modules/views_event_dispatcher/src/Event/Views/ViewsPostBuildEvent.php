<?php

namespace Drupal\views_event_dispatcher\Event\Views;

use Drupal\views_event_dispatcher\ViewsHookEvents;

/**
 * Class ViewsPostBuildEvent.
 */
class ViewsPostBuildEvent extends AbstractViewsEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return ViewsHookEvents::VIEWS_POST_BUILD;
  }

}
