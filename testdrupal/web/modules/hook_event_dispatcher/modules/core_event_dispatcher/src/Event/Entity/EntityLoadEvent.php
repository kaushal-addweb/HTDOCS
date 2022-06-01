<?php

namespace Drupal\core_event_dispatcher\Event\Entity;

use Drupal\Component\EventDispatcher\Event;
use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class EntityLoadEvent.
 */
class EntityLoadEvent extends Event implements EventInterface {

  /**
   * The entities.
   *
   * @var array
   */
  private $entities;

  /**
   * The entity type id.
   *
   * @var string
   */
  private $entityTypeId;

  /**
   * EntityLoadEvent constructor.
   *
   * @param array $entities
   *   The entities.
   * @param string $entityTypeId
   *   The entity type id.
   */
  public function __construct(array $entities, string $entityTypeId) {
    $this->entities = $entities;
    $this->entityTypeId = $entityTypeId;
  }

  /**
   * Get the entities.
   *
   * @return array
   *   The entities.
   */
  public function getEntities(): array {
    return $this->entities;
  }

  /**
   * Get the entity type id.
   *
   * @return string
   *   The entity type id.
   */
  public function getEntityTypeId(): string {
    return $this->entityTypeId;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return EntityHookEvents::ENTITY_LOAD;
  }

}
