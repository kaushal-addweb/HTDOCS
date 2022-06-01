<?php

namespace Drupal\core_event_dispatcher\Event\Theme;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Asset\AttachedAssetsInterface;
use Drupal\core_event_dispatcher\ThemeHookEvents;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class JsAlterEvent.
 */
final class JsAlterEvent extends Event implements EventInterface {

  /**
   * Javascript.
   *
   * @var array
   */
  private $javascript;

  /**
   * AttachedAssets.
   *
   * @var \Drupal\Core\Asset\AttachedAssetsInterface
   */
  private $attachedAssets;

  /**
   * JsAlterEvent constructor.
   *
   * @param array $javascript
   *   Javascript.
   * @param \Drupal\Core\Asset\AttachedAssetsInterface $attachedAssets
   *   AttachedAssets.
   */
  public function __construct(
    array &$javascript,
    AttachedAssetsInterface $attachedAssets
  ) {
    $this->javascript = &$javascript;
    $this->attachedAssets = $attachedAssets;
  }

  /**
   * Get the javascript.
   *
   * @return array
   *   Javascript.
   */
  public function &getJavascript(): array {
    return $this->javascript;
  }

  /**
   * Get the attached assets.
   *
   * @return \Drupal\Core\Asset\AttachedAssetsInterface
   *   AttachedAssets.
   */
  public function getAttachedAssets(): AttachedAssetsInterface {
    return $this->attachedAssets;
  }

  /**
   * Get the dispatcher type.
   *
   * @return string
   *   The dispatcher type.
   */
  public function getDispatcherType(): string {
    return ThemeHookEvents::JS_ALTER;
  }

}
