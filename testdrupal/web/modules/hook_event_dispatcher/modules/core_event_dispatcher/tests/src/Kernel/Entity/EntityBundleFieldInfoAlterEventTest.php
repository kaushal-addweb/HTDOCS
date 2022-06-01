<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Entity;

use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\core_event_dispatcher\Event\Entity\EntityBundleFieldInfoAlterEvent;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class EntityBundleFieldInfoAlterEventTest.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 */
class EntityBundleFieldInfoAlterEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'entity_test',
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * The bundle machine name.
   *
   * @var string
   */
  protected $bundle;

  /**
   * Test the EntityBundleFieldInfoAlterEvent.
   *
   * @throws \Exception
   */
  public function testEntityBundleFieldInfoAlterEvent(): void {
    $this->bundle = $this->randomMachineName();
    $this->listen(EntityHookEvents::ENTITY_BUNDLE_FIELD_INFO_ALTER, 'onEntityBundleFieldInfoAlter');

    $definitions = $this->container
      ->get('entity_field.manager')
      ->getFieldDefinitions('entity_test', $this->bundle);

    $this->assertArrayHasKey('field_test', $definitions);
    $this->assertEquals('test_altered', $definitions['field_test']);
  }

  /**
   * Callback for EntityBundleFieldInfoAlterEvent.
   *
   * @param \Drupal\core_event_dispatcher\Event\Entity\EntityBundleFieldInfoAlterEvent $event
   *   The event.
   */
  public function onEntityBundleFieldInfoAlter(EntityBundleFieldInfoAlterEvent $event): void {
    $fields = &$event->getFields();
    $fields['field_test'] = 'test_altered';

    $this->assertEquals('entity_test', $event->getEntityType()->id());
    $this->assertEquals($this->bundle, $event->getBundle());
  }

}
