<?php

namespace Drupal\modal_page\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\modal_page\Service\ModalPageService;

/**
 * Class Modal Form to use Entity.
 */
class ModalForm extends EntityForm {


  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * The renderer.
   *
   * @var \Drupal\modal_page\Service\ModalPageService
   */
  protected $modalPageService;

  /**
   * Construct of Modal Page.
   */
  public function __construct(LanguageManagerInterface $language_manager, ConfigFactoryInterface $config_factory, RendererInterface $renderer, ModalPageService $modalPageService) {
    $this->languageManager = $language_manager;
    $this->configFactory = $config_factory;
    $this->renderer = $renderer;
    $this->modalPageService = $modalPageService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('language_manager'),
      $container->get('config.factory'),
      $container->get('renderer'),
      $container->get('modal_page.modals')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\modal_page\Entity\Modal $modal */
    $modal = $this->entity;

    $imagePath = $imageUrl = '/' . drupal_get_path('module', 'modal_page') . '/images/';

    $modalImageMarkup = [
      '#theme' => 'modal_page_helper_admin',
    ];

    $modalImageMarkup = (string) $this->renderer->renderPlain($modalImageMarkup);

    $modalImageAllowedTags = [
      'div',
      'class',
      'button',
      'h4',
      'img',
    ];

    $form['modal_image'] = [
      '#markup' => $modalImageMarkup,
      '#allowed_tags' => $modalImageAllowedTags,
    ];

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#default_value' => $modal->label(),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $modal->id(),
      '#machine_name' => [
        'exists' => '\Drupal\modal_page\Entity\Modal::load',
      ],
      '#disabled' => !$modal->isNew(),
    ];

    $body = $modal->getBody();
    if (empty($body['value'])) {
      $body['value'] = '';
    }
    // Drupal controls the default format value.
    if (empty($body['format'])) {
      $body['format'] = NULL;
    }

    $displayTitle = TRUE;

    if (empty($modal->isNew())) {
      $displayTitle = $modal->getDisplayTitle();
    }

