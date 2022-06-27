<?php

namespace Drupal\modal_page\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Extension\ExtensionList;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Controller routines for help routes.
 */
class ModalHelpController extends ControllerBase {

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * The extension list module.
   *
   * @var \Drupal\Core\Extension\ExtensionList
   */
  protected $extensionListModule;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Creates a new HelpController.
   */
  public function __construct(RouteMatchInterface $route_match, ExtensionList $extension_list_module, ConfigFactoryInterface $config_factory) {
    $this->routeMatch = $route_match;
    $this->extensionListModule = $extension_list_module;
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_route_match'),
      $container->get('extension.list.module'),
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function index() {
    $build = [];
    $projectMachineName = 'modal_page';

    $projectName = $this->moduleHandler()->getName($projectMachineName);

    $build['#title'] = 'Modal Page Help';

    $helperMarkup = $this->moduleHandler()->invoke($projectMachineName, 'help', [
      "help.page.$projectMachineName",
      $this->routeMatch,
    ]);

    if (!is_array($helperMarkup)) {
      $helperMarkup = ['#markup' => $helperMarkup];
    }

    $build['top'] = $helperMarkup;

    // Only print list of administration pages if the project in question has
    // any such pages associated with it.
    $adminTasks = system_get_module_admin_tasks($projectMachineName, $this->extensionListModule->getExtensionInfo($projectMachineName));

    if (empty($adminTasks)) {
      return $build;
    }

    $links = [];

    foreach ($adminTasks as $adminTask) {

      $link['url'] = $adminTask['url'];

      $link['title'] = $adminTask['title'];

      if ($link['url']->getRouteName() === 'modal_page.settings') {
        $link['title'] = 'Modal Settings';
      }

      $links[] = $link;
    }

    $build['links'] = [
      '#theme' => 'links__help',
      '#heading' => [
        'level' => 'h3',
        'text' => $this->t('@project_name administration pages', ['@project_name' => $projectName]),
      ],
      '#links' => $links,
    ];

    return $build;
  }

}
