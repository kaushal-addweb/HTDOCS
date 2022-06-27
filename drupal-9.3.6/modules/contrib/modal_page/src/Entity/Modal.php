<?php

namespace Drupal\modal_page\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Modal entity.
 *
 * @ConfigEntityType(
 *   id = "modal",
 *   label = @Translation("Modal"),
 *   label_collection = @Translation("Modals"),
 *   label_singular = @Translation("Modal"),
 *   label_plural = @Translation("Modals"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Modal",
 *     plural = "@count Modals",
 *   ),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\modal_page\Entity\ListBuilder\ModalListBuilder",
 *     "form" = {
 *       "add" = "Drupal\modal_page\Form\ModalForm",
 *       "edit" = "Drupal\modal_page\Form\ModalForm",
 *       "delete" = "Drupal\modal_page\Form\ModalDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\modal_page\Entity\RouteProvider\ModalHtmlRouteProvider",
 *     },
 *     "translation" = "Drupal\node\NodeTranslationHandler",
 *   },
 *   config_prefix = "modal",
 *   admin_permission = "administer modal page",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "body" = "body",
 *     "pages" = "pages",
 *     "parameters" = "parameters",
 *     "auto_open" = "auto_open",
 *     "open_modal_on_element_click" = "open_modal_on_element_click",
 *     "langcode" = "langcode",
 *     "enable_right_button" = "enable_right_button",
 *     "ok_label_button" = "ok_label_button",
 *     "enable_dont_show_again_option" = "enable_dont_show_again_option",
 *     "dont_show_again_label" = "dont_show_again_label",
 *     "modal_size" = "modal_size",
 *     "close_modal_esc_key" = "close_modal_esc_key",
 *     "close_modal_clicking_outside" = "close_modal_clicking_outside",
 *     "roles" = "roles",
 *     "type" = "type",
 *     "delay_display" = "delay_display",
 *     "published" = "published",
 *     "insert_horizontal_line_header" = "insert_horizontal_line_header",
 *     "insert_horizontal_line_footer" = "insert_horizontal_line_footer",
 *     "enable_modal_header" = "enable_modal_header",
 *     "enable_modal_footer" = "enable_modal_footer",
 *     "display_title" = "display_title",
 *     "display_button_x_close" = "display_button_x_close",
 *     "top_right_button_label" = "top_right_button_label",
 *     "top_right_button_class" = "top_right_button_class",
 *     "languages_to_show" = "languages_to_show",
 *     "modal_class" = "modal_class",
 *     "header_class" = "header_class",
 *     "footer_class" = "footer_class",
 *     "enable_left_button" = "enable_left_button",
 *     "left_label_button" = "left_label_button",
 *     "ok_button_class" = "ok_button_class",
 *     "left_button_class" = "left_button_class",
 *     "enable_redirect_link" = "enable_redirect_link",
 *     "redirect_link" = "redirect_link",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *     "body",
 *     "pages",
 *     "parameters",
 *     "auto_open",
 *     "open_modal_on_element_click",
 *     "langcode",
 *     "enable_right_button",
 *     "ok_label_button",
 *     "enable_dont_show_again_option",
 *     "dont_show_again_label",
 *     "modal_size",
 *     "close_modal_esc_key",
 *     "close_modal_clicking_outside",
 *     "roles",
 *     "type",
 *     "delay_display",
 *     "published",
 *     "insert_horizontal_line_header",
 *     "insert_horizontal_line_footer",
 *     "enable_modal_header",
 *     "enable_modal_footer",
 *     "display_title",
 *     "display_button_x_close",
 *     "top_right_button_label",
 *     "top_right_button_class",
 *     "languages_to_show",
 *     "modal_class",
 *     "header_class",
 *     "footer_class",
 *     "enable_left_button",
 *     "left_label_button",
 *     "ok_button_class",
 *     "left_button_class",
 *     "enable_redirect_link",
 *     "redirect_link",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/modal/{modal}",
 *     "add-form" = "/admin/structure/modal/add",
 *     "edit-form" = "/admin/structure/modal/{modal}/edit",
 *     "delete-form" = "/admin/structure/modal/{modal}/delete",
 *     "collection" = "/admin/structure/modal"
 *   }
 * )
 */
class Modal extends ConfigEntityBase implements ModalInterface {

  /**
   * The Modal ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Modal label.
   *
   * @var string
   */
  protected $label;

  /**
   * Body.
   *
   * @var string
   */
  protected $body;

  /**
   * Pages.
   *
   * @var string
   */
  protected $pages;

  /**
   * Parameters.
   *
   * @var string
   */
  protected $parameters;

  /**
   * Auto Open.
   *
   * @var string
   */
  protected $autoOpen;

