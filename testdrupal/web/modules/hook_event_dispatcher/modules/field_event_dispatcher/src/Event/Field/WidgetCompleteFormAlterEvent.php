<?php

namespace Drupal\field_event_dispatcher\Event\Field;

use Drupal\Component\EventDispatcher\Event;
use Drupal\Core\Form\FormStateInterface;
use Drupal\field_event_dispatcher\FieldHookEvents;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class WidgetCompleteFormAlterEvent.
 */
class WidgetCompleteFormAlterEvent extends Event implements EventInterface {

  /**
   * The field widget form element.
   *
   * @var array
   */
  protected $widgetCompleteForm;

  /**
   * The form state.
   *
   * @var \Drupal\Core\Form\FormStateInterface
   */
  protected $formState;

  /**
   * The context.
   *
   * @var array
   */
  protected $context;

  /**
   * WidgetCompleteFormAlterEvent constructor.
   *
   * @param array $widgetCompleteForm
   *   The field widget form element as constructed by
   *   \Drupal\Core\Field\WidgetBaseInterface::form().
   * @param \Drupal\Core\Form\FormStateInterface $formState
   *   The current state of the form.
   * @param array $context
   *   An associative array containing the following key-value pairs:
   *   - form: The form structure to which widgets are being attached. This may
   *     be a full form structure, or a sub-element of a larger form.
   *   - widget: The widget plugin instance.
   *   - items: The field values, as a
   *     \Drupal\Core\Field\FieldItemListInterface object.
   *   - delta: The order of this item in the array of subelements (0, 1, 2,
   *     etc).
   *   - default: A boolean indicating whether the form is being shown as a
   *     dummy form to set default values.
   */
  public function __construct(array &$widgetCompleteForm, FormStateInterface $formState, array $context) {
    $this->widgetCompleteForm = &$widgetCompleteForm;
    $this->formState = $formState;
    $this->context = $context;
  }

  /**
   * Get the field widget form element.
   *
   * @return array
   *   The field widget form element.
   */
  public function &getWidgetCompleteForm(): array {
    return $this->widgetCompleteForm;
  }

  /**
   * Get the elements.
   *
   * @return array
   *   The elements.
   */
  public function &getElements(): array {
    return $this->widgetCompleteForm['widget'];
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
    return FieldHookEvents::WIDGET_COMPLETE_FORM_ALTER;
  }

}
