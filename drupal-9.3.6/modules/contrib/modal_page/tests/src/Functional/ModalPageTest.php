<?php

namespace Drupal\Tests\modal_page\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests that modal is working.
 *
 * @group modal_page
 */
class ModalPageTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['modal_page'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->createRole([], 'administrator');
    $admin_user = $this->drupalCreateUser([
      'administer modal page',
      'access administration pages',
    ]);
    $admin_user->addRole('administrator');
    $admin_user->save();
    $this->drupalLogin($admin_user);
    // Set the front page.
    \Drupal::configFactory()
      ->getEditable('system.site')
      ->set('page.front', '/admin')
      ->save();
  }

  /**
   * Tests modal by page behaviour.
   */
  public function testIfModalByPageIsLoaded() {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin/structure');
    // Check if modal is loaded.
    $assert_session->responseContains('Thank you for installing Modal Page');

    // Check if modal is not loaded.
    $this->drupalGet('admin');
    $assert_session->responseNotContains('Thank you for installing Modal Page');

    // Set the modal to be loaded on front page.
    $modal = \Drupal::service('entity_type.manager')->getStorage('modal')->load('thank_you_for_installing_modal_page');
    $modal->setPages('<front>');
    $modal->save();

    // Check if modal is loaded on front page.
    $this->drupalGet('<front>');
    $assert_session->responseContains('Thank you for installing Modal Page');

    // Set the modal to be displayed on front page and admin/*.
    $modal = \Drupal::service('entity_type.manager')->getStorage('modal')->load('thank_you_for_installing_modal_page');
    $modal->setPages("<front>\r\n/admin/*");
    $modal->save();
    // Check if modal is loaded on front page.
    $this->drupalGet('<front>');
    $assert_session->responseContains('Thank you for installing Modal Page');
    // Check if modal loaded and on admin/*.
    $this->drupalGet('admin/structure');
    $assert_session->responseContains('Thank you for installing Modal Page');

  }

  /**
   * Tests modal by parameter behaviour.
   */
  public function testIfModalByParameterIsLoaded() {
    $assert_session = $this->assertSession();

    // Set the modal type to parameter.
    $modal = \Drupal::service('entity_type.manager')->getStorage('modal')->load('thank_you_for_installing_modal_page');
    $modal->setType('parameter');
    $modal->setParameters('welcome');
    $modal->save();

    $this->drupalGet('admin/structure');
    // Ensure the modal is not loaded.
    $assert_session->responseNotContains('Thank you for installing Modal Page');

    // Check that the modal is loaded.
    $this->drupalGet('admin/structure', ['query' => ['modal' => 'welcome']]);
    $assert_session->responseContains('Thank you for installing Modal Page');

    // Set the modal parameter.
    $modal = \Drupal::service('entity_type.manager')->getStorage('modal')->load('thank_you_for_installing_modal_page');
    $modal->setParameters("welcome\r\nwelcome_2");
    $modal->save();

    // Check that the modal is loaded.
    $this->drupalGet('admin/structure', ['query' => ['modal' => 'welcome']]);
    $assert_session->responseContains('Thank you for installing Modal Page');

    // Check that the modal is loaded.
    $this->drupalGet('admin', ['query' => ['modal' => 'welcome_2']]);
    $assert_session->responseContains('Thank you for installing Modal Page');
  }

}
