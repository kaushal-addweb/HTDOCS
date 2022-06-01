<?php

namespace Drupal\user_event_dispatcher\Event\User;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Session\AccountInterface;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\user_event_dispatcher\UserHookEvents;

/**
 * Class UserCancelEvent.
 */
final class UserCancelEvent extends Event implements EventInterface {

  /**
   * The array of form values submitted by the user.
   *
   * @var array
   */
  private $edit;

  /**
   * Account.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  private $account;

  /**
   * The account cancellation method.
   *
   * @var string
   */
  private $method;

  /**
   * UserCancelEvent constructor.
   *
   * @param array $edit
   *   The array of form values submitted by the user.
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Account.
   * @param string $method
   *   The account cancellation method.
   */
  public function __construct(array $edit, AccountInterface $account, string $method) {
    $this->edit = $edit;
    $this->account = $account;
    $this->method = $method;
  }

  /**
   * Get edit array.
   *
   * @return array
   *   The array of form values submitted by the user.
   */
  public function getEdit(): array {
    return $this->edit;
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
   * Get method.
   *
   * @return string
   *   The account cancellation method.
   */
  public function getMethod(): string {
    return $this->method;
  }

  /**
   * Get the dispatcher type.
   *
   * @return string
   *   The dispatcher type.
   */
  public function getDispatcherType(): string {
    return UserHookEvents::USER_CANCEL;
  }

}
