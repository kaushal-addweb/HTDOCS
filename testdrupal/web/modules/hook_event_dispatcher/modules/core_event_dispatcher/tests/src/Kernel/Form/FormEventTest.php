<?php

namespace Drupal\Tests\core_event_dispatcher\Kernel\Form;

use Drupal\Core\Form\FormState;
use Drupal\core_event_dispatcher\Event\Form\AbstractFormEvent;
use Drupal\core_event_dispatcher\FormHookEvents;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

/**
 * Class FormEventTest.
 *
 * @group hook_event_dispatcher
 * @group core_event_dispatcher
 *
 * @see \core_event_dispatcher_form_alter()
 */
class FormEventTest extends KernelTestBase {

  use ListenerTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'hook_event_dispatcher',
    'core_event_dispatcher',
  ];

  /**
   * Test form alter events.
   *
   * @throws \Exception
   */
  public function testFormAlterEvent(): void {
    $this->listen([
      FormHookEvents::FORM_ALTER,
      'hook_event_dispatcher.form_test_form.alter',
      'hook_event_dispatcher.form_base_test_base_form.alter',
    ], 'onFormAlter', $this->exactly(3));

    $form = [
      'test' => 'form',
    ];

    $formState = new FormState();
    $formState->set('test', TRUE);
    $formState->addBuildInfo('base_form_id', 'test_base_form');

    $this->container->get('form_builder')->prepareForm('test_form', $form, $formState);
    $this->assertEquals('test_altered', $form['test']);
  }

  /**
   * Callback for form alter events.
   *
   * @param \Drupal\core_event_dispatcher\Event\Form\AbstractFormEvent $event
   *   The event.
   */
  public function onFormAlter(AbstractFormEvent $event): void {
    $form = &$event->getForm();
    $form['test'] = 'test_altered';

    $formState = $event->getFormState();
    $this->assertTrue($formState->has('test'));
    $this->assertTrue($formState->get('test'));

    $this->assertEquals('test_form', $event->getFormId());
  }

}
