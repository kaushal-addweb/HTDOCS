<?php

namespace Drupal\hook_event_dispatcher\Generators;

use DrupalCodeGenerator\Command\ModuleGenerator;
use DrupalCodeGenerator\Utils;

/**
 * Class EventGenerator.
 */
class EventGenerator extends ModuleGenerator {

  /**
   * {@inheritdoc}
   */
  protected string $name = 'hook:event-dispatcher';

  /**
   * {@inheritdoc}
   */
  protected string $description = 'Generates hook event dispatcher class and kernel test';

  /**
   * {@inheritdoc}
   */
  protected string $templatePath = __DIR__ . '/../../templates';

  /**
   * {@inheritdoc}
   */
  protected function generate(array &$vars): void {
    $this->collectDefault($vars);

    /** @var callable $validator */
    $validator = [$this, 'validateRequired'];
    $vars['hook'] = $this->ask('Hook name (without <options=bold>hook_</> prefix)', NULL, $validator);
    $vars['sub_namespace'] = $this->ask('Sub namespace');

    $vars['event_name'] = Utils::camelize($vars['hook']);
    $vars['class'] = $vars['event_name'] . 'Event';
    $vars['type'] = strtoupper($vars['hook']);

    $this->addFile($vars['sub_namespace'] ? 'src/Event/{sub_namespace}/{class}.php' : 'src/Event/{class}.php')->template('event.twig');
    $this->addFile($vars['sub_namespace'] ? 'tests/src/Kernel/{sub_namespace}/{class}Test.php' : 'tests/src/Kernel/{class}Test.php')->template('kernel.twig');
  }

}
