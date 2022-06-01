<?php

namespace Drupal\core_event_dispatcher\Event\Entity;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Access\AccessResultNeutral;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\hook_event_dispatcher\Event\AccessEventInterface;
use Drupal\hook_event_dispatcher\Event\AccessEventTrait;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class EntityInsertEvent.
 */
class EntityFieldAccessEvent extends Event implements EventInterface, AccessEventInterface {

  use AccessEventTrait;

  /**
   * The field definition.
   *
   * @var \Drupal\Core\Field\FieldDefinitionInterface
   */
  private $fieldDefinition;

  /**
   * The field item list.
   *
   * @var \Drupal\Core\Field\FieldItemListInterface
   */
  private $items;

  /**
   * EntityFieldAccessEvent constructor.
   *
   * @param string $operation
   *   The operation.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $fieldDefinition
   *   The field definition.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account interface.
   * @param \Drupal\Core\Field\FieldItemListInterface|null $items
   *   The field item list interface.
   */
  public function __construct(
    string $operation,
    FieldDefinitionInterface $fieldDefinition,
    AccountInterface $account,
    FieldItemListInterface $items = NULL
  ) {
    $this->operation = $operation;
    $this->fieldDefinition = $fieldDefinition;
    $this->account = $account;
    $this->items = $items;
    $this->accessResult = AccessResultNeutral::neutral();
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return EntityHookEvents::ENTITY_FIELD_ACCESS;
  }

  /**
   * Get the field definition.
   *
   * @return \Drupal\Core\Field\FieldDefinitionInterface
   *   The field definition.
   */
  public function getFieldDefinition(): FieldDefinitionInterface {
    return $this->fieldDefinition;
  }

  /**
   * Get the items.
   *
   * @return \Drupal\Core\Field\FieldItemListInterface
   *   The items.
   */
  public function getItems(): FieldItemListInterface {
    return $this->items;
  }

}
