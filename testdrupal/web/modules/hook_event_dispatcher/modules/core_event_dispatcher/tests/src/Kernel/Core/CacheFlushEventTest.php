<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Core;

use Drupal\core_event_dispatcher\CoreHookEvents;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class CacheFlushEventTest.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @see core_event_dispatcher_cache_flush()
 */
class CacheFlushEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * Test the cache flush event.
   *
   * @throws \Exception
   */
  public function testCacheFlushEvent(): void {
    $this->listen(CoreHookEvents::CACHE_FLUSH, 'onCacheFlush');

    $this->container->get('module_handler')->invokeAll('cache_flush');
  }

  /**
   * Callback for CacheFlushEvent.
   */
  public function onCacheFlush(): void {
  }

}
