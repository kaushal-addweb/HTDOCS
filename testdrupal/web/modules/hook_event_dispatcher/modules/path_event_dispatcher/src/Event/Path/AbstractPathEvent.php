<?php

namespace Drupal\path_event_dispatcher\Event\Path;

use Drupal\core_event_dispatcher\Event\Entity\AbstractEntityEvent;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class AbstractPathEvent.
 */
abstract class AbstractPathEvent extends AbstractEntityEvent implements EventInterface {

  /**
   * The path alias entity.
   *
   * @var \Drupal\path_alias\PathAliasInterface
   */
  protected $entity;

  /**
   * Getter.
   *
   * @return int
   *   The path id.
   */
  public function getPid(): int {
    return $this->entity->id();
  }

  /**
   * Getter.
   *
   * @return string
   *   The source like '/node/1'.
   */
  public function getSource(): string {
    return $this->entity->getPath();
  }

  /**
   * Getter.
   *
   * @return string
   *   The alias.
   */
  public function getAlias(): string {
    return $this->entity->getAlias();
  }

  /**
   * Getter.
   *
   * @return string
   *   The langcode like 'nl'.
   */
  public function getLangcode(): string {
    return $this->entity->language()->getId();
  }

}
