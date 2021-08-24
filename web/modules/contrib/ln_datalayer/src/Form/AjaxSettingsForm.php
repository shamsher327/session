<?php

namespace Drupal\ln_datalayer\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\ln_datalayer\Form
 */
class AjaxSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajaxify_submit_forms';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ln_datalayer.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ln_datalayer.settings');
    $keys = !empty($config->getRawData()) ? preg_filter('/^ln_datalayer_(.*)/', '$1', array_keys($config->getRawData())) : '';
    $count = !empty($keys) ? count($keys) : 1;

    // State that the form needs to allow for a hierarchy (ie, multiple
    // names with our names key).
    $form['#tree'] = TRUE;

    // Initial number of names.
    if (!$form_state->get('num_names')) {
      $form_state->set('num_names', $count);
    }
    $form['description'] = [
      '#type' => 'markup',
      '#markup' => $this->t('If a site owner or agency want to trigger a datalayer event on form submit. Please add the form_id.'),
      '#prefix' => '<p><b>',
      '#suffix' => "</b></p>",
      '#weight' => '-1',
    ];
    // Container for our repeating fields.
    $form['names'] = [
      '#type' => 'container',
      '#prefix' => '<div id="names_fieldset_wrapper">',
      '#suffix' => '</div>',
    ];

    // Add our names fields.
    for ($x = 0; $x < $form_state->get('num_names'); $x++) {

      $value = explode(':', $config->get('ln_datalayer_' . $x));

      $form['names'][$x] = [
        '#type' => 'container',
        '#attributes' => ['class' => ['item-form']],
      ];
      $form['names'][$x]['id_form'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Form ID'),
        '#default_value' => !empty($value[0]) ? $value[0] : '',
        '#description' => $this->t('Example : Form ID ="user_register_form"'),
      ];

      $form['names'][$x]['actions'] = [
        '#type' => 'select',
        '#title' => $this->t('Action'),
        '#options' => ['submit' => 'Submit'],
        '#default_value' => !empty($value[1]) ? $value[1] : '',
      ];
    }

    // Button to add more names.
    $form['addname'] = [
      '#type' => 'submit',
      '#value' => $this->t('Add more'),
      '#ajax' => [
        'callback' => '::addNewFields',
        'wrapper' => 'names_fieldset_wrapper',
        'effect' => 'fade',
      ],
    ];

    // Submit button.
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    $form['#attached']['library'][] = 'ln_datalayer/ln_datalayer.style';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    // Decide what action to take based on which button the user clicked.
    switch ($values['op']) {
      case 'Add more':
        $this->addNewFields($form, $form_state);
        break;

      default:
        $this->save($form, $form_state);
    }
  }

  /**
   * Handle adding new.
   */
  public function addNewFields(array &$form, FormStateInterface $form_state) {
    // Add 1 to the number of names.
    $num_names = $form_state->get('num_names');
    $form_state->set('num_names', ($num_names + 1));

    // Rebuild the form.
    $form_state->setRebuild();
    return $form['names'];
  }

  /**
   * Handle submit.
   */
  private function save(array &$form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $config = $this->config('ln_datalayer.settings');
    foreach ($form_values['names'] as $key => $value) {

      if (!empty($value['id_form'])) {
        $config->set('ln_datalayer_' . $key, $value['id_form'] . ':' . $value['actions'])
          ->save();
      }
      else {
        $config->clear('ln_datalayer_' . $key)->save();
      }

    }
    $this->messenger()
      ->addMessage($this->t('Your configuration is saved'), 'status');
  }

}
