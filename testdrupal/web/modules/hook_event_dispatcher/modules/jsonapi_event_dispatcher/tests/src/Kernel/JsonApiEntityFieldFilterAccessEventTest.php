<?php

namespace Drupal\Tests\jsonapi_event_dispatcher\Kernel;

use Drupal\Core\Access\AccessResult;
use Drupal\jsonapi_event_dispatcher\Event\JsonApiEntityFieldFilterAccessEvent;
use Drupal\jsonapi_event_dispatcher\JsonApiHookEvents;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Class JsonApiEntityFieldFilterAccessEvent.
 *
 * @group hook_event_dispatcher
 * @group jsonapi_event_dispatcher
 *
 * @see jsonapi_event_dispatcher_jsonapi_entity_field_filter_access()
 */
class JsonApiEntityFieldFilterAccessEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'serialization',
    'jsonapi',
    'user',
    'text',
    'entity_test',
    'hook_event_dispatcher',
    'jsonapi_event_dispatcher',
  ];

  /**
   * The field access mapping.
   *
   * @var array
   */
  protected $fieldAccess;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    $this->fieldAccess = [
      'name' => AccessResult::allowed(),
      'created' => AccessResult::neutral(),
      'user_id' => AccessResult::forbidden(),
    ];
  }

  /**
   * Data provider for testJsonApiEntityFieldFilterAccessEvent().
   *
   * @return array
   *   An array of test data.
   */
  public function jsonapiEntityFieldFilterAccessEventProvider(): array {
    return [
      ['name'],
      ['created'],
      ['user_id', AccessDeniedHttpException::class],
    ];
  }

  /**
   * Test JsonapiEntityFieldFilterAccessEvent.
   *
   * @dataProvider jsonapiEntityFieldFilterAccessEventProvider
   *
   * @throws \Exception
   */
  public function testJsonapiEntityFieldFilterAccessEvent(string $fieldName, string $exception = NULL): void {
    if ($exception) {
      $this->expectException($exception);
    }

    $this->listen(JsonApiHookEvents::JSONAPI_ENTITY_FIELD_FILTER_ACCESS, 'onJsonapiEntityFieldFilterAccess');

    $repository = $this->container->get('jsonapi.resource_type.repository');
    $path = $this->container->get('jsonapi.field_resolver')->resolveInternalEntityQueryPath($repository->get('entity_test', 'entity_test'), $fieldName);
    $this->assertEquals($fieldName, $path);
  }

  /**
   * Callback for JsonapiEntityFieldFilterAccessEvent.
   *
   * @param \Drupal\jsonapi_event_dispatcher\Event\JsonApiEntityFieldFilterAccessEvent $event
   *   The event.
   */
  public function onJsonapiEntityFieldFilterAccess(JsonApiEntityFieldFilterAccessEvent $event): void {
    $fieldDefinition = $event->getFieldDefinition();
    $event->setAccessResult($this->fieldAccess[$fieldDefinition->getName()]);
  }

}
