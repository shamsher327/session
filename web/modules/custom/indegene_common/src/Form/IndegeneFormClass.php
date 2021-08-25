<?php


namespace Drupal\indegene_common\Form;


use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class IndegeneFormClass extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['indegene_custom_form.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'indegen_custom_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('indegene_custom_form.settings');
    $form['indegene_amazon_client_id'] = [
      '#type' => 'textfield',
      '#descriptions' => 'this is client id',
      '#disabled' => TRUE,
      '#title' => $this->t('Indegene amazon id'),
      '#default_value' => $config->get('amazon_id'),
    ];


    $form['indegene_amazon_seceret_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Indegene seceret id'),
      '#descriptions' => 'this is secret id',
      '#required' => TRUE,
      '#default_value' => $config->get('indegene_amazon_seceret_id'),
    ];

    $form['indegene_amazon_priority_id'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Indegene seceret id'),
      '#descriptions' => 'this is secret id',
      '#required' => TRUE,
      '#options' => ['1' => TRUE, '2' => FALSE],
      '#default_value' => $config->get('indegene_amazon_priority_id'),
    ];


    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!$form_state->isValueEmpty('indegene_amazon_client_id')) {
      if (empty($form_state->getValue('indegene_amazon_client_id'))) {
        $form_state->setErrorByName('indegene_amazon_client_id', t('Field is empty'));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->config('indegene_custom_form.settings')
      ->set('amazon_id', $form_state->getValues()['indegene_amazon_client_id'])
      ->save();

    $this->config('indegene_custom_form.settings')
      ->set('indegene_amazon_seceret_id', $form_state->getValues()['indegene_amazon_seceret_id'])
      ->save();
    $this->config('indegene_custom_form.settings')
      ->set('indegene_amazon_priority_id', $form_state->getValues()['indegene_amazon_priority_id'])
      ->save();
    parent::submitForm($form, $form_state);
  }

}
