<?php

/**
 * @file
 * Hooks provided by the Modals.
 */

/**
 * Implements hook_modal_alter().
 */
function hook_modal_alter(&$modal, $modal_id) {
  $modal->setLabel('New Title');
  $modal->setBody('New Body');
}

/**
 * Implements hook_modal_ID_alter().
 */
function hook_modal_ID_alter(&$modal, $modal_id) {
  $modal->setLabel('New Title');
  $modal->setBody('New Body');
}

/**
 * Implements hook_modal_submit().
 */
function hook_modal_submit($modal, $modal_state, $modal_id) {

  // Your AJAX here.
  \Drupal::logger('modal_page')->notice('Modal Submit was triggered');

}
