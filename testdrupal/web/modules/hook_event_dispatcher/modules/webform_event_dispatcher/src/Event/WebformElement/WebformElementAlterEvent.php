<?php

namespace Drupal\webform_event_dispatcher\Event\WebformElement;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Form\FormStateInterface;
use Drupal\hook_event_dispatcher\Event\EventInterface;
use Drupal\webform_event_dispatcher\WebformHookEvents;

/**
 * Class WebformElementAlterEvent.
 */
class WebformElementAlterEvent extends Event implements EventInterface {

  /**
   * The webform element.
   *
   * @var array
   */
  private $element;

  /**
   * The form state.
   *
   * @var \Drupal\Core\Form\FormStateInterface
   */
  private $formState;

  /**
   * The context.
   *
   * @var array
   */
  private $context;

  /**
   * WebformElementAlterEvent constructor.
   *
   * @param array $element
   *   The webform element.
   * @param \Drupal\Core\Form\FormStateInterface $formState
   *   The current state of the form.
   * @param array $context
   *   An associative array containing the following key-value pairs:
   *   - form: The form structure to which elements is being attached.
   */
  public function __construct(array &$element, FormStateInterface $formState, array $context) {
    $this->element = &$element;
    $this->formState = $formState;
    $this->context = $context;
  }

  /**
   * Get the webform element.
   *
   * @return array
   *   The element.
   */
  public function &getElement(): array {
    return $this->element;
  }

  /**
   * Get the webform element type.
   *
   * @return string
   *   The webform element type.
   */
  public function getElementType(): string {
    return $this->getElement()['#type'];
  }

  /**
   * Get the form state.
   *
   * @return \Drupal\Core\Form\FormStateInterface
   *   The form state.
   */
  public function getFormState(): FormStateInterface {
    return $this->formState;
  }

  /**
   * Get the context.
   *
   * @return array
   *   The context.
   */
  public function getContext(): array {
    return $this->context;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return WebformHookEvents::WEBFORM_ELEMENT_ALTER;
  }

}
