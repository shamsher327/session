<?php

namespace Drupal\dsu_srh\Form;

use Drupal;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Renderer;
use Drupal\dsu_srh\Controller\SearchService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Submit a form without a page reload.
 */
class RecipeSearch extends FormBase {

  /**
   * Configuration state Drupal Site.
   *
   * @var array
   */
  protected $configFactory;

  /**
   * Serialization service.
   *
   * @var array
   */
  protected $serialization;

  /**
   * Render service.
   *
   * @var array
   */
  protected $renderer;

  /**
   * DSU SRH Search Service.
   *
   * @var array
   */
  protected $srhSearch;

  /**
   *
   */
  public function __construct(ConfigFactory $configFactory, Json $serialization, Renderer $renderer, SearchService $srhSearch) {
    $this->configFactory = $configFactory;
    $this->serialization = $serialization;
    $this->renderer = $renderer;
    $this->srhSearch = $srhSearch;

  }

  /**
   *
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('serialization.json'),
      $container->get('renderer'),
      $container->get('dsu_srh.search')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'recipe_search_form';
  }

  /**
   * {@inheritdoc}
   *
   * This Form it's a submitted driven form, with specific callback function.
   * Submit function is unused.
   */
  public function buildForm(array $form, FormStateInterface $form_state, $arg = NULL) {

    $pluguin_id = $arg['id'];
    // var_dump($pluguin_id);
    $form_state->set('numberRows', $arg['number'][0]['value']);
    $form_state->set('pluguin_id', $pluguin_id);
    $form_state->set('textbox', $arg['textbox'][0]['value']);
    if (isset($arg['tags'])) {
      $tags = $arg['tags'];
    }
    // Init start and pagerif dosen't.
    $start = $form_state->get('start');
    if ($start === NULL) {
      $form_state->set('start', 0);
    }
    $pager = $form_state->get('pager');
    if ($pager === NULL) {
      $form_state->set('pager', 0);
    }

    $config = $this->configFactory->getEditable('dsu_srh.settings');

    $form['#prefix'] = '<div id="box">';
    $form['#suffix'] = '</div>';
    $form['container'] = [
      '#type' => 'container',
    ];
    // The box contains some markup that we can change on a submit request.
    if ($arg['textbox'][0]['value'] == 1) {
      $form['container']['valid'] = [
        '#type'        => 'textfield',
        '#title'       => $this->t('Search for recipes'),
        '#description' => $this->t('Any ingredient or name you whish'),
        '#prefix'      => '<div id="recipes"></div>',
      ];
    }
    // Preparing the collections filter
    // $collectionArray = explode(',',$collections);.
    if (!empty($arg['collection'][0]['value'])) {
      $collectionArray = explode(',', $arg['collection'][0]['value']);
      foreach ($collectionArray as $number => $collection) {
        $collectBoxes[$collection] = $collection;
      }
    }
    if (!empty($collectionArray['0'])) {
      $form['container']['collection'] = [
        '#type'         => 'select',
        '#options'      => $collectBoxes,
        '#title'        => $this->t('Collections'),
        '#empty_option' => 'All Collections',
        '#empty_value'  => '',
      ];
    }
    if (!empty($tags)) {
      foreach ($tags as $key => $value) {
        if (isset($value['title'])) {
          $tagfields = explode(',', $value['tags']);
          foreach ($tagfields as $indtag) {
            if ($indtag != '') {
              $tag[$indtag] = $indtag;
            }
          }
          if ($value['title'] != '' || !empty($tag)) {
            $arrayTags[$value['title']] = $tag;
            unset($tag);
          }
        }
      }

      if (!empty($arrayTags)) {
        $form['container']['select'] = [
          '#type'     => 'select',
          '#title'    => $this->t('Select Tags'),
          '#options'  => $arrayTags,
          '#multiple' => 'TRUE',
        ];
      }
    }
    /**
     * This submit is an Ajax CALL to the promptCallback function
     */
    $form['actions']['submit'] = [
      '#type'   => 'submit',
      '#title'  => $this->t('Search'),
      '#value'  => $this->t('Search'),
      '#submit' => ['::showPager'],
      '#ajax'   => [
        'callback' => '::promptCallback',
        'wrapper'  => $pluguin_id,
        'effect'   => 'slide',
        'event'    => 'click',
        'progress' => [
          'type'    => 'throbber',
          'message' => '',
        ],
      ],
    ];

    $form['container2'] = [
      '#type'       => 'container',
      '#weight'     => 60,
      '#attributes' => ['id' => $pluguin_id],
    ];
    $form['container2']['view_more'] = [
      '#type'      => 'container',
      '#collapsed' => FALSE,
      '#weight'    => 62,
    ];

    if ($pager == 1) {
      if ($start != 0) {
        $form['container2']['view_more']['pagerBack'] = [
          '#type'   => 'submit',
          '#title'  => $this->t('See previous'),
          '#submit' => ['::pagerBack'],
          // The AJAX handler will call our callback, and will replace whatever page
          // element has id box-container.
          '#ajax'   => [
            'callback' => '::promptCallback',
            'wrapper'  => $pluguin_id,
            'effect'   => 'slide',
          ],
          '#value'  => $this->t('See previous'),
        ];
      }
      $form['container2']['view_more']['pagerForward'] = [
        '#type'   => 'submit',
        '#title'  => $this->t('See more'),
        '#submit' => ['::pagerForward'],
        // The AJAX handler will call our callback, and will replace whatever page
        // element has id box-container.
        '#ajax'   => [
          'callback' => '::promptCallback',
          'wrapper'  => $pluguin_id,
          'effect'   => 'slide',
        ],
        '#value'  => $this->t('See more'),
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc} UNUSED instead of promptCallback.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * @return array
   *   Renderable array (the box element)
   */
  public function promptCallback(array &$form, FormStateInterface $form_state) {

    $config = $this->configFactory->getEditable('dsu_srh.settings');
    $start = $form_state->get('start');
    $pager = $form_state->get('pager');
    $numberRows = $form_state->get('numberRows');
    Drupal::logger('SRH')
      ->notice('pluguin; <pre><code>' . print_r($form_state->get('numberRows'), TRUE) . '</code></pre');
    /*
     * If there are tags selected, we get it
     */
    $tagsArray = $form_state->getValue('select');
    if (is_array($tagsArray)) {
      $tagsArrayFilter = array_filter($tagsArray);
    }
    else {
      $tagsArrayFilter = [$tagsArray => $tagsArray];
    }
    Drupal::logger('SRH')->notice('Search Before send');

    $content = $this->srhSearch->getRecipes(
      $form_state->getValue('valid'),
      $tagsArrayFilter,
      $form_state->getValue('collection'),
      $start,
      $numberRows
    );
    if ($content['response'] == 'no_results') {
      $empty = TRUE;
      $message = $this->t('No recipes matched, please try another time!');
      $form_state->set('pager', 0);
      unset($form['container2']['view_more']);
    }
    else {
      if ($content['response'] == 'no_market') {
        $empty = TRUE;
        $message = $this->t('No market configured, please configure the market for this lenguage');
        $form_state->set('pager', 0);
        unset($form['container2']['view_more']);
      }
      else {
        if (($content['recipes']['numResults'] - $start) <= $config->get('dsu_srh.dsu_connect_quantity')) {
          $form_state->set('pager', 0);
          unset($form['container2']['view_more']['pagerForward']);
        }
        $empty = FALSE;
        $message = '';
      }
    }
    // echo($form_state->get('pluguin_id'));.
    $elem = [
      '#theme'       => 'dsu_srh-recipes-search',
      '#title'       => 'Recipes',
      '#description' => 'Set recipes',
      '#variables'   => [
        'message' => $message,
        'empty'   => $empty,
        'recipe'  => $form_state->getValue('valid'),
        'content' => $content['recipes']['items'],
        'ident'   => $form_state->get('pluguin_id'),
      ],
    ];

    $form['container2']['recipes'] = [
      '#type'   => 'fieldset',
      '#value'  => $this->renderer->render($elem),
      '#weight' => 61,
    ];

    return $form['container2'];
  }

  /**
   * Callback for submit_driven example.
   */
  public function showPager(array &$form, FormStateInterface $form_state) {

    $form_state->set('pager', '1');
    $form_state->set('start', 0);
    $form_state->setRebuild();
  }

  /**
   * Select the 'box' element, change the markup in it, and return it as a
   * renderable array.
   */
  public function pagerForward(array &$form, FormStateInterface $form_state) {

    $start = $form_state->get('start');
    $config = $this->configFactory->getEditable('dsu_srh.settings');
    $start = $start + $config->get('dsu_srh.dsu_connect_quantity');
    $form_state->set('start', $start);
    $form_state->setRebuild();
  }

  /**
   *
   */
  public function pagerBack(array &$form, FormStateInterface $form_state) {

    $start = $form_state->get('start');
    $config = $this->configFactory->getEditable('dsu_srh.settings');
    $start = $start - $config->get('dsu_srh.dsu_connect_quantity');
    $form_state->set('start', $start);
    $form_state->setRebuild();
  }

}
