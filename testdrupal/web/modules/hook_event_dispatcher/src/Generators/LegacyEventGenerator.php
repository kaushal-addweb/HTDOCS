<?php

namespace Drupal\hook_event_dispatcher\Generators;

use DrupalCodeGenerator\Command\BaseGenerator;
use DrupalCodeGenerator\Utils;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class EventGenerator.
 */
class LegacyEventGenerator extends BaseGenerator {

  /**
   * {@inheritdoc}
   */
  protected $name = 'd8:hook:event-dispatcher';

  /**
   * {@inheritdoc}
   */
  protected $description = 'Generates hook event dispatcher class and kernel test';

  /**
   * {@inheritdoc}
   */
  protected $templatePath = __DIR__ . '/../../templates';

  /**
   * {@inheritdoc}
   */
  protected function interact(InputInterface $input, OutputInterface $output) {
    $questions = Utils::moduleQuestions();

    $questions['hook'] = new Question('Hook name (without <options=bold>hook_</> prefix)');
    $questions['hook']->setValidator([Utils::class, 'validateRequired']);

    $questions['sub_namespace'] = new Question('Sub namespace');

    $vars = &$this->collectVars($input, $output, $questions);
    $vars['event_name'] = Utils::camelize($vars['hook']);
    $vars['class'] = $vars['event_name'] . 'Event';
    $vars['type'] = strtoupper($vars['hook']);

    $directory = $vars['sub_namespace'] ? 'src/Event/' . $vars['sub_namespace'] : 'src/Event';
    $this->addFile($directory . '/' . $vars['class'] . '.php')->template('event.twig');

    $testDirectory = $vars['sub_namespace'] ? 'tests/src/Kernel/' . $vars['sub_namespace'] : 'tests/src/Kernel';
    $this->addFile($testDirectory . '/' . $vars['class'] . 'Test.php')->template('kernel.twig');
  }

}
