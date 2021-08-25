<?php

namespace Drupal\indegene_common\Plugin\Block;

use Drupal\block\BlockForm;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\PluginBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "indegene_custom_block",
 *   admin_label = @Translation("Indegene Block"),
 *   category = @Translation("Indegene Block"),
 * )
 */
class HelloBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {


    return [
      '#markup' => $this->t('Hello, World!'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['hello_block_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => $config['hello_block_name'] ?? '',
    ];

    $form['hello_block_name2'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Who'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => $config['hello_block_name'] ?? '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['hello_block_name'] = $values['hello_block_name'];
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    if ($form_state->getValue('hello_block_name') === 'John') {
      $form_state->setErrorByName('hello_block_name', $this->t('You can not say hello to John.'));
    }
  }

}