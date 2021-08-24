<?php

namespace Drupal\dsu_srh\Plugin\Block;

use Drupal;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

/**
 * Provides a 'Recommended Recipes' block to be placed within the recipe
 * content.
 *
 * @Block(
 *   id = "recommended_recipes",
 *   admin_label = @Translation("Recommended Recipes"),
 *   category = @Translation("Recommended Recipes")
 * )
 */
class RecommendedRecipesBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();
    $recs = $this->getRecByType($config['recommendation_type']);
    return [
      '#markup' => $this->renderRecs($recs),
      '#cache'  => ['max-age' => 0],
    ];
  }

  /**
   *
   */
  private function getRecByType($type) {
    $nids = [];
    $node = Drupal::routeMatch()->getParameter('node');
    if ($node instanceof NodeInterface) {
      $result = Drupal::database()->query("SELECT entity_id FROM node__field_recipe_id WHERE field_recipe_id_value IN (
			SELECT field_recipe_rec_{$type}_value FROM node__field_recipe_rec_{$type} WHERE entity_id = {$node->id()})");
      foreach ($result as $k => $v) {
        $nids[] = $v->entity_id;
      }
    }
    return $nids;
  }

  /**
   *
   */
  private function renderRecs(array $ids, $view_mode = 'teaser') {
    $output = '';
    foreach ($ids as $id) {
      $node = Drupal::entityTypeManager()->getStorage('node')->load($id);
      $render = Drupal::entityTypeManager()
        ->getViewBuilder('node')
        ->view($node, $view_mode);
      $output .= render($render);
    }
    return $output;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $form['recommendation_type'] = [
      '#type'    => 'select',
      '#title'   => $this->t('Recommendation Type'),
      '#options' => [
        'by_images'       => $this->t('By Images'),
        'by_ingredients'  => $this->t('By Ingredients'),
        'by_steps_and_de' => $this->t('By Steps and Description'),
        'by_tags'         => $this->t('By Tags'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->setConfigurationValue('recommendation_type', $form_state->getValue('recommendation_type'));
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('recommendation_type'))) {
      $form_state->setErrorByName('recommendation_type', $this->t('You need to set a type for recommendations.'));
    }
  }

}
