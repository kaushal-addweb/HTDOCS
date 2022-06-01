<?php

namespace Drupal\jsonapi_event_dispatcher\Event;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\hook_event_dispatcher\Event\AccessEventInterface;
use Drupal\hook_event_dispatcher\Event\AccessEventTrait;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\jsonapi_event_dispatcher\JsonApiHookEvents;

/**
 * Class JsonApiEntityFieldFilterAccessEvent.
 */
class JsonApiEntityFieldFilterAccessEvent extends Event implements EventInterface, AccessEventInterface {

  use AccessEventTrait;

  /**
   * The field definition of the field to be filtered upon.
   *
   * @var \Drupal\Core\Field\FieldDefinitionInterface
   */
  protected $fieldDefinition;

  /**
   * JsonapiEntityFieldFilterAccessEvent constructor.
   *
   * @param \Drupal\Core\Field\FieldDefinitionInterface $fieldDefinition
   *   The field definition of the field to be filtered upon.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The account for which to check access.
   */
  public function __construct(FieldDefinitionInterface $fieldDefinition, AccountInterface $account) {
    $this->fieldDefinition = $fieldDefinition;
    $this->account = $account;
  }

  /**
   * Gets the field definition of the field to be filtered upon.
   *
   * @return \Drupal\Core\Field\FieldDefinitionInterface
   *   The field definition of the field to be filtered upon.
   */
  public function getFieldDefinition(): FieldDefinitionInterface {
    return $this->fieldDefinition;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return JsonApiHookEvents::JSONAPI_ENTITY_FIELD_FILTER_ACCESS;
  }

}
