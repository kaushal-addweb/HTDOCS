<?php

namespace Drupal\toolbar_event_dispatcher\Event\Toolbar;

use Drupal\Component\EventDispatcher\Event;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\toolbar_event_dispatcher\ToolbarHookEvents;

/**
 * Class ToolbarAlterEvent.
 */
class ToolbarAlterEvent extends Event implements EventInterface {

  /**
   * The toolbar items.
   *
   * @var array
   */
  private $items;

  /**
   * ToolbarAlterEvent constructor.
   *
   * @param array $items
   *   The toolbar items.
   */
  public function __construct(array &$items) {
    $this->items = &$items;
  }

  /**
   * Get the items by reference.
   *
   * @return array
   *   The items.
   */
  public function &getItems(): array {
    return $this->items;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return ToolbarHookEvents::TOOLBAR_ALTER;
  }

}
