<?php

/**
 * @file
 * theme-settings.php
 *
 * Provides theme settings for Bootstrap Barrio-based themes.
 */

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Implements hook_form_FORM_ID_alter().
 */
function bootstrap_barrio_form_system_theme_settings_alter(&$form, FormStateInterface $form_state, $form_id = NULL) {

  // General "alters" use a form id. Settings should not be set here. The only
  // thing useful about this is if you need to alter the form for the running
  // theme and *not* the theme setting.
  // @see http://drupal.org/node/943212
  if (isset($form_id)) {
    return;
  }
  $form['bootstrap_barrio_library'] = [
    '#type' => 'select',
    '#title' => t('Load library'),
    '#default_value' => theme_get_setting('bootstrap_barrio_library'),
    '#options' => [
      'cdn' => t('shamsher'),
      'development' => t('Local non-minimized (development)'),
      'production' => t('Local minimized (production)'),
    ],
  ];

}
