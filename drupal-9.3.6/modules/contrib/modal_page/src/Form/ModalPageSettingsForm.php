<?php

namespace Drupal\modal_page\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\PhpStorage\PhpStorageFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\modal_page\Helper\ModalPageSettersTraitHelper;

/**
 * Form for configure messages.
 */
class ModalPageSettingsForm extends ConfigFormBase {

  use ModalPageSettersTraitHelper;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /** @var static $instance */
    $instance = parent::create($container);
    $instance->setModuleHandler($container->get('module_handler'));

    return $instance;
  }

  /**
   * Set Message info.
   */
  public function setMessagesInfo() {

    $type = 'status';

    // Transform to Info if Info Messages is enabled.
    if ($this->moduleHandler->moduleExists('info_messages')) {
      $type = 'info';
    }

    $this->messenger()->addMessage($this->t('You can create your Modal at <a href="@url_settings">@url_settings</a>', [
      '@url_settings' => Url::fromRoute('modal_page.default')->toString(),
    ]), $type);

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'modal_page_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'modal_page.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $this->setMessagesInfo();
    $config = $this->config('modal_page.settings');

    $form['global_settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Global Settings'),
      '#open' => TRUE,
    ];

    $form['global_settings']['bootstrap'] = [
      '#type' => 'details',
      '#title' => $this->t('Bootstrap'),
      '#open' => TRUE,
    ];

    $form['global_settings']['bootstrap']['verify_load_bootstrap_automatically'] = [
      '#title' => $this->t("Verify and Load Bootstrap automatically if necessary (Recommended)"),
      '#type' => 'checkbox',
      '#description' => $this->t("It will verify and load bootstrap.min.js only if you don't have it loaded yet."),
      '#default_value' => $config->get('verify_load_bootstrap_automatically'),
    ];

    $form['global_settings']['bootstrap']['load_bootstrap'] = [
      '#title' => $this->t("Load Bootstrap with Modal Page"),
      '#type' => 'checkbox',
      '#description' => $this->t('It will load bootstrap.min.js. If you already have it loaded in other place you can disable this option.'),
      '#default_value' => $config->get('load_bootstrap'),
      '#states' => [
        'disabled' => [
          ':input[name="verify_load_bootstrap_automatically"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['global_settings']['html_tags'] = [
      '#type' => 'details',
      '#title' => $this->t('HTML Tags'),
      '#open' => TRUE,
    ];

    $form['global_settings']['html_tags']['allowed_tags'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Allowed Tags'),
      '#description' => $this->t("A list of HTML tags that can be used, separated by commas(,)."),
      '#default_value' => $config->get('allowed_tags') ?? "h1,h2,a,b,big,code,del,em,i,ins,pre,q,small,span,strong,sub,sup,tt,ol,ul,li,p,br,img",
    ];

    $form['global_settings']['performance'] = [
      '#type' => 'details',
      '#title' => $this->t('Performance'),
      '#open' => TRUE,
    ];

    $form['global_settings']['performance']['clear_caches_on_modal_save'] = [
      '#title' => $this->t("Clear caches when save Modal"),
      '#type' => 'checkbox',
      '#default_value' => $config->get('clear_caches_on_modal_save'),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $loadBootstrap = $form_state->getValue('load_bootstrap');
    $verifyLoadBootstrapAutomatically = $form_state->getValue('verify_load_bootstrap_automatically');

    $config = $this->config('modal_page.settings');
    $config->set('load_bootstrap', $loadBootstrap);
    $config->set('verify_load_bootstrap_automatically', $verifyLoadBootstrapAutomatically);
    $config->set('allowed_tags', $form_state->getValue('allowed_tags'));
    $config->set('clear_caches_on_modal_save', $form_state->getValue('clear_caches_on_modal_save'));

    $config->save();

    if (!empty($config->get('clear_caches_on_modal_save'))) {
      PhpStorageFactory::get('twig')->deleteAll();
    }

    parent::submitForm($form, $form_state);

  }

}
