<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Language;

use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Url;
use Drupal\core_event_dispatcher\Event\Language\LanguageSwitchLinksAlterEvent;
use Drupal\core_event_dispatcher\LanguageHookEvents;
use Drupal\KernelTests\KernelTestBase;
use Drupal\language\ConfigurableLanguageManager;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class LanguageSwitchLinksAlterEventTest.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @see \core_event_dispatcher_language_switch_links_alter()
 */
class LanguageSwitchLinksAlterEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'language',
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * Test LanguageSwitchLinksAlter.
   *
   * @throws \Exception
   */
  public function testLanguageSwitchLinksAlter(): void {
    $this->listen(LanguageHookEvents::LANGUAGE_SWITCH_LINKS_ALTER, 'onLanguageSwitchLinksAlter');

    $this->config('language.types')->set('negotiation.' . LanguageInterface::TYPE_URL . '.enabled', [
      'language-url' => TRUE,
    ])->save();

    $this->container->get('language_negotiator')->setCurrentUser($this->container->get('current_user'));
    $this->container->get('entity_type.manager')->getStorage('configurable_language')->create([
      'id' => 'en',
    ])->save();

    $languageManager = $this->container->get('language_manager');
    $this->assertInstanceOf(ConfigurableLanguageManager::class, $languageManager);

    $languageSwitchLinks = $languageManager->getLanguageSwitchLinks(LanguageInterface::TYPE_URL, new Url('<current>'));

    $this->assertArrayHasKey('test', $languageSwitchLinks->links);
    $this->assertArrayHasKey('test', $languageSwitchLinks->links['en']['query']);
    $this->assertTrue($languageSwitchLinks->links['en']['query']['test']);
  }

  /**
   * Callback for LanguageSwitchLinksAlterEvent.
   *
   * @param \Drupal\core_event_dispatcher\Event\Language\LanguageSwitchLinksAlterEvent $event
   *   The event.
   */
  public function onLanguageSwitchLinksAlter(LanguageSwitchLinksAlterEvent $event): void {
    $this->assertEquals(LanguageInterface::TYPE_URL, $event->getType());
    $this->assertEquals('<current>', $event->getPath()->getRouteName());

    $event->setLinkForLanguage('test', [
      'url' => new Url('<current>'),
    ]);

    $links = &$event->getLinks();
    $links['en']['query']['test'] = TRUE;
  }

}
