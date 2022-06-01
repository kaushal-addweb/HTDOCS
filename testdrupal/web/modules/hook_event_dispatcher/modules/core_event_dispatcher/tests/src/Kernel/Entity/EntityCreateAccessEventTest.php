<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Entity;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Access\AccessResultInterface;
use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\core_event_dispatcher\Event\Entity\EntityCreateAccessEvent;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class EntityCreateAccessEvent.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @covers core_event_dispatcher_entity_create_access()
 * @covers \Drupal\core_event_dispatcher\Event\Entity\EntityCreateAccessEvent
 *
 * @see core_event_dispatcher_entity_create_access()
 */
class EntityCreateAccessEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'user',
    'entity_test',
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * The access result.
   *
   * @var \Drupal\Core\Access\AccessResultInterface
   */
  protected $accessResult;

  /**
   * Test EntityCreateAccessEvent.
   *
   * @dataProvider entityCreateAccessEventProvider
   *
   * @throws \Exception
   */
  public function testEntityCreateAccessEvent(AccessResultInterface $accessResult, bool $access): void {
    $this->listen(EntityHookEvents::ENTITY_CREATE_ACCESS, 'onEntityCreateAccess');

    $this->accessResult = $accessResult;

    $accessControlHandler = $this->container->get('entity_type.manager')->getAccessControlHandler('entity_test');
    $context = [
      'test' => TRUE,
    ];

    $this->assertEquals($access, $accessControlHandler->createAccess('test_bundle', NULL, $context));
  }

  /**
   * Callback for EntityCreateAccessEvent.
   *
   * @param \Drupal\core_event_dispatcher\Event\Entity\EntityCreateAccessEvent $event
   *   The event.
   */
  public function onEntityCreateAccess(EntityCreateAccessEvent $event): void {
    $context = $event->getContext();
    $this->assertNotEmpty($context['test']);
    $this->assertEquals('test_bundle', $event->getEntityBundle());

    $event->addAccessResult($this->accessResult);
  }

  /**
   * Data provider for testEntityCreateAccessEvent.
   */
  public function entityCreateAccessEventProvider(): array {
    return [
      [AccessResult::allowed(), TRUE],
      [AccessResult::forbidden(), FALSE],
      [AccessResult::neutral(), FALSE],
    ];
  }

}
