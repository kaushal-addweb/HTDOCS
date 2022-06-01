<?php

namespace Drupal\views_event_dispatcher\Event\Views;

use Drupal\Component\EventDispatcher\Event;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\views_event_dispatcher\ViewsHookEvents;

/**
 * Class ViewsDataAlterEvent.
 */
final class ViewsDataAlterEvent extends Event implements EventInterface {

  /**
   * Data.
   *
   * @var array
   */
  private $data;

  /**
   * ViewsDataAlterEvent constructor.
   *
   * @param array $data
   *   Data.
   */
  public function __construct(array &$data) {
    $this->data = &$data;
  }

  /**
   * Get data by refence.
   *
   * @return array
   *   Data.
   */
  public function &getData(): array {
    return $this->data;
  }

  /**
   * Get the dispatcher type.
   *
   * @return string
   *   The dispatcher type.
   */
  public function getDispatcherType(): string {
    return ViewsHookEvents::VIEWS_DATA_ALTER;
  }

}
