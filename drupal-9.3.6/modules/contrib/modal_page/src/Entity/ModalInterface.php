<?php

namespace Drupal\modal_page\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Modal entities.
 */
interface ModalInterface extends ConfigEntityInterface {

  /**
   * Get Id.
   */
  public function getId();

  /**
   * Set Id.
   */
  public function setId($id);

  /**
   * Get Label.
   */
  public function getLabel();

  /**
   * Set Label.
   */
  public function setLabel($label);

  /**
   * Add get/set methods for your configuration properties here.
   */
  public function getBody();

  /**
   * Set Body.
   */
  public function setBody($body);

  /**
   * Get Pages.
   */
  public function getPages();

  /**
   * Set Pages.
   */
  public function setPages($pages);

  /**
   * Get Parameters.
   */
  public function getParameters();

  /**
   * Set Parameters.
   */
  public function setParameters($parameters);

  /**
   * Get Auto Open.
   */
  public function getAutoOpen();

  /**
   * Set Auto Open.
   */
  public function setAutoOpen($autoOpen);

  /**
   * Get Open Modal on Element Click.
   */
  public function getOpenModalOnElementClick();

  /**
   * Set Open Modal on Element Click.
   */
  public function setOpenModalOnElementClick($openModalOnElementClick);

  /**
   * Get LangCode.
   */
  public function getLangCode();

  /**
   * Set LangCode.
   */
  public function setLangCode($langCode);

  /**
   * Get Ok Label Button.
   */
  public function getOkLabelButton();

  /**
   * Set Ok Label Button.
   */
  public function setOkLabelButton($okLabelButton);

  /**
   * Get Enable Don't Show Again.
   */
  public function getEnableDontShowAgainOption();

  /**
   * Set Enable Don't Show Again.
   */
  public function setEnableDontShowAgainOption($enableDontShowAgainOption);

  /**
   * Get Dont Show Again Label.
   */
  public function getDontShowAgainLabel();

  /**
   * Set Dont Show Again Label.
   */
  public function setDontShowAgainLabel($dontShowAgainLabel);

  /**
   * Get Modal Size.
   */
  public function getModalSize();

  /**
   * Set Modal Size.
   */
  public function setModalSize($modalSize);

  /**
   * Get Close Modal ESC key.
   */
  public function getCloseModalEscKey();

  /**
   * Set Close Modal ESC key.
   */
  public function setCloseModalEscKey($closeModalEscKey);

  /**
   * Get Close Modal clicking outside the Modal.
   */
  public function getCloseModalClickingOutside();

  /**
   * Set Close Modal clicking outside the Modal.
   */
  public function setCloseModalClickingOutside($closeModalEscKey);

  /**
   * Get Roles.
   */
  public function getRoles();

  /**
   * Set Roles.
   */
  public function setRoles($roles);

  /**
   * Get Type.
   */
  public function getType();

  /**
   * Set Type.
   */
  public function setType($type);

  /**
   * Get Delay Display.
   */
  public function getDelayDisplay();

  /**
   * Set Delay Display.
   */
  public function setDelayDisplay($delayDisplay);

  /**
   * Get Published.
   */
  public function getPublished();

  /**
   * Set Published.
   */
  public function setPublished($published);

  /**
   * Get Languages to Show.
   */
  public function getLanguagesToShow();

  /**
   * Set Languages to Show.
   */
  public function setLanguagesToShow($languagesToShow);

  /**
   * Get Modal Class.
   */
  public function getModalClass();

  /**
   * Set Modal Class.
   */
  public function setModalClass($modalClass);

}
