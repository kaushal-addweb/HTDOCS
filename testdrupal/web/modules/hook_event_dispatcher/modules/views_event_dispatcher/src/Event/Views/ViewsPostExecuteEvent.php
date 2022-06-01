<?php

namespace Drupal\views_event_dispatcher\Event\Views;

use Drupal\views_event_dispatcher\ViewsHookEvents;

/**
 * Class ViewsPostExecuteEvent.
 */
class ViewsPostExecuteEvent extends AbstractViewsEvent {

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return ViewsHookEvents::VIEWS_POST_EXECUTE;
  }

}
