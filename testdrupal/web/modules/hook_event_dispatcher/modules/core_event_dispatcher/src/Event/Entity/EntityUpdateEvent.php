<?php

namespace Drupal\core_event_dispatcher\Event\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\core_event_dispatcher\EntityHookEvents;

/**
 * Class EntityUpdateEvent.
 */
class EntityUpdateEvent extends AbstractEntityEvent {

  /**
   * Get the original Entity.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The original entity.
   *
   * @see hook_entity_update()
   */
  public function getOriginalEntity(): EntityInterface {
    return $this->entity->original;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return EntityHookEvents::ENTITY_UPDATE;
  }

}
