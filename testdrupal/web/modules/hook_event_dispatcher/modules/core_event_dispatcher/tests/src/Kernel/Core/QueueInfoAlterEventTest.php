<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Core;

use Drupal\core_event_dispatcher\CoreHookEvents;
use Drupal\core_event_dispatcher\Event\Core\QueueInfoAlterEvent;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class QueueInfoAlterEventTest.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @see \core_event_dispatcher_queue_info_alter()
 */
class QueueInfoAlterEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'cron_queue_test',
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * Test the QueueInfoAlterEvent.
   *
   * @throws \Exception
   */
  public function testQueueInfoAlterEvent(): void {
    $this->listen(CoreHookEvents::QUEUE_INFO_ALTER, 'onQueueInfoAlter');
    $queues = $this->container->get('plugin.manager.queue_worker')->getDefinitions();
    $this->assertArrayHasKey('cron_queue_test_broken_queue', $queues);
    $this->assertEquals('Test altered', $queues['cron_queue_test_broken_queue']['title']);
  }

  /**
   * Callback for QueueInfoAlterEvent.
   *
   * @param \Drupal\core_event_dispatcher\Event\Core\QueueInfoAlterEvent $event
   *   The event.
   */
  public function onQueueInfoAlter(QueueInfoAlterEvent $event): void {
    $queues = &$event->getQueues();
    $this->assertArrayHasKey('cron_queue_test_broken_queue', $queues);
    $this->assertNotEquals('Test altered', $queues['cron_queue_test_broken_queue']['title']);
    $queues['cron_queue_test_broken_queue']['title'] = 'Test altered';
  }

}
