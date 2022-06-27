<?php

namespace Drupal\modal_page\Service;

use Drupal\Component\Utility\Xss;
use Drupal\Component\Uuid\UuidInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Component\Utility\Html;
use Drupal\path_alias\AliasManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Path\CurrentPathStack;
use Drupal\Core\Entity\EntityStorageException;

/**
 * Modal Page Service Class.
 */
class ModalPageService {

  use StringTranslationTrait;

  /**
   * The UUID service.
   *
   * @var \Drupal\Component\Uuid\UuidInterface
   */
  protected $uuidService;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Path Matcher.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * The current request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * The user current.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The path alias manager.
   *
   * @var \Drupal\path_alias\AliasManagerInterface
   */
  protected $aliasManager;

  /**
   * The current path.
   *
   * @var \Drupal\Core\Path\CurrentPathStack
   */
  protected $currentPath;

  /**
   * The project handler.
   *
   * @var \Drupal\Core\Extension\ProjectHandler
   */
  protected $projectHandler;

  /**
   * Construct of Modal Page service.
   */
  public function __construct(LanguageManagerInterface $language_manager, EntityTypeManagerInterface $entity_manager, ConfigFactoryInterface $config_factory, Connection $database, RequestStack $request_stack, PathMatcherInterface $path_matcher, UuidInterface $uuid_service, AccountProxyInterface $current_user, AliasManagerInterface $alias_manager, ModuleHandlerInterface $project_handler, CurrentPathStack $current_path) {
    $this->languageManager = $language_manager;
    $this->entityTypeManager = $entity_manager;
    $this->pathMatcher = $path_matcher;
    $this->request = $request_stack->getCurrentRequest();
    $this->configFactory = $config_factory;
    $this->database = $database;
    $this->uuidService = $uuid_service;
    $this->currentUser = $current_user;
    $this->aliasManager = $alias_manager;
    $this->projectHandler = $project_handler;
    $this->currentPath = $current_path;
  }

  /**
   * Method to Get Modals to show.
   */
  public function getModalsToShow() {

    // Get Modals to Show.
    $modals = $this->loadModalsToShow();

    if (empty($modals)) {
      return FALSE;
    }

    foreach ($modals as $key => $modal) {

      $body = '';

      // Verify body by string.
      if (is_string($modal->getBody()) && !empty($modal->getBody())) {
        $body = $this->clearText($modal->getBody());
      }

      // Verify by array.
      if (!empty($modal->getBody()['value'])) {
        $body = [
          '#type' => 'processed_text',
          '#text' => $modal->getBody()['value'],
          '#format' => $modal->getBody()['format'],
        ];
      }

      $modal->setBody($body);

      // Default Top Right Button.
      if (empty($modal->getTopRightButtonLabel()) || $modal->getTopRightButtonLabel() == 'x') {
        $modal->setTopRightButtonLabel('&times;');
      }

      if (empty($modal->getEnableDontShowAgainOption())) {
        $modal->setDontShowAgainLabel(FALSE);
      }

      // Default classes for Modal class. If there are user class, include it.
      $modalClass = 'modal fade js-modal-page-show';

      if (!empty($modal->getModalClass())) {
        $modalClass .= ' ' . $modal->getModalClass();
      }

      $modal->setModalClass($modalClass);

      // Header class.
      $headerClass = $modal->getHeaderClass();

      if (empty($modal->getInsertHorizontalLineHeader())) {
        $headerClass .= ' modal-no-border';
        $modal->setHeaderClass($headerClass);
      }

      // Other class.
      $footerClass = $modal->getFooterClass();

      if (empty($modal->getInsertHorizontalLineFooter())) {
        $footerClass .= ' modal-no-border';
        $modal->setFooterClass($footerClass);
      }

      // Prepare Get close Modal Esc Key.
      $closeModalEscKey = 'true';
      if (empty($modal->getCloseModalEscKey())) {
        $closeModalEscKey = 'false';
      }

      $modal->setCloseModalEscKey($closeModalEscKey);

      // Prepare Get close Modal clicking Outside.
      $closeModalClickingOutside = 'true';
      if (empty($modal->getCloseModalClickingOutside())) {
        $closeModalClickingOutside = 'static';
      }

      $modal->setCloseModalClickingOutside($closeModalClickingOutside);

      $modals[$key] = $modal;
    }

    return $modals;
  }

