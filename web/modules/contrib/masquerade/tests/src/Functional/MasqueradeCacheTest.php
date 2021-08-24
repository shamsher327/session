<?php

namespace Drupal\Tests\masquerade\Functional;

use Drupal\block\Entity\Block;

/**
 * Tests caching for masquerade.
 *
 * @group masquerade
 */
class MasqueradeCacheTest extends MasqueradeWebTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'masquerade',
    'user',
    'block',
    'node',
    'dynamic_page_cache',
    'toolbar',
  ];

  /**
   * Tests caching for the user switch block.
   */
  public function testMasqueradeSwitchBlockCaching() {
    // Create two masquerade users.
    $umberto = $this->drupalCreateUser([
      'masquerade as any user',
      'access content',
    ], 'umberto');
    $nelle = $this->drupalCreateUser([
      'masquerade as any user',
      'access content',
    ], 'nelle');

    // Add the Masquerade block to the sidebar.
    $masquerade_block = $this->drupalPlaceBlock('masquerade');

    // Login as Umberto.
    $this->drupalLogin($umberto);
    $this->drupalGet('<front>');
    $this->assertBlockAppears($masquerade_block);

    // Masquerade as Nelle.
    $edit = ['masquerade_as' => $nelle->getAccountName()];
    $this->drupalPostForm(NULL, $edit, $this->t('Switch'));
    $this->drupalGet('<front>');
    $this->assertNoBlockAppears($masquerade_block);

    // Logout, and log in as Nelle.
    $this->drupalLogout();
    $this->drupalLogin($nelle);
    $this->drupalGet('<front>');
    $this->assertBlockAppears($masquerade_block);

    // Validate cache contexts for block with permissions of user.
    $this->validateMasqueradeBlock($masquerade_block->id());
  }

  /**
   * Tests caching for the Unmasquerade link in the admin toolbar.
   */
  public function testMasqueradeToolbarLinkCaching() {
    // Create a test user with toolbar access.
    $test_user = $this->drupalCreateUser([
      'access content',
      'access toolbar',
    ]);

    // Login as admin and masquerade as the test user to have the page cached
    // as the test user.
    $this->drupalLogin($this->admin_user);
    $this->masqueradeAs($test_user);
    $this->assertSession()->linkExists('Unmasquerade');
    // We only check here for the session cache context, because it is present
    // alongside with session.is_masquerading and the latter is optimized away.
    // So only the session cache context remains.
    $this->assertCacheContext('session');

    // Login as the test user and make sure the Unmasquerade link is not visible
    // and the cache context is correctly set.
    $this->drupalLogin($test_user);
    $this->assertSession()->linkNotExists('Unmasquerade');
    $this->assertCacheContext('session.is_masquerading');
  }

  /**
   * Validates block entity cache contexts.
   *
   * @param string $bid
   *   The block ID to load and validate.
   */
  protected function validateMasqueradeBlock($bid) {
    /** @var \Drupal\block\Entity\Block $block */
    $block = Block::load($bid);
    $this->assertTrue(in_array('session.is_masquerading', $block->getPlugin()->getCacheContexts(), TRUE));
    /** @var \Drupal\Core\Access\AccessResult $result */
    $result = $block->access('view', NULL, TRUE);
    $this->assertTrue(in_array('session.is_masquerading', $result->getCacheContexts()));
  }

}