  /**
   * Open Modal on Element Click.
   *
   * @var string
   */
  protected $openModalOnElementClick;

  /**
   * Language code.
   *
   * @var string
   */
  protected $langCode;

  /**
   * Ok Label Button.
   *
   * @var string
   */
  protected $okLabelButton;

  /**
   * Ok Label Button.
   *
   * @var bool
   */
  protected $enableDontShowAgainOption;

  /**
   * Dont Show Again Label.
   *
   * @var string
   */
  protected $dontShowAgainLabel;

  /**
   * Modal Size.
   *
   * @var string
   */
  protected $modalSize;

  /**
   * Close Modal pressing ESC key.
   *
   * @var string
   */
  protected $closeModalEscKey;

  /**
   * Close Modal clicking outside the Modal.
   *
   * @var string
   */
  protected $closeModalClickingOutside;

  /**
   * Roles.
   *
   * @var string
   */
  protected $roles;

  /**
   * Type.
   *
   * @var string
   */
  protected $type;

  /**
   * Delay Display.
   *
   * @var string
   */
  protected $delayDisplay;

  /**
   * Published.
   *
   * @var string
   */
  protected $published;

  /**
   * Insert Horizontal Line Header.
   *
   * @var string
   */
  protected $insertHorizontalLineHeader;

  /**
   * Insert Horizontal Line Footer.
   *
   * @var string
   */
  protected $insertHorizontalLineFooter;

  /**
   * Enable Modal Header.
   *
   * @var bool
   */
  protected $enableModalHeader;

  /**
   * Enable Modal footer.
   *
   * @var bool
   */
  protected $enableModalFooter;

  /**
   * Display Title.
   *
   * @var bool
   */
  protected $displayTitle;

  /**
   * Display Button X to close.
   *
   * @var bool
   */
  protected $displayButtonXclose;


  /**
   * Languages to Show.
   *
   * @var string
   */
  protected $languagesToShow;

  /**
   * Modal class.
   *
   * @var string
   */
  protected $modalClass;

  /**
   * Header class.
   *
   * @var string
   */
  protected $headerClass;

  /**
   * Footer class.
   *
   * @var string
   */
  protected $footerClass;

  /**
   * Enable Left Button.
   *
   * @var string
   */
  protected $enableLeftButton;

  /**
   * Left Label Button.
   *
   * @var string
   */
  protected $leftLabelButton;

  /**
   * Ok Button class.
   *
   * @var string
   */
  protected $okButtonClass;

  /**
   * Left Button class.
   *
   * @var string
   */
  protected $leftButtonClass;

  /**
   * Enable Redirect Link.
   *
   * @var string
   */
  protected $enableRedirectLink;

  /**
   * Redirect Link.
   *
   * @var string
   */
  protected $redirectLink;

  /**
   * Get Id.
   */
  public function getId() {
    return $this->get('id');
  }

  /**
   * Set Id.
   */
  public function setId($id) {
    $this->set('id', $id);
    return $this;
  }

  /**
   * Get Label.
   */
  public function getLabel() {
    return $this->get('label');
  }

  /**
   * Set Label.
   */
  public function setLabel($label) {
    $this->set('label', $label);
    return $this;
  }

  /**
   * Get Body.
   */
  public function getBody() {
    return $this->get('body');
  }

  /**
   * Set Body.
   */
  public function setBody($body) {
    $this->set('body', $body);
    return $this;
  }

  /**
   * Get Pages.
   */
  public function getPages() {
    return $this->get('pages');
  }

  /**
   * Set Pages.
   */
  public function setPages($pages) {
    $this->set('pages', $pages);
    return $this;
  }

  /**
   * Get Parameters.
   */
  public function getParameters() {
    return $this->get('parameters');
  }

  /**
   * Set Parameters.
   */
  public function setParameters($parameters) {
    $this->set('parameters', $parameters);
    return $this;
  }

  /**
   * Auto Open.
   */
  public function getAutoOpen() {
    return $this->get('auto_open');
  }

  /**
   * Auto Open.
   */
  public function setAutoOpen($autoOpen) {
    $this->set('auto_open', $autoOpen);
    return $this;
  }

  /**
   * Get Open Modal on Element Click.
   */
  public function getOpenModalOnElementClick() {
    return $this->get('open_modal_on_element_click');
  }

  /**
   * Set Open Modal on Element Click.
   */
  public function setOpenModalOnElementClick($openModalOnElementClick) {
    $this->set('open_modal_on_element_click', $openModalOnElementClick);
    return $this;
  }

  /**
   * Get LangCode.
   */
  public function getLangCode() {
    return $this->get('langcode');
  }

