<?php

namespace Drupal\ln_quiz\Plugin\DsField\Paragraph;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\ds\Plugin\DsField\DsFieldBase;
use Drupal\ln_quiz\LnQuizConstants;

/**
 * Plugin that renders the 'answer input'
 *
 * @DsField(
 *   id = "ln_quiz_answer_input",
 *   title = @Translation("Quiz Answer Input"),
 *   provider = "ln_quiz",
 *   entity_type = "paragraph",
 *   ui_limit = {"quiz_question|*"},
 * )
 */
class QuizAnswerInput extends DsFieldBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    /** @var \Drupal\paragraphs\ParagraphInterface $quiz_question */
    $quiz_question = $this->entity();
    /** @var \Drupal\paragraphs\ParagraphInterface $quiz */
    $quiz = $quiz_question->getParentEntity();
    $build = [
      'true_button' => [
        '#type' => 'link',
        '#title' => $this->t($config['label_true']),
        '#url' => Url::fromRoute('ln_quiz.process',[
          'quiz' => $quiz->id(),
          'question' => $quiz_question->id(),
          'action' => LnQuizConstants::QUIZ_ACTION_CHECK
        ],[
          'query'=>[
            'answer' => '1'
          ]
        ]),
        '#attached' => [
          'library' => [
            'ln_quiz/quiz-localstorage-command'
          ]
        ],
        '#attributes' => [
          'class' => ['quiz-ajax']
        ]
      ],
      'false_button' => [
        '#type' => 'link',
        '#title' => $this->t($config['label_false']),
        '#url' => Url::fromRoute('ln_quiz.process',[
          'quiz' => $quiz->id(),
          'question' => $quiz_question->id(),
          'action' => LnQuizConstants::QUIZ_ACTION_CHECK
        ],[
          'query' => [
            'answer' => '0'
          ]
        ]),
        '#attached' => [
          'library' => [
            'ln_quiz/quiz-localstorage-command'
          ]
        ],
        '#attributes' => [
          'class' => ['quiz-ajax']
        ]
      ],
    ];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    $form = parent::settingsForm($form, $form_state);
    $form['label_true'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label True'),
      '#default_value' => $config['label_true'],
      '#required' => TRUE,
    ];
    $form['label_false'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label False'),
      '#default_value' => $config['label_false'],
      '#required' => TRUE,
    ];
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function settingsSummary($settings) {
    $config = $this->getConfiguration();
    $summary = [];
    $summary[] = 'Label True: ' . $config['label_true'];
    $summary[] = 'Label False: ' . $config['label_false'];
    return $summary;
  }
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $configuration = [
      'label_true' => 'True',
      'label_false' => 'False',
    ];
    return $configuration;
  }

}