    $form['display_title'] = [
      '#title' => $this->t('Display title'),
      '#type' => 'checkbox',
      '#default_value' => $displayTitle,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
        'checked' => [
          ':input[name="display_title_in_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['body'] = [
      '#title' => $this->t('Body'),
      '#required' => TRUE,
      '#type' => 'text_format',
      '#format' => $body['format'],
      '#default_value' => $body['value'],
    ];

    $form['pages'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Pages'),
      '#format' => 'full_html',
      '#default_value' => $modal->getPages(),
      '#description' => $this->t("One per line. The '*' character is a wildcard. An example path is /admin/* for every admin pages. Leave in blank to show in all pages. @front_key@ is used to front page", ['@front_key@' => '<front>']),
    ];

    $form['pages']['#states']['visible'][] = [':input[id="edit-type"]' => ['value' => 'page']];

    $form['parameters'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Parameters'),
      '#format' => 'full_html',
      '#default_value' => $modal->getParameters(),
      '#description' => $this->t("Parameters for the Modal appear. One per line. An example path is welcome for show in this parameter. In URL should be /page?modal=welcome"),
    ];

    $form['parameters']['#states']['visible'][] = [':input[id="edit-type"]' => ['value' => 'parameter']];

    $autoOpen = $modal->getAutoOpen();

    if ($modal->isNew()) {
      $autoOpen = TRUE;
    }

    $form['auto_open'] = [
      '#title' => $this->t('Auto Open'),
      '#type' => 'checkbox',
      '#default_value' => $autoOpen,
    ];

    $descriptionOpenModalOnElementClick = $this->t('Example: <b>@example_class@</b>. Default is <b>@default_class@</b>', [
      '@example_class@' => '.open-modal-welcome',
      '@default_class@' => '.open-modal-page',
    ]);

    $form['open_modal_on_element_click'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Open this modal clicking on this element'),
      '#default_value' => $modal->getOpenModalOnElementClick(),
      '#description' => $descriptionOpenModalOnElementClick,
    ];

    $form['advanced'] = [
      '#type' => 'vertical_tabs',
      '#default_tab' => 'modal_header',
    ];

    $form['modal_header'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL HEADER'),
      '#group' => 'advanced',
    ];

    $form['modal_header']['enable'] = [
      '#type' => 'details',
      '#title' => $this->t('Modal Header'),
      '#open' => TRUE,
    ];

    $enableModalFooterHeader = $modal->getEnableModalHeader();

    if ($modal->isNew()) {
      $enableModalFooterHeader = TRUE;
    }

    $description = '<a href="' . $imagePath . 'header/modal-header.png" class="modal-image-example">See an example</a>';

    $form['modal_header']['enable']['enable_modal_header'] = [
      '#title' => $this->t('Show Modal Header'),
      '#type' => 'checkbox',
      '#default_value' => $enableModalFooterHeader,
      '#description' => $description,
    ];

    $form['modal_header']['enable']['title'] = [
      '#type' => 'details',
      '#title' => $this->t('Title'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_header']['enable']['title']['display_title_in_modal_header'] = [
      '#title' => $this->t('Display title'),
      '#type' => 'checkbox',
      '#default_value' => $displayTitle,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
        'checked' => [
          ':input[name="display_title"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => '<a href="' . $imagePath . 'header/modal-header-title.png" class="modal-image-example">See an example</a>',
    ];

    $form['modal_header']['enable']['horizontal_line'] = [
      '#type' => 'details',
      '#title' => $this->t('Horizontal Line'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $insertHorizontalLineHeader = $modal->getInsertHorizontalLineHeader();

    if ($modal->isNew()) {
      $insertHorizontalLineHeader = TRUE;
    }

    $form['modal_header']['enable']['horizontal_line']['insert_horizontal_line_header'] = [
      '#title' => $this->t('Insert horizontal line'),
      '#type' => 'checkbox',
      '#default_value' => $insertHorizontalLineHeader,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => '<a href="' . $imagePath . 'header/modal-header-horizontal-line.png" class="modal-image-example">See an example</a>',
    ];

    $form['modal_header']['enable']['header_class_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Class(es)'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $headerClass = $modal->getHeaderClass();

    if ($modal->isNew()) {
      $headerClass = '';
    }

    $form['modal_header']['enable']['header_class_details']['header_class'] = [
      '#title' => $this->t('Class(es)'),
      '#type' => 'textfield',
      '#default_value' => $headerClass,
      '#description' => $this->t('You can use multiple classes separate by spaces'),
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_footer'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL FOOTER'),
      '#group' => 'advanced',
    ];

    $form['modal_footer']['enable'] = [
      '#type' => 'details',
      '#title' => $this->t('Modal footer'),
      '#open' => TRUE,
    ];

    $enableModalFooter = $modal->getEnableModalFooter();

    if ($modal->isNew()) {
      $enableModalFooter = TRUE;
    }

    $form['modal_footer']['enable']['enable_modal_footer'] = [
      '#title' => $this->t('Show Modal Footer'),
      '#type' => 'checkbox',
      '#default_value' => $enableModalFooter,
      '#description' => '<a href="' . $imagePath . 'footer/modal-footer.png" class="modal-image-example">See an example</a>',
    ];

    $form['modal_footer']['enable']['horizontal_line'] = [
      '#type' => 'details',
      '#title' => $this->t('Horizontal Line'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $insertHorizontalLineFooter = $modal->getInsertHorizontalLineFooter();

    if ($modal->isNew()) {
      $insertHorizontalLineFooter = TRUE;
    }

    $form['modal_footer']['enable']['horizontal_line']['insert_horizontal_line_footer'] = [
      '#title' => $this->t('Insert horizontal line'),
      '#type' => 'checkbox',
      '#default_value' => $insertHorizontalLineFooter,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => '<a href="' . $imagePath . 'footer/horizontal-line.png" class="modal-image-example">See an example</a>',
    ];

    $form['modal_footer']['enable']['dont_show_again'] = [
      '#type' => 'details',
      '#title' => $this->t("Don't show again"),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $enableDontShowAgainOption = $modal->getEnableDontShowAgainOption();

    if ($modal->isNew()) {
      $enableDontShowAgainOption = TRUE;
    }

    $form['modal_footer']['enable']['dont_show_again']['enable_dont_show_again_option'] = [
      '#title' => $this->t('Enable option <b>@dont_show_again_label@</b>', [
        '@dont_show_again_label@' => "Don't show again",
      ]),
      '#type' => 'checkbox',
      '#default_value' => $enableDontShowAgainOption,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $dontShowAgainLabel = $modal->getDontShowAgainLabel();

    if ($modal->isNew()) {
      $dontShowAgainLabel = $this->t("Don't show again");
    }

    $form['modal_footer']['enable']['dont_show_again']['dont_show_again_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $dontShowAgainLabel,
      '#description' => $this->t('If blank the value will be <b>@dont_show_again_label@.</b>', [
        '@dont_show_again_label@' => "Don't show again",
      ]) . ' <a href="' . $imagePath . 'footer/dont-show-again-label.png" class="modal-image-example">See an example</a>',
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
        'disabled' => [
          ':input[name="enable_dont_show_again_option"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['modal_footer']['enable']['footer_class_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Class(es)'),
      '#open' => FALSE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $footerClass = $modal->getFooterClass();

    if ($modal->isNew()) {
      $footerClass = '';
    }

    $form['modal_footer']['enable']['footer_class_details']['footer_class'] = [
      '#title' => $this->t('Class(es)'),
      '#type' => 'textfield',
      '#default_value' => $footerClass,
      '#description' => $this->t('You can use multiple classes separate by spaces.'),
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_buttons'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL BUTTONS'),
      '#group' => 'advanced',
    ];

    $form['modal_buttons']['information'] = [
      '#type' => 'details',
      '#title' => $this->t('Information'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => FALSE],
        ],
      ],
    ];

    $form['modal_buttons']['information']['information_message'] = [
      '#markup' => $this->t('To use buttons you need to enable Modal Header and footer') . ' ',
    ];

    $form['modal_buttons']['information']['information_message_enable'] = [
      '#markup' => 'Yes, enable please',
      '#allowed_tags' => ['a'],
      '#prefix' => '<a href="#" class="js-enable-modal-header">',
      '#suffix' => '</a>',
    ];

    $form['modal_buttons']['button_close'] = [
      '#type' => 'details',
      '#title' => $this->t('Button X close'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $displayButtonXclose = TRUE;

    if (empty($modal->isNew())) {
      $displayButtonXclose = $modal->getDisplayButtonXclose();
    }

    $form['modal_buttons']['button_close']['display_button_x_close'] = [
      '#title' => $this->t('Display button "X" to close'),
      '#type' => 'checkbox',
      '#default_value' => $displayButtonXclose,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_header"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => '<a href="' . $imagePath . 'header/modal-header-button-x-close.png" class="modal-image-example">See an example</a>',
    ];

    $topRightButtonLabel = 'x';

    if (!empty($modal->getTopRightButtonLabel())) {
      $topRightButtonLabel = $modal->getTopRightButtonLabel();
    }

    $form['modal_buttons']['button_close']['top_right_button_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $topRightButtonLabel,
      '#description' => $this->t('If blank the value will be <b>@default_label@</b>.', [
        '@default_label@' => "x",
      ]),
      '#states' => [
        'enabled' => [
          ':input[name="display_button_x_close"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $topRightButtonClass = '';

    if (!empty($modal->getTopRightButtonClass())) {
      $topRightButtonClass = $modal->getTopRightButtonClass();
    }

    $form['modal_buttons']['button_close']['top_right_button_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Class(es)'),
      '#default_value' => $topRightButtonClass,
      '#description' => $this->t('You can use multiple classes separate by spaces'),
      '#states' => [
        'enabled' => [
          ':input[name="display_button_x_close"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_buttons']['ok_button'] = [
      '#type' => 'details',
      '#title' => $this->t('Right Button'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $enableRightButton = $modal->getEnableRightButton();

    if ($modal->isNew()) {
      $enableRightButton = TRUE;
    }

    $form['modal_buttons']['ok_button']['enable_right_button'] = [
      '#title' => $this->t('Enable "OK" Button'),
      '#type' => 'checkbox',
      '#default_value' => $enableRightButton,
      '#description' => '<a href="' . $imagePath . 'header/modal-header-button-x-close.png" class="modal-image-example">See an example</a>',
    ];

    $okLabelButton = $modal->getOkLabelButton();

    if ($modal->isNew()) {
      $okLabelButton = $this->t('OK');
    }

    $form['modal_buttons']['ok_button']['ok_label_button'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $okLabelButton,
      '#description' => $this->t('If blank the value will be <b>@default_label@</b>.', [
        '@default_label@' => 'OK',
      ]) . ' <a href="' . $imagePath . 'buttons/ok-label-button.png" class="modal-image-example">See an example</a>',
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
        'enabled' => [
          ':input[name="enable_right_button"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $okButtonClass = '';

    if (!empty($modal->getOkButtonClass())) {
      $okButtonClass = $modal->getOkButtonClass();
    }

    $form['modal_buttons']['ok_button']['ok_button_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Class(es)'),
      '#default_value' => $okButtonClass,
      '#description' => $this->t('You can use multiple classes separate by spaces'),
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
        'enabled' => [
          ':input[name="enable_right_button"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_buttons']['left_button'] = [
      '#type' => 'details',
      '#title' => $this->t('Left Button'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
      '#description' => '<a href="' . $imagePath . 'buttons/left-button.png" class="modal-image-example">See an example</a>',
    ];

    $enableLeftButton = FALSE;

    if (!empty($modal->getEnableLeftButton())) {
      $enableLeftButton = $modal->getEnableLeftButton();
    }

    $form['modal_buttons']['left_button']['enable_left_button'] = [
      '#title' => $this->t('Enable Left Button'),
      '#type' => 'checkbox',
      '#default_value' => $enableLeftButton,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $leftLabelButton = $this->t('Dismiss');

    if (!empty($modal->getLeftLabelButton())) {
      $leftLabelButton = $modal->getLeftLabelButton();
    }

    $form['modal_buttons']['left_button']['left_label_button'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $leftLabelButton,
      '#description' => $this->t('If blank the value will be <b>@default_label@</b>.', [
        '@default_label@' => 'Dismiss',
      ]),
      '#states' => [
        'enabled' => [
          ':input[name="enable_left_button"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $leftButtonClass = '';

    if (!empty($modal->getLeftButtonClass())) {
      $leftButtonClass = $modal->getLeftButtonClass();
    }

    $form['modal_buttons']['left_button']['left_button_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Class(es)'),
      '#default_value' => $leftButtonClass,
      '#description' => $this->t('You can use multiple classes separate by spaces'),
      '#states' => [
        'enabled' => [
          ':input[name="enable_left_button"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['modal_close'] = [
      '#type' => 'details',
      '#title' => strtoupper($this->t('MODAL close')),
      '#group' => 'advanced',
    ];

    $form['modal_close']['how_to_close_modal'] = [
      '#type' => 'details',
      '#title' => $this->t("How to close Modal"),
      '#open' => TRUE,
    ];

    $closeModalEscKey = $modal->getCloseModalEscKey();

    if ($modal->isNew()) {
      $closeModalEscKey = TRUE;
    }

    $form['modal_close']['how_to_close_modal']['close_modal_esc_key'] = [
      '#title' => $this->t('Close Modal pressing ESC key'),
      '#type' => 'checkbox',
      '#default_value' => $closeModalEscKey,
    ];

    $closeModalClickingOutside = $modal->getCloseModalClickingOutside();

    if ($modal->isNew()) {
      $closeModalClickingOutside = TRUE;
    }

    $form['modal_close']['how_to_close_modal']['close_modal_clicking_outside'] = [
      '#title' => $this->t('Close Modal clicking outside the Modal'),
      '#type' => 'checkbox',
      '#default_value' => $closeModalClickingOutside,
    ];

    $form['modal_class'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL CLASS'),
      '#group' => 'advanced',
    ];

    $form['modal_class']['modal_class_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Modal Class'),
      '#open' => TRUE,
    ];

    $modalClass = '';

    if (!empty($modal->getModalClass())) {
      $modalClass = $modal->getModalClass();
    }

    $form['modal_class']['modal_class_details']['modal_class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Modal Class(es)'),
      '#default_value' => $modalClass,
      '#description' => $this->t('You can use multiple classes separate by spaces'),
    ];

    $form['modal_customization'] = [
      '#type' => 'details',
      '#title' => $this->t('MODAL STYLES'),
      '#group' => 'advanced',
    ];

    $form['modal_customization']['modal_size'] = [
      '#type' => 'details',
      '#title' => $this->t("Modal Size"),
      '#open' => TRUE,
    ];

    $modalSizeOptions = [
      'modal-sm' => 'Small',
      'modal-md' => 'Medium',
      'modal-lg' => 'Large',
    ];

    $modalSizeDefaultValue = $modal->getModalSize();

    if ($modal->isNew()) {
      $modalSizeDefaultValue = 'modal-md';
    }

    $modalSizeDescription = $this->t('You can see example of') . ' ';
    $modalSizeDescription .= '<a href="' . $imagePath . 'modal-size/Modal-Medium.png" class="modal-image-example">' . $this->t('Modal Medium') . '</a>' . ', ';
    $modalSizeDescription .= '<a href="' . $imagePath . 'modal-size/Modal-small.png" class="modal-image-example">' . $this->t('Modal small') . '</a> ';
    $modalSizeDescription .= $this->t('and') . ' ';
    $modalSizeDescription .= '<a href="' . $imagePath . 'modal-size/Modal-large.png" class="modal-image-example">' . $this->t('Modal large') . '</a>';

    $form['modal_customization']['modal_size']['modal_size'] = [
      '#type' => 'select',
      '#title' => $this->t('Modal Size'),
      '#options' => $modalSizeOptions,
      '#default_value' => $modalSizeDefaultValue,
      '#description' => $modalSizeDescription,
    ];

    $form['roles_restriction'] = [
      '#type' => 'details',
      '#title' => $this->t('ROLES RESTRICTION'),
      '#group' => 'advanced',
    ];

    $form['roles_restriction']['roles_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Roles'),
      '#open' => TRUE,
    ];

    $roles = $modal->getRoles();

    if ($modal->isNew()) {
      $roles = [];
    }

    $form['roles_restriction']['roles_details']['roles'] = [
      '#title' => $this->t('Who can access this Modal'),
      '#type' => 'checkboxes',
      '#options' => user_role_names(),
      '#default_value' => $roles,
      '#description' => $this->t('If no role is selected this Modal will be visible to everyone.'),
    ];

    // Insert Language.
    $this->insertLanguageField($form, $modal);

    $form['redirect'] = [
      '#type' => 'details',
      '#title' => $this->t('REDIRECT'),
      '#group' => 'advanced',
    ];

    $form['redirect']['redirect_link'] = [
      '#type' => 'details',
      '#title' => $this->t('Redirect link'),
      '#open' => TRUE,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $enableRedirectLink = FALSE;

    if (!empty($modal->getEnableRedirectLink())) {
      $enableRedirectLink = $modal->getEnableRedirectLink();
    }

    $form['redirect']['redirect_link']['enable_redirect_link'] = [
      '#title' => $this->t('Enable Redirect Link'),
      '#type' => 'checkbox',
      '#default_value' => $enableRedirectLink,
      '#states' => [
        'visible' => [
          ':input[name="enable_modal_footer"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $redirectLink = '';

    if (!empty($modal->getRedirectLink())) {
      $redirectLink = $modal->getRedirectLink();
    }

    $form['redirect']['redirect_link']['redirect_link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link'),
      '#default_value' => $redirectLink,
      '#description' => $this->t('The user will be redirected to this link after clicking the Right Button'),
      '#states' => [
        'enabled' => [
          ':input[name="enable_redirect_link"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $form['extras'] = [
      '#type' => 'details',
      '#title' => $this->t('EXTRAS'),
      '#group' => 'advanced',
    ];

    $modalTypeOptions = [
      'page' => 'Page',
      'parameter' => 'Parameter',
    ];

    $type = $modal->getType();

    if ($modal->isNew()) {
      $type = 'page';
    }

    $form['extras']['type'] = [
      '#type' => 'select',
      '#title' => $this->t('Modal By'),
      '#options' => $modalTypeOptions,
      '#default_value' => $type,
    ];

    $defaultValueDelayDisplay = $modal->getDelayDisplay();

    if ($modal->isNew()) {
      $defaultValueDelayDisplay = 0;
    }

    $form['extras']['delay_display'] = [
      '#type' => 'number',
      '#min' => 0,
      '#step' => 0.001,
      '#title' => $this->t('Delay to display'),
      '#default_value' => $defaultValueDelayDisplay,
      '#description' => $this->t('Value in seconds.'),
    ];

    $published = $modal->getPublished();

    if ($modal->isNew()) {
      $published = TRUE;
    }

    $form['published'] = [
      '#title' => $this->t('Published'),
      '#type' => 'checkbox',
      '#default_value' => $published,
    ];

    return $form;
  }

  /**
   * Method to insert Language.
   */
  public function insertLanguageField(array &$form, $modal) {

    // If isn't Multilingual skip this.
    if (empty($this->languageManager->isMultilingual())) {
      return FALSE;
    }

    $form['languages'] = [
      '#type' => 'details',
      '#title' => $this->t('LANGUAGES'),
      '#group' => 'advanced',
    ];

    $form['languages']['languages_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Languages to show'),
      '#open' => TRUE,
    ];

    $languages = $modal->getLanguagesToShow();

    if ($modal->isNew()) {
      $languages = [];
    }

    $languageOptions = [];

    // We need to use Depency Injection on this.
    if (empty($this->languageManager->getLanguages())) {
      return FALSE;
    }

    // We need to use Depency Injection on this.
    $langCodes = $this->languageManager->getLanguages();

    foreach ($langCodes as $key => $language) {
      $languageOptions[$key] = $language->getName();
    }

    $form['languages']['languages_details']['languages_to_show'] = [
      '#title' => $this->t('Languages'),
      '#type' => 'checkboxes',
      '#options' => $languageOptions,
      '#default_value' => $languages,
      '#description' => $this->t('If none are selected, all languages will be allowed.'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    if (empty($values['pages'])) {
      return FALSE;
    }

    $pages = $values['pages'];
    $urlsUpdated = FALSE;
    $urlList = [];
    $urlList = explode(PHP_EOL, $pages);

    foreach ($urlList as $key => $url) {

      $trimUrl = trim($url);

      // Validate Slash.
      if ($trimUrl !== '<front>' && $trimUrl[0] !== '/' && $trimUrl[0] !== '') {
        $urlList[$key] = '/' . $trimUrl;
        $urlsUpdated = TRUE;
      }

      // Validate wildcard.
      if (strpos($trimUrl, '*') !== FALSE && substr($trimUrl, -1) != '*') {
        $form_state->setErrorByName('pages', $this->t("The wildcard * must be used at the end of the path. E.g. /admin/*"));
      }
    }

    if (!empty($urlsUpdated)) {
      $pages = implode(PHP_EOL, $urlList);
      $form_state->setValue('pages', $pages);
    }

    if (!empty($values['modal_class'])) {

      $modalClass = $this->modalPageService->prepareClass($values['modal_class']);

      $form_state->setValue('modal_class', $modalClass);
    }

    if (!empty($values['header_class'])) {

      $headerClass = $this->modalPageService->prepareClass($values['header_class']);

      $form_state->setValue('header_class', $headerClass);
    }

    if (!empty($values['top_right_button_class'])) {

      $topRightButtonClass = $this->modalPageService->prepareClass($values['top_right_button_class']);

      $form_state->setValue('top_right_button_class', $topRightButtonClass);

    }

    if (!empty($values['footer_class'])) {

      $footerClass = $this->modalPageService->prepareClass($values['footer_class']);

      $form_state->setValue('footer_class', $footerClass);
    }

    if (!empty($values['ok_button_class'])) {

      $okButtonClass = $this->modalPageService->prepareClass($values['ok_button_class']);

      $form_state->setValue('ok_button_class', $okButtonClass);
    }

    if (!empty($values['left_button_class'])) {

      $leftButtonClass = $this->modalPageService->prepareClass($values['left_button_class']);

      $form_state->setValue('left_button_class', $leftButtonClass);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    // Get Modal.
    $modal = $this->entity;

    // Modal Label.
    if (!empty($modal->label())) {
      $label = $this->modalPageService->clearText($modal->label());
      $modal->setLabel($label);
    }

    // Modal OK Button.
    if (empty($modal->getOkLabelButton())) {
      $modal->setOkLabelButton((string) $this->t('OK'));
    }

    // Modal don't show again label.
    if (empty($modal->getDontShowAgainLabel())) {
      $modal->setDontShowAgainLabel((string) $this->t("Don't show again"));
    }

    // Save inline image.
    $text = $form_state->getValue('body')['value'];
    $uuids = $this->modalPageService->extractFilesUuid($text);
    $this->modalPageService->recordFileUsage($uuids);

    // Modal Save.
    $status = $modal->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Modal.', [
          '%label' => $modal->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Modal.', [
          '%label' => $modal->label(),
        ]));
    }

    // Get Settings.
    $settings = $this->configFactory->getEditable('modal_page.settings');

    // Verify if is necessary clear.
    $clearCachesOnModalSave = $settings->get('clear_caches_on_modal_save');

    // Clear Views' cache if necessary.
    if (!empty($clearCachesOnModalSave)) {
      drupal_flush_all_caches();
    }

    $form_state->setRedirectUrl($modal->toUrl('collection'));
  }

}
