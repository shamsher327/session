<?php

namespace Drupal\ln_srh_schema_tokens;

use Drupal\paragraphs\Entity\Paragraph;

/**
 * Implement Class Schema Node Tokens Utility.
 */
class NodeTokenUtility {

  /**
   * Get Macro Nutrient Data.
   */
  public function getRecipeMacroNutrientsValue($node, $nutrient) {
    $nutritional_data = '';
    if (!empty($node)) {
      $paragraph = $node->get('field_recipe_macronutrients')->getValue();
      foreach ($paragraph as $value) {
        $target_id = $value['target_id'];
        $nutrient_paragraph = Paragraph::load($target_id);

        // Get only three fields macro_quantity, macro_unit, macro_name.
        if ($nutrient_paragraph->get('field_para_macro_quantity')->first() != NULL) {
          $macro_quantity = $nutrient_paragraph->get('field_para_macro_quantity')->first()->get('value')->getString();
        }

        if ($nutrient_paragraph->get('field_para_macro_unit')->first() != NULL) {
          $macro_unit = $nutrient_paragraph->get('field_para_macro_unit')->first()->get('value')->getString();
        }

        if ($nutrient_paragraph->get('field_para_macro_name')->first() != NULL) {
          $macro_name = $nutrient_paragraph->get('field_para_macro_name')->first()->getValue()['value'];
        }

        // Match pre-decided micronutrients value then set it to another array.
        if (!empty($macro_name) && ($macro_name == $nutrient)) {
          $nutritional_data = $macro_quantity . ' ' . $macro_unit;
        }
      }
    }
    return $nutritional_data;
  }
}
