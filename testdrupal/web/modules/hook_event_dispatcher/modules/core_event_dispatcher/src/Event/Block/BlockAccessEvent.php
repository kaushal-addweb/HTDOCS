<?php

namespace Drupal\core_event_dispatcher\Event\Block;

use Drupal\block\BlockInterface;
use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Access\AccessResultNeutral;
use Drupal\Core\Session\AccountInterface;
use Drupal\core_event_dispatcher\BlockHookEvents;
use Drupal\hook_event_dispatcher\Event\AccessEventInterface;
use Drupal\hook_event_dispatcher\Event\AccessEventTrait;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class BlockAccessEvent.
 */
class BlockAccessEvent extends Event implements EventInterface, AccessEventInterface {

  use AccessEventTrait;

  /**
   * The block instance.
   *
   * @var \Drupal\block\BlockInterface
   */
  protected $block;

  /**
   * BlockBuildAlterEvent constructor.
   */
  public function __construct(BlockInterface $block, string $operation, AccountInterface $account) {
    $this->block = $block;
    $this->operation = $operation;
    $this->account = $account;
    $this->accessResult = AccessResultNeutral::neutral();
  }

  /**
   * Get the block instance.
   *
   * @return \Drupal\block\BlockInterface
   *   The block instance.
   */
  public function getBlock(): BlockInterface {
    return $this->block;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return BlockHookEvents::BLOCK_ACCESS;
  }

}