  /**
   * Get modal to show.
   *
   * @return object
   *   Return the modal to show.
   */
  public function loadModalsToShow() {
    $modalToShow = FALSE;
    $modalsToShow = [];
    $currentPath = $this->getCurrentPath();
    $parameters = $this->request->query->all();
    $modalParameter = empty($parameters['modal']) ? FALSE : Html::escape($parameters['modal']);

    if (!empty($modalParameter)) {
      $modalParameter = $this->clearText($modalParameter);
    }

    $modals = $this->entityTypeManager->getStorage('modal')->loadMultiple();

    foreach ($modals as $modal) {

      if (empty($modal->getPublished())) {
        continue;
      }

      if (empty($modal->getType())) {
        continue;
      }

      $modalType = $modal->getType();

      switch ($modalType) {
        case 'page':
          $modalToShow = $this->getModalToShowByPage($modal, $currentPath);

          break;

        case 'parameter':
          $modalToShow = $this->getModalToShowByParameter($modal, $modalParameter);
          break;
      }

      // Return Modal if there isn't restriction configured or if user has
      // permission.
      if (!empty($modalToShow) && $this->verifyUserHasPermissionOnModal($modalToShow)) {

        if (empty($this->verifyModalShouldAppearOnThisLanguage($modalToShow))) {
          continue;
        }

        // Get Modal ID.
        $modalId = $modalToShow->id();

        // Enable alter for other projects with HOOK_modal_alter().
        $this->projectHandler->alter('modal', $modalToShow, $modalId);

        // Get Hook Name.
        $hookModalFormIdAlterName = 'modal_' . $modalId;

        // Enable alter for other projects with HOOK_modal_ID_alter().
        $this->projectHandler->alter($hookModalFormIdAlterName, $modalToShow, $modalId);

        $modalsToShow[] = $modalToShow;

      }
    }

    return $modalsToShow;
  }

  /**
   * Verify if the Current User has Permission to Access Modal.
   */
  public function verifyUserHasPermissionOnModal($modal) {

    if (empty(array_filter($modal->getRoles()))) {
      return TRUE;
    }

    /** @var \Drupal\user\Entity\User $user */
    $user = $this->entityTypeManager->getStorage('user')->load($this->currentUser->id());

    if (empty($user) || empty($modal->getRoles())) {
      return FALSE;
    }

    $roles = $modal->getRoles();

    foreach ($roles as $roleId => $role) {

      // If value is = 0, we can skip.
      if (empty($role)) {
        return FALSE;
      }

      if (!empty($roleId) && $user->hasRole($roleId)) {
        return TRUE;
      }

    }

    return FALSE;
  }

  /**
   * Method to verify if this Modal Should Appear On This Language.
   */
  public function verifyModalShouldAppearOnThisLanguage($modal) {

    // Verify Site Language and Modal Language.
    $languagesToShow = $modal->getLanguagesToShow();

    // Clear 0 values.
    $languagesToShow = array_filter($languagesToShow);

    // If none are selected on this Modal, show it.
    if (empty($languagesToShow)) {
      return TRUE;
    }

    $langCode = $this->languageManager->getCurrentLanguage()->getId();

    // If this language is present on array "Languages to Show" show it.
    if (!empty($languagesToShow[$langCode])) {
      return TRUE;
    }

    return FALSE;
  }

  /**
   * Apply the filter on text.
   */
  public function clearText($text) {
    if (empty(is_string($text))) {
      $text = (string) $text;
    }
    $text = Xss::filter($text, $this->getAllowTags());
    return trim($text);
  }

  /**
   * Get the current path.
   *
   * @return string
   *   The current path.
   */
  public function getCurrentPath() :string {
    // $currentPath = ltrim($this->request->getRequestUri(), '/');.
    $currentPath = $this->request->getRequestUri();
    if ($this->pathMatcher->isFrontPage()) {
      $currentPath = '<front>';
    }
    return $currentPath;
  }

  /**
   * Get the modal by page.
   *
   * @param object $modal
   *   The object modal.
   * @param string $currentPath
   *   The current path.
   *
   * @return object
   *   Retunr the modal.
   */
  public function getModalToShowByPage($modal, $currentPath) {
    $pages = $modal->getPages();
    $pages = explode(PHP_EOL, $pages);
    // Filter entries and reset the array index.
    $pages = array_filter($pages);
    $pages = array_values($pages);

    if (empty($pages)) {
      return $modal;
    }

    foreach ($pages as $page) {

      $path = mb_strtolower($page);

      $path = trim($path);
      // Check if the modal is displayed on front page.
      if ($path == '<front>' && $currentPath == '<front>') {
        return $modal;
      }

      if ($path != '<front>') {
        $path = Xss::filter($path);
      }

      $path = trim($path);

      $currentPath = $this->currentPath->getPath();
      $currentPath = $this->aliasManager->getAliasByPath($currentPath);

      if (strpos($currentPath, '/node/') !== FALSE && strpos($currentPath, '/node/') === 0) {
        $currentPath = $this->aliasManager->getAliasByPath($currentPath);
      }

      $currentPath = mb_strtolower($currentPath);

      $shouldAppear = $this->verifyModalShouldAppearOnThisPath($path, $currentPath);

      if (!empty($shouldAppear)) {
        return $modal;
      }
    }
  }

  /**
   * Verify if this Modal Should Appear on This Path.
   *
   * @return bool
   *   Return TRUE or FALSE.
   */
  public function verifyModalShouldAppearOnThisPath($path, $currentPath) {
    $path = preg_quote($path, '/');
    $path = str_replace('\*', '.*', $path);
    return preg_match('/^' . $path . '$/i', $currentPath);
  }