  /**
   * Set LangCode.
   */
  public function setLangCode($langCode) {
    $this->set('langcode', $langCode);
    return $this;
  }

  /**
   * Get Enable Right Button.
   */
  public function getEnableRightButton() {
    return $this->get('enable_right_button');
  }

  /**
   * Set Enable Right Button.
   */
  public function setEnableRightButton($enableRightButton) {
    $this->set('enable_right_button', $enableRightButton);
    return $this;
  }

  /**
   * Get Ok Label Button.
   */
  public function getOkLabelButton() {
    return $this->get('ok_label_button');
  }

  /**
   * Set Ok Label Button.
   */
  public function setOkLabelButton($okLabelButton) {
    $this->set('ok_label_button', $okLabelButton);
    return $this;
  }

  /**
   * Get Enable Don't Show Again.
   */
  public function getEnableDontShowAgainOption() {
    return $this->get('enable_dont_show_again_option');
  }

  /**
   * Set Enable Don't Show Again.
   */
  public function setEnableDontShowAgainOption($enableDontShowAgainOption) {
    $this->set('enable_dont_show_again_option', $enableDontShowAgainOption);
    return $this;
  }

  /**
   * Get Dont Show Again Label.
   */
  public function getDontShowAgainLabel() {
    return $this->get('dont_show_again_label');
  }

  /**
   * Set Dont Show Again Label.
   */
  public function setDontShowAgainLabel($dontShowAgainLabel) {
    $this->set('dont_show_again_label', $dontShowAgainLabel);
    return $this;
  }

  /**
   * Get Modal Size.
   */
  public function getModalSize() {
    return $this->get('modal_size');
  }

  /**
   * Set Modal Size.
   */
  public function setModalSize($modalSize) {
    $this->set('modal_size', $modalSize);
    return $this;
  }

  /**
   * Get Close Modal ESC key.
   */
  public function getCloseModalEscKey() {
    return $this->get('close_modal_esc_key');
  }

  /**
   * Set Close Modal ESC key.
   */
  public function setCloseModalEscKey($closeModalEscKey) {
    $this->set('close_modal_esc_key', $closeModalEscKey);
    return $this;
  }

  /**
   * Get Close Modal clicking outside the Modal.
   */
  public function getCloseModalClickingOutside() {
    return $this->get('close_modal_clicking_outside');
  }

  /**
   * Set Close Modal clicking outside the Modal.
   */
  public function setCloseModalClickingOutside($closeModalEscKey) {
    $this->set('close_modal_clicking_outside', $closeModalEscKey);
    return $this;
  }

  /**
   * Get Roles.
   */
  public function getRoles() {
    return $this->get('roles');
  }

  /**
   * Set Roles.
   */
  public function setRoles($roles) {
    $this->set('roles', $roles);
    return $this;
  }

  /**
   * Get Type.
   */
  public function getType() {
    return $this->get('type');
  }

  /**
   * Set Type.
   */
  public function setType($type) {
    $this->set('type', $type);
    return $this;
  }

  /**
   * Get Delay Display.
   */
  public function getDelayDisplay() {
    return $this->get('delay_display');
  }

  /**
   * Set Delay Display.
   */
  public function setDelayDisplay($delayDisplay) {
    $this->set('delay_display', $delayDisplay);
    return $this;
  }

  /**
   * Get Published.
   */
  public function getPublished() {
    return $this->get('published');
  }

  /**
   * Set Published.
   */
  public function setPublished($published) {
    $this->set('published', $published);
    return $this;
  }

  /**
   * Get Insert Horizontal Line Header.
   */
  public function getInsertHorizontalLineHeader() {
    return $this->get('insert_horizontal_line_header');
  }

  /**
   * Set Insert Horizontal Line Header.
   */
  public function setInsertHorizontalLineHeader($insertHorizontalLineHeader) {
    $this->set('insert_horizontal_line_header', $insertHorizontalLineHeader);
    return $this;
  }

  /**
   * Get Insert Horizontal Line Footer.
   */
  public function getInsertHorizontalLineFooter() {
    return $this->get('insert_horizontal_line_footer');
  }

  /**
   * Set Insert Horizontal Line Footer.
   */
  public function setInsertHorizontalLineFooter($insertHorizontalLineFooter) {
    $this->set('insert_horizontal_line_footer', $insertHorizontalLineFooter);
    return $this;
  }

  /**
   * Get Enable Modal Header.
   */
  public function getEnableModalHeader() {
    return $this->get('enable_modal_header');
  }

  /**
   * Set Enable Modal Header.
   */
  public function setEnableModalHeader($enableModalHeader) {
    $this->set('enable_modal_header', $enableModalHeader);
    return $this;
  }

