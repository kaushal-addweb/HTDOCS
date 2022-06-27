# MODAL PAGE

## CONTENTS OF THIS FILE


 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Hooks and Modal programatically
 * Maintainers


## INTRODUCTION

The Modal project allows you to create Modal using CMS only.

You can place your Modal in specific page and configure if it'll appear when
the end-user open the page (auto-open on page load) or if this Modal will appear
when the user click in specific class or ID on HTML.

* For a full description of the project, visit the project page:
   https://www.drupal.org/project/modal_page

* To submit bug reports and feature suggestions, or track changes:
   https://www.drupal.org/project/issues/modal_page

## REQUIREMENTS

No special requirements.


## INSTALLATION

* Install as you would normally. Visit
   https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules
   for further information.


## CONFIGURATION

* Configure your messages in Administration » Structure » Modal

  Click in Add Modal

   1. Set the Title of modal;
   2. Set the Text of modal (Body);
   4. Set pages to show the Modal;
   6. Select if it'll appear on page load or in element click;
   7. Use extra configuration in vertical tab (left side);
   7. Save.

## HOOKS AND MODAL PROGRAMATICALLY

* You can insert your Modal programatically using entityTypeManager like this:

```
$modal = \Drupal::entityTypeManager()->getStorage('modal')->create();

$modal->setId('modal_id');
$modal->setLabel('Modal Title');
$modal->setBody('Modal Content');
$modal->setPages('/hello');
$modal->save();
```

* You can change Modals before display with these hooks

- HOOK_modal_alter(&$modal, $modal_id)

Example:

```
/**
 * Implements hook_modal_alter().
 */
function PROJECT_modal_alter(&$modal, $modal_id) {
  $modal->setLabel('Title Updated');
  $modal->setBody('Body Updated');
}
```

- HOOK_modal_ID_alter(&$modal, $modal_id)

Example:

```
/**
 * Implements hook_modal_ID_alter().
 */
function PROJECT_modal_ID_alter(&$modal, $modal_id) {
  $modal->setLabel('New Title');
  $modal->setBody('New Body');
}
```

- HOOK_modal_submit(&$modal, $modal_id)

Example:

```
/**
 * Implements hook_modal_submit().
 */
function PROJECT_modal_submit($modal, $modal_state, $modal_id) {

  // Your AJAX here.
  \Drupal::logger('modal_page')->notice('Modal Submit was triggered');

}
```

## TESTS

* Before of run tests you needs create a shortcut for core/phpunit.xml.dist in
  your root project.

### EXECUTING UNITTESTS

```
vendor/bin/phpunit modules/contrib/modal_page
```

## MAINTAINERS

### Current maintainers:
 * Renato Gonçalves (RenatoG) - https://www.drupal.org/user/3326031
 * Thalles Ferreira (thalles) - https://www.drupal.org/user/3589086
 * Paulo Henrique Cota Starling (paulocs) - https://www.drupal.org/user/3640109
