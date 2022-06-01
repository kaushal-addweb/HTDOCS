<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\File;

use Drupal\core_event_dispatcher\Event\File\FileUrlAlterEvent;
use Drupal\core_event_dispatcher\FileHookEvents;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class FileUrlAlterEvent.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @see core_event_dispatcher_file_url_alter()
 */
class FileUrlAlterEventTest extends KernelTestBase {

  use ListenerTrait;

  protected const ORIGINAL_URI = 'public://example.txt';

  protected const ALTERED_URI = 'https://example.com/example.txt';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * Test FileUrlAlterEvent for drupal core >= 9.3.x.
   *
   * @requires function \Drupal\Core\File\FileUrlGenerator::generateAbsoluteString
   *
   * @throws \Exception
   */
  public function testFileUrlAlterEvent(): void {
    $this->listen(FileHookEvents::FILE_URL_ALTER, 'onFileUrlAlter');

    $url = $this->container->get('file_url_generator')->generateAbsoluteString(self::ORIGINAL_URI);
    $this->assertEquals(self::ALTERED_URI, $url);
  }

  /**
   * Test FileUrlAlterEvent for drupal core < 9.3.x.
   *
   * @group Legacy
   *
   * @throws \Exception
   *
   * @deprecated in hook_event_dispatcher:3.1.0 and is removed from
   *   hook_event_dispatcher:4.0.0. Use
   *   \Drupal\Tests\core_event_dispatcher\Kernel\File\FileUrlAlterEventTest::testFileUrlAlterEvent()
   *   instead.
   *
   * @see https://www.drupal.org/node/2940031
   * @see https://www.drupal.org/node/515192
   */
  public function testLegacyFileUrlAlterEvent(): void {
    $this->listen(FileHookEvents::FILE_URL_ALTER, 'onFileUrlAlter');

    $url = file_create_url(self::ORIGINAL_URI);
    $this->assertEquals(self::ALTERED_URI, $url);
  }

  /**
   * Callback for FileUrlAlterEvent.
   *
   * @param \Drupal\core_event_dispatcher\Event\File\FileUrlAlterEvent $event
   *   The event.
   */
  public function onFileUrlAlter(FileUrlAlterEvent $event): void {
    $this->assertEquals(self::ORIGINAL_URI, $event->getUri());
    $event->setUri(self::ALTERED_URI);
  }

}
