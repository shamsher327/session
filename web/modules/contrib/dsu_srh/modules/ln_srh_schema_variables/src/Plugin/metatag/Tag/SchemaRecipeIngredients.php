<?php

namespace Drupal\ln_srh_schema_variables\Plugin\metatag\Tag;

use Drupal\schema_metatag\Plugin\metatag\Tag\SchemaNameBase;

/**
 * Provides a plugin for the 'name' meta tag.
 *
 * - 'id' should be a globally unique id.
 * - 'name' should match the Schema.org element name.
 * - 'group' should match the id of the group that defines the Schema.org type.
 *
 * @MetatagTag(
 *   id = "schema_recipe_ingredients",
 *   label = @Translation("Recipe Ingredients"),
 *   description = @Translation("REQUIRED BY GOOGLE. The Ingredients of the recipe."),
 *   name = "Recipeingredients",
 *   group = "schema_recipe",
 *   weight = 3,
 *   type = "string",
 *   secure = FALSE,
 *   multiple = FALSE
 * )
 */
class SchemaRecipeIngredients extends SchemaNameBase {

}
