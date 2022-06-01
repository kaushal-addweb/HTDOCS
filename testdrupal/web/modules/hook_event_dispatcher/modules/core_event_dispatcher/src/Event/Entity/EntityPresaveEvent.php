<?php

namespace Drupal\core_event_dispatcher\Event\Entity;

use Drupal\Core\Entity\EntityInterface;
use Drupal\core_event_dispatcher\EntityHookEvents;

/**
 * Class EntityPresaveEvent.
 */
class EntityPresaveEvent extends AbstractEntityEvent {

  /**
   * Get the original Entity.
   *
   * @return \Drupal\Core\Entity\EntityInterface|null
   *   The original entity.
   *
   * @see hook_entity_update()
   */
  public function getOriginalEntity(): ?EntityInterface {
    return $this->entity->original ?? NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return EntityHookEvents::ENTITY_PRE_SAVE;
  }

}
