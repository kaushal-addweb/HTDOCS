<?php

namespace Drupal\core_event_dispatcher\Event\Theme;

use Drupal\Component\EventDispatcher\Event;
use Drupal\core_event_dispatcher\ThemeHookEvents;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class ThemesInstalledEvent.
 */
class ThemesInstalledEvent extends Event implements EventInterface {

  /**
   * Theme list.
   *
   * @var array
   */
  private $themeList;

  /**
   * ThemesInstalledEvent constructor.
   *
   * @param array $themeList
   *   Array containing the names of the themes being installed.
   */
  public function __construct(array $themeList) {
    $this->themeList = $themeList;
  }

  /**
   * Get theme list.
   *
   * @return array
   *   Theme list.
   */
  public function getThemeList(): array {
    return $this->themeList;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return ThemeHookEvents::THEMES_INSTALLED;
  }

}