  /**
   * Get the modal by parameter.
   *
   * @param object $modal
   *   The object modal.
   * @param string $modalParamenter
   *   The string text of parameters.
   *
   * @return bool
   *   Return modal or false.
   */
  public function getModalToShowByParameter($modal, $modalParamenter) {
    $parameters = $modal->getParameters();

    $parameters = explode(PHP_EOL, $parameters);

    foreach ($parameters as $parameter) {
      $parameter = trim($parameter);
      if ($modalParamenter == $parameter) {
        return $modal;
      }
    }
    return FALSE;
  }

  /**
   * Allowed tags on modal page.
   *
   * @return array
   *   Return the tags allowed.
   */
  public function getAllowTags() :array {
    $config = $this->configFactory->get('modal_page.settings');
    $allowedTags = $config->get('allowed_tags') ??
      "h1,h2,a,b,big,code,del,em,i,ins,pre,q,small,span,strong,sub,sup,tt,ol,ul,li,p,br,img";
    $tags = explode(",", $allowedTags);

    return $tags;
  }

  /**
   * Import Modal Config to Entity.
   */
  public function importModalConfigToEntity() {

    $language = $this->languageManager->getCurrentLanguage()->getId();

    $config = $this->configFactory->get('modal_page.settings');

    $modals = $config->get('modals');

    $modalsByParameter = $config->get('modals_by_parameter');

    $allowTags = $this->getAllowTags();

    if (empty($modals) && empty($modalsByParameter)) {
      return FALSE;
    }

    if (!empty($modals)) {

      $modalsSettings = explode(PHP_EOL, $modals);

      foreach ($modalsSettings as $modal_settings) {

        $modal = explode('|', $modal_settings);

        $path = $modal[0];

        if ($path != '<front>') {
          $path = Xss::filter($modal[0]);
        }

        $path = trim($path);
        $path = ltrim($path, '/');

        $title = Xss::filter($modal[1], $allowTags);
        $title = trim($title);

        $text = Xss::filter($modal[2], $allowTags);
        $text = trim($text);

        $button = Xss::filter($modal[3]);
        $button = trim($button);

        $uuid = $this->uuidService->generate();

        $modal = [
          'uuid' => $uuid,
          'title' => $title,
          'body' => $text,
          'type' => 'page',
          'pages' => $path,
          'ok_label_button' => $button,
          'langcode' => $language,
          'created' => time(),
          'changed' => time(),
        ];

        $query = $this->database->insert('modal');
        $query->fields($modal);
        $query->execute();
      }
    }

    if (!empty($modalsByParameter)) {

      $modalsSettings = explode(PHP_EOL, $modalsByParameter);

      foreach ($modalsSettings as $modal_settings) {

        $modal = explode('|', $modal_settings);

        $parameter_settings = Xss::filter($modal[0]);

        $parameter = trim($parameter_settings);

        $parameter_data = explode('=', $parameter);

        $parameter_value = $parameter_data[1];

        $title = Xss::filter($modal[1], $allowTags);
        $title = trim($title);

        $text = Xss::filter($modal[2], $allowTags);
        $text = trim($text);

        $button = Xss::filter($modal[3]);
        $button = trim($button);

        $uuid = $this->uuidService->generate();

        $modal = [
          'uuid' => $uuid,
          'title' => $title,
          'body' => $text,
          'type' => 'parameter',
          'parameters' => $parameter_value,
          'ok_label_button' => $button,
          'langcode' => $language,
          'created' => time(),
          'changed' => time(),
        ];

        $query = $this->database->insert('modal');
        $query->fields($modal);
        $query->execute();

      }
    }
  }

  /**
   * Prepare class.
   */
  public function prepareClass($class) {

    if (empty($class)) {
      return FALSE;
    }

    $class = strtolower($class);

    $class = str_replace(',', ' ', $class);

    $class = str_replace('  ', ' ', $class);

    return $class;
  }

  /**
   * Parse an HTML snippet for any linked file with data-entity-uuid attributes.
   *
   * @param string $text
   *   The partial (X)HTML snippet to load. Invalid markup will be corrected on
   *   import.
   *
   * @return array
   *   An array of all found UUIDs.
   */
  public function extractFilesUuid($text) {
    $dom = Html::load($text);
    $xpath = new \DOMXPath($dom);
    $uuids = [];
    foreach ($xpath->query('//*[@data-entity-type="file" and @data-entity-uuid]') as $file) {
      $uuids[] = $file->getAttribute('data-entity-uuid');
    }

    return $uuids;
  }

  /**
   * Records file usage of files referenced by formatted text fields.
   *
   * Every referenced file that does not yet have the FILE_STATUS_PERMANENT
   * state, will be given that state.
   *
   * @param array $uuids
   *   An array of file entity UUIDs.
   */
  public function recordFileUsage(array $uuids) {
    try {
      foreach ($uuids as $uuid) {
        // We're not using DI to avoid issues on construct.
        if ($file = \Drupal::service('entity.repository')->loadEntityByUuid('file', $uuid)) {
          if ($file->status !== FILE_STATUS_PERMANENT) {
            $file->status = FILE_STATUS_PERMANENT;
            $file->save();
          }
        }
      }
    }
    catch (EntityStorageException $exception) {
      $this->logger('modal_page')->warning($exception->getMessage());
    }
  }

}
