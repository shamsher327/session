<?php

namespace Drupal\dsu_ratings_reviews\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure dsu_rating_reviews settings for this site.
 */
class RatingsReviewsSettingsForm extends ConfigFormBase {

  const CONFIG_SUBJECT = 'mail_subject';

  const CONFIG_BODY = 'mail_body';

  const CONFIG_TOS = 'rating_tos';

  const FIELD_GROUP_CONFIG = 'main_settings';

  const FIELD_GROUP_MAIL = 'mail';

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'dsu_ratings_reviews.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dsu_rating_reviews_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form[self::FIELD_GROUP_CONFIG] = [
      '#type'  => 'fieldgroup',
      '#title' => $this->t('Main configuration'),
    ];

    $formatted_text = $config->get(self::CONFIG_TOS);
    $form[self::FIELD_GROUP_CONFIG][self::CONFIG_TOS] = [
      '#type'          => 'text_format',
      '#title'         => $this->t('Terms & conditions'),
      '#default_value' => $formatted_text['value'] ?: '',
      '#format'        => $formatted_text['format'] ?: '',
      '#description'   => $this->t('Please write the legal text the users would need to agree to write a review.'),
      '#required'      => TRUE,
    ];

    $form[self::FIELD_GROUP_MAIL] = [
      '#type'        => 'fieldgroup',
      '#title'       => $this->t('Moderator mail'),
      '#description' => $this->t('Select subject and body to notify administrators when a review is received.'),
    ];
    $form[self::FIELD_GROUP_MAIL][self::CONFIG_SUBJECT] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Subject'),
      '#description'   => $this->t('Mail subject to be used to notify administrators about the new rating.'),
      '#default_value' => $config->get(self::CONFIG_SUBJECT),
      '#required'      => TRUE,
    ];

    $form[self::FIELD_GROUP_MAIL][self::CONFIG_BODY] = [
      '#type'          => 'textarea',
      '#title'         => $this->t('Body of the mail'),
      '#default_value' => $config->get(self::CONFIG_BODY),
      '#required'      => TRUE,
    ];

    // Add the token tree UI.
    $form[self::FIELD_GROUP_MAIL]['token_tree'] = [
      '#theme'           => 'token_tree_link',
      '#token_types'     => ['comment'],
      '#global_types'    => TRUE,
      '#show_restricted' => TRUE,
      '#weight'          => 90,
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set(self::CONFIG_TOS, $form_state->getValue(self::CONFIG_TOS))
      ->set(self::CONFIG_SUBJECT, $form_state->getValue(self::CONFIG_SUBJECT))
      ->set(self::CONFIG_BODY, $form_state->getValue(self::CONFIG_BODY))
      ->save();

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

}