  /**
   * Get Enable Modal footer.
   */
  public function getEnableModalFooter() {
    return $this->get('enable_modal_footer');
  }

  /**
   * Set Enable Modal footer.
   */
  public function setEnableModalFooter($enableModalFooter) {
    $this->set('enable_modal_footer', $enableModalFooter);
    return $this;
  }

  /**
   * Get Display Title.
   */
  public function getDisplayTitle() {
    return $this->get('display_title');
  }

  /**
   * Set Display Title.
   */
  public function setDisplayTitle($displayTitle) {
    $this->set('display_title', $displayTitle);
    return $this;
  }

  /**
   * Get Display Button X close.
   */
  public function getDisplayButtonXclose() {
    return $this->get('display_button_x_close');
  }

  /**
   * Set Display Button X close.
   */
  public function setDisplayButtonXclose($displayButtonXclose) {
    $this->set('display_button_x_close', $displayButtonXclose);
    return $this;
  }

  /**
   * Get Top Right Button Label.
   */
  public function getTopRightButtonLabel() {
    return $this->get('top_right_button_label');
  }

  /**
   * Set Top Right Button Label.
   */
  public function setTopRightButtonLabel($topRightButtonLabel) {
    $this->set('top_right_button_label', $topRightButtonLabel);
    return $this;
  }

  /**
   * Get Top Right Button Class.
   */
  public function getTopRightButtonClass() {
    return $this->get('top_right_button_class');
  }

  /**
   * Set Top Right Button Class.
   */
  public function setTopRightButtonClass($topRightButtonClass) {
    $this->set('top_right_button_class', $topRightButtonClass);
    return $this;
  }

  /**
   * Get Languages to Show.
   */
  public function getLanguagesToShow() {
    return $this->get('languages_to_show');
  }

  /**
   * Set Languages to Show.
   */
  public function setLanguagesToShow($languagesToShow) {
    $this->set('languages_to_show', $languagesToShow);
    return $this;
  }

  /**
   * Get Modal class.
   */
  public function getModalClass() {
    return $this->get('modal_class');
  }

  /**
   * Set Modal class.
   */
  public function setModalClass($modalClass) {
    $this->set('modal_class', $modalClass);
    return $this;
  }

  /**
   * Get Header class.
   */
  public function getHeaderClass() {
    return $this->get('header_class');
  }

  /**
   * Set Header class.
   */
  public function setHeaderClass($headerClass) {
    $this->set('header_class', $headerClass);
    return $this;
  }

  /**
   * Get footer class.
   */
  public function getFooterClass() {
    return $this->get('footer_class');
  }

  /**
   * Set footer class.
   */
  public function setFooterClass($footerClass) {
    $this->set('footer_class', $footerClass);
    return $this;
  }

  /**
   * Get Enable Left Button.
   */
  public function getEnableLeftButton() {
    return $this->get('enable_left_button');
  }

  /**
   * Set Enable Left Button.
   */
  public function setEnableLeftButton($enableLeftButton) {
    $this->set('enable_left_button', $enableLeftButton);
    return $this;
  }

  /**
   * Get Left Label Button.
   */
  public function getLeftLabelButton() {
    return $this->get('left_label_button');
  }

  /**
   * Set Left Label Button.
   */
  public function setLeftLabelButton($leftLabelButton) {
    $this->set('left_label_button', $leftLabelButton);
    return $this;
  }

  /**
   * Get Ok Button class.
   */
  public function getOkButtonClass() {
    return $this->get('ok_button_class');
  }

  /**
   * Set Ok Button class.
   */
  public function setOkButtonClass($okButtonClass) {
    $this->set('ok_button_class', $okButtonClass);
    return $this;
  }

  /**
   * Get Left Button class.
   */
  public function getLeftButtonClass() {
    return $this->get('left_button_class');
  }

  /**
   * Set Left Button class.
   */
  public function setLeftButtonClass($leftButtonClass) {
    $this->set('left_button_class', $leftButtonClass);
    return $this;
  }

  /**
   * Get Enable Redirect Link.
   */
  public function getEnableRedirectLink() {
    return $this->get('enable_redirect_link');
  }

  /**
   * Set Enable Redirect Link.
   */
  public function setEnableRedirectLink($enableRedirectLink) {
    $this->set('enable_redirect_link', $enableRedirectLink);
    return $this;
  }

  /**
   * Get Redirect Link.
   */
  public function getRedirectLink() {
    return $this->get('redirect_link');
  }

  /**
   * Set Redirect Link.
   */
  public function setRedirectLink($redirectLink) {
    $this->set('redirect_link', $redirectLink);
    return $this;
  }

}
