<?php

namespace Drupal\Tests\embed\FunctionalJavascript;

use Drupal\editor\Entity\Editor;
use Drupal\filter\Entity\FilterFormat;
use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * Tests the administrative UI.
 *
 * @group embed
 */
class EmbedButtonAdminTest extends WebDriverTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'block',
    'embed',
    'embed_test',
    'editor',
    'ckeditor',
  ];

  /**
   * The test administrative user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * The test administrative user.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $webUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create Filtered HTML text format and enable entity_embed filter.
    $format = FilterFormat::create([
      'format' => 'embed_test',
      'name' => 'Embed format',
      'filters' => [],
    ]);
    $format->save();

    $editor_group = [
      'name' => 'Embed',
      'items' => [
        'embed_test_default',
      ],
    ];
    $editor = Editor::create([
      'format' => 'embed_test',
      'editor' => 'ckeditor',
      'settings' => [
        'toolbar' => [
          'rows' => [[$editor_group]],
        ],
      ],
    ]);
    $editor->save();

    // Create a user with required permissions.
    $this->adminUser = $this->drupalCreateUser([
      'administer embed buttons',
      'use text format embed_test',
    ]);

    // Create a user with required permissions.
    $this->webUser = $this->drupalCreateUser([
      'use text format embed_test',
    ]);

    // Set up some standard blocks for the testing theme (Classy).
    // @see https://www.drupal.org/node/507488?page=1#comment-10291517
    $this->drupalPlaceBlock('local_tasks_block');
    $this->drupalPlaceBlock('local_actions_block');
  }

  /**
   * Tests the embed_button administration functionality.
   */
  public function testEmbedButtonAdmin() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    // Ensure proper access to the Embed settings page.
    $this->drupalGet('admin/config/content/embed');
    $assert_session->pageTextContains('You are not authorized to access this page.');

    $this->drupalLogin($this->adminUser);
    $this->drupalGet('admin/config/content/embed');

    // Add embed button.
    $this->clickLink('Add embed button');
    $button_label = $this->randomMachineName();
    $button_id = strtolower($button_label);
    $page->fillField('label', $button_label);
    $this->assertNotEmpty($assert_session->waitForText("Machine name: $button_id"));
    $edit = [
      'type_id' => 'embed_test_default',
    ];
    $this->drupalPostForm(NULL, $edit, 'Save');
    // Ensure that the newly created button is listed.
    $this->drupalGet('admin/config/content/embed');
    $assert_session->pageTextContains($button_label);

    // Edit embed button.
    $this->drupalGet('admin/config/content/embed/button/manage/' . $button_id);
    $new_button_label = $this->randomMachineName();
    $edit = [
      'label' => $new_button_label,
    ];
    $this->drupalPostForm(NULL, $edit, 'Save');
    // Ensure that name and label has been changed.
    $this->drupalGet('admin/config/content/embed');
    $assert_session->pageTextContains($new_button_label);
    $assert_session->pageTextNotContains($button_label);

    // Delete embed button.
    $this->drupalGet('admin/config/content/embed/button/manage/' . $button_id . '/delete');
    $this->drupalPostForm(NULL, [], 'Delete');
    // Ensure that the deleted embed button no longer exists.
    $this->drupalGet('admin/config/content/embed/button/manage/' . $button_id);
    $assert_session->pageTextContains('The requested page could not be found.');
    // Ensure that the deleted button is no longer listed.
    $this->drupalGet('admin/config/content/embed');
    $assert_session->pageTextNotContains($button_label);
  }

  public function testButtonValidation() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->drupalLogin($this->adminUser);
    $this->drupalGet('admin/config/content/embed/button/add');

    $button_label = $this->randomMachineName();
    $button_id = strtolower($button_label);
    $page->fillField('label', $button_label);
    $this->assertNotEmpty($assert_session->waitForText("Machine name: $button_id"));
    $page->selectFieldOption('type_id', 'embed_test_aircraft');
    $aircraft_type = $assert_session->waitForField('type_settings[aircraft_type]');
    $this->assertNotEmpty($aircraft_type);
    $this->assertSame('fixed-wing', $aircraft_type->getValue());

    $edit['type_settings[aircraft_type]'] = 'invalid';
    $this->drupalPostForm(NULL, $edit, 'Save');
    $assert_session->pageTextContains('Cannot select invalid aircraft type.');

    $edit['type_settings[aircraft_type]'] = 'helicopters';
    $this->drupalPostForm(NULL, $edit, 'Save');
    $assert_session->pageTextContains('Helicopters are just rotorcraft.');

    $this->drupalGet('admin/config/content/embed/button/manage/' . $button_id);
    $this->assertFieldByName('type_settings[aircraft_type]', 'rotorcraft');
  }

  public function testCKEditorButtonConflict() {
    $page = $this->getSession()->getPage();
    $assert_session = $this->assertSession();

    $this->drupalLogin($this->adminUser);
    $this->drupalGet('admin/config/content/embed/button/add');

    $button_label = $this->randomMachineName();
    $button_id = strtolower($button_label);
    $page->fillField('label', $button_label);
    $this->assertNotEmpty($assert_session->waitForText("Machine name: $button_id"));

    $assert_session->elementExists('css', '#edit-label-machine-name-suffix')
      ->pressButton('Edit');

    $id = $assert_session->waitForField('id');
    $this->assertNotEmpty($id);
    $id->setValue('DrupalImage');

    $edit = [
      'type_id' => 'embed_test_default',
    ];
    $this->drupalPostForm(NULL, $edit, 'Save');
  }

}
