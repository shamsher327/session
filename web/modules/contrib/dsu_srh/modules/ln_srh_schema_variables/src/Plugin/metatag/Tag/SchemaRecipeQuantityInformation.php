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
 *   id = "schema_recipe_quantity",
 *   label = @Translation("Quantity Information"),
 *   description = @Translation("REQUIRED BY GOOGLE. The Quantity Information of the recipe."),
 *   name = "Quantityinformation",
 *   group = "schema_recipe",
 *   weight = 3,
 *   type = "string",
 *   secure = FALSE,
 *   multiple = FALSE
 * )
 */
class SchemaRecipeQuantityInformation extends SchemaNameBase {

}
