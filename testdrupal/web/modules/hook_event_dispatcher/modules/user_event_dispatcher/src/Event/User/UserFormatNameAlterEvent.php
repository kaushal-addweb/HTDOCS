<?php

namespace Drupal\user_event_dispatcher\Event\User;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Session\AccountInterface;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\user_event_dispatcher\UserHookEvents;

/**
 * Class UserFormatNameAlterEvent.
 */
final class UserFormatNameAlterEvent extends Event implements EventInterface {

  /**
   * Name.
   *
   * @var string
   */
  private $name;

  /**
   * Account.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  private $account;

  /**
   * UserFormatNameAlterEvent constructor.
   *
   * @param string|\Drupal\Component\Render\MarkupInterface $name
   *   Name.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Account.
   */
  public function __construct(&$name, AccountInterface $account) {
    $this->name = &$name;
    $this->account = $account;
  }

  /**
   * Get the name by reference.
   *
   * @return string
   *   Name.
   */
  public function &getName(): string {
    return $this->name;
  }

  /**
   * Get the account.
   *
   * @return \Drupal\Core\Session\AccountInterface
   *   Account.
   */
  public function getAccount(): AccountInterface {
    return $this->account;
  }

  /**
   * Get the dispatcher type.
   *
   * @return string
   *   The dispatcher type.
   */
  public function getDispatcherType(): string {
    return UserHookEvents::USER_FORMAT_NAME_ALTER;
  }

}
