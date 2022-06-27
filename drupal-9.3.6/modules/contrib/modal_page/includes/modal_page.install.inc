<?php

/**
 * @file
 * Modal Page's helper for install.
 */

/**
 * Enable Modal to show Release Notes.
 */
function modal_page_add_modal_thanks_for_upgrade_4() {

  $id = 'modal_page_updated_news_on_this_release_4';
  $title = 'Modal Page Updated - News on this Release';

  $body = '<h1>' . t('Thank you for use Modal Page') . '</h1><br>';
  $body .= '<h2>' . t('Release Notes:') . '</h2><br>';
  $body .= '<ul>';
  $body .= '<li>' . t('Modal Page with Config Entity;') . '</li>';
  $body .= '<li>' . t('Now you can export / import your Modals using Configuration Management;') . '</li>';
  $body .= '<li>' . t('You can use drush config:export and drush config:import;') . '</li>';
  $body .= '<li>' . t('Full compatible with Drupal 9;') . '</li>';
  $body .= '<li>' . t('New improvements and fixes;') . '</li>';
  $body .= '<li>' . t('Modal Page is faster now.') . '</li>';
  $body .= '</ul><br>';
  // @codingStandardsIgnoreLine.
  $body .= '<p>' . t('Enjoy!') . ' :)</p>';
  $body .= '<p>' . t('If liked, please give us a') . ' <a href="https://www.drupal.org/project/modal_page" target="blank">' . t('star') . '</a></p>';
  $type = 'page';
  $pages = '/admin/*';
  $roles = ['administrator' => 'administrator'];
  $modalSize = 'modal-md';

  $modal = \Drupal::entityTypeManager()->getStorage('modal')->create();
  $modal->setId($id);
  $modal->setLabel($title);
  $modal->setBody($body);
  $modal->setType($type);
  $modal->setPages($pages);
  $modal->setRoles($roles);
  $modal->setPublished(TRUE);
  $modal->setAutoOpen(TRUE);
  $modal->setEnableDontShowAgainOption(TRUE);
  $modal->setModalSize($modalSize);
  $modal->setCloseModalEscKey(TRUE);
  $modal->setCloseModalClickingOutside(TRUE);
  $modal->save();

  \Drupal::service('cache.render')->invalidateAll();
}
