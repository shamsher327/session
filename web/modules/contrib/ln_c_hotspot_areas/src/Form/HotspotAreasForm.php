<?php

namespace Drupal\ln_c_hotspot_areas\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *
 */
class HotspotAreasForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hotspot_areas_form';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['shape'] = array(
      '#type' => 'select',
      '#title' => $this->t('Shape'),
      '#options' => [
        'square' => $this->t('Square'),
        'circle' => $this->t('Circle'),
      ],
      '#default_value' => 'square',
      '#weight' => 0,
    );

    $form['mouse_behaviour'] = array(
      '#type' => 'select',
      '#title' => $this->t('Mouse Behaviour'),
      '#options' => [
        'click' => $this->t('Click'),
        'hover' => $this->t('Hover'),
      ],
      '#default_value' => 'click',
      '#weight' => 1,
    );

    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
      '#attributes' => [
        'placeholder' => $this->t('Title'),
      ],
      '#weight' => 2,
    );

    $form['link'] = [
      '#title' => $this->t('Link (URL like https://www.nestle.com)'),
      '#type' => 'url',
      '#attributes' => [
        'placeholder' => $this->t('Link (URL)'),
      ],
      '#weight' => 3,
    ];

    $form['link_title'] = [
      '#title' => $this->t('Link title'),
      '#type' => 'textfield',
      '#attributes' => [
        'placeholder' => $this->t('Link title'),
      ],
      '#weight' => 4,
    ];

    $form['description'] = array(
      '#type' => 'text_format',
      '#title' => $this->t('Description'),
      '#attributes' => [
        'placeholder' => $this->t('Description'),
      ],
      '#weight' => 5,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
      '#weight' => 6,
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
