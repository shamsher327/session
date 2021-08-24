CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Functionality
 * Troubleshooting
 * Maintainers
 * Extend

INTRODUCTION
------------

ABOUT Smart Recipe Hub:

Smart Recipe Hub (from now on SRH) it's the backend where recipes are stored. Each recipe has many tools, ingredients, macronutrients, and steps.

The SRH has some search features, and we will use it in this module when using the de search feature.

Recipes could be ordered by some parameters. Collections are groups or recipes (like summer, fresh, cold.) and Tags are another way to group it, like (breakfast, dinner).

On other hand, images have specific formats and sizes. In our Drupal module, we get de URL of the image in the CDN (images are local) and store it, then we make different calls to the CDN depending on the screen type. (this feature doesn't work in SRH, it's a TODO)


ABOUT SRH Connector:

Provides integration of Drupal Website to Smart Recipe Hub, and provide a search bar widget to access to search engine provided by de SRH

The process will import and synchronized the recipes existing in the SRH depending on the market and endpoint configured in UI configuration.

The recipes and the entities related to the recipes are stored in the new content-type Recipe. (Be careful of view display mode, could be unable)

The Search Feature, search directly to the SRH, (only use the local recipes when a recipe details it's accessed)

The importation process could be configurable in the option's menu. Otherwise, in every time-configurable cron process, the module will check if there are new, updated, or unpublished recipes and import, update, or unpublished it locally.

The Search Feature also has a synchronization tool. If a recipe searched (remind that search feature works with SRH directly) it's not present locally, then the module import it. It will affect the performance (1 second per recipe to import in every search) but will maintain the website always synchronized to the SRH.

Recommended Configurations
--------------------------

When the dsu_srh (SRH) Recipe Hub module is installed, several paragraphs specific to SRH will appear under the component selector wherever it is made available. These SRH components are not for use on component pages, and are already added to the Recipe template automatically.

The Agency needs to follow these steps to exclude those components from the selector to provide a cleaner editorial experience.
 * Go to this page "admin/structure/types/manage/dsu_component_page/fields"
 * Find the field and edit field settings "Components"
 * Uncheck these component for component listing
    - SRH Macronutrients unitType
    - Media Information
    - SRH Nutritional Tips
    - SRH Recipe Ingredients
    - SRH Recipe MacroNutrients
    - SRH Recipe Steps
    - SRH Recipe Tools
    - SRH Recipe Variants
    - SRH Related Recipes
    - SRH Tags Selector

 * These are the modules related to SRH and SRH mymenuIQ
    - Lightnest SRH Connector
    - LightNest SRH Custom Schema.org tokens for recipe
    - LightNest SRH Custom Schema.org variables for recipe
    - LightNest SRH MyMenuIQ

 * Configuration for SRH components
    * Smart Recipe Hub  -> admin/config/lightnest/dsu_srh
    * SRH Connector Configuration -> /admin/config/lightnest/dsu_srh/config
    * Import Recipes from SRH -> /admin/config/lightnest/dsu_srh/importer
    * MyMenu IQ configuration -> /admin/config/lightnest/dsu_srh/mymenu-iq
    * SRH Categories configurations -> admin/structure/taxonomy
    * MyMenuIQ configurations Blocks -> /admin/structure/block

  * Update SRH Configs and get new functionalities
    * Get latest configs -> /admin/config/development/features/edit/dsu_srh
    * Update existing Configs -> /admin/config/development/features/diff/dsu_srh

REQUIREMENTS
------------

This module has no specific dependencies.

INSTALLATION
------------

 * REQUIREMENTS
   * Paragraphs, Entity Revision, Video embed field modules
   * API KEY needed
   * DEVEL (ONLY IN DEV STAGE)
   * Jquery Spinner
   * Path auto and Metatag.


 * PROCESS

   * Install the de module and its dependencies as usual.

   * Depending on your site configuration (if you are using the builder layout app) your view entity form will be misconfigured, and the fields of the content type Recipe will be hidden. Please, enable this content-type and configure the labels as you want. Otherwise, to use it directly in the twig template engine the fields must be enabled.

   * Please configure the module UI and test the connection to the SRH in /admin/config/lightnest/dsu_srh/config

   * Once the connection test has passed, please proceed with the manual importation (in /admin/config/lightnest/dsu_srh/importer) before using the search box widget. It will increase performance.


 * CAUTION

   * The importation process may need a specific server (PHP) configuration, to avoid the timeout, and memory limit, depending on the market and the server configuration (not usual)

CONFIGURATION
-------------

 * The configuration it's settled in Configuration->Lightnest->SRH

 * CONFIGURE THE SERVER CALL TO SMART RECIPE HUB URL

   * Set the parameters, ask the Nestle Digital Hub to get it

 * CONFIGURE SYNCHRONIZATION PROCESS IN YOUR WEBSITE

   * The number set in this configuration it's the number of recipes call by second to the SRH. More recipes will increase the performance in the update process but could stress the SRH server. Check with the Nestlé Digital Hub to ensure

   * Set on the checkbox to active the Cron Process. Without these options, their recipes will not be synchronized periodically.

   * Set the time when this process will be executed. (PLEASE NOTE; that the recipe search already has a synchronization feature, making this process more periodically we will improve the search feature performance)

 * CONFIGURE THE SEARCH SERVICE

   * Set collections and tags comma separated. TAGs can have one level of the hierarchy. Usually, site-builders will need only one level of the hierarchy, but, the SRH allows all these capabilities. Feel free to check it.

 * RECOMMENDATIONS:

   * FRONT-END -> Expand the templates delivered

   * The search feature, and the entities imported have their templates. Feel free to reuse it, or use a more specific template name (to override it in specific cases, check drupal documentation)

   * The ingredient entity, has attached an ingredient taxonomy, use it to sort or search locally by ingredients

   * To modify the Search Feature form, please go to src/Form/RecipeSearch::BuildForm

 * UNINSTALLATION

   * To uninstall the module, be aware that the content type Recipe, and it's content are erased from the site.

FUNCTIONALITY
-------------
 * URL, Market, Language & User configurable
 * Migration of all Recipes of a specific market to local
 * Creation of a Content-type to store Recipes, with Paragraphs and Taxonomies integrated
 * UI for Packets of recipes requested, cron synchronization, and the time when cron will be executed
 * Search Box widget & Custom Search Block integrated with Block system
 * Specific search page in /recipes
 * UI for the number of recipes showed by the search feature, collection filter, and multi-tag filter.
 * Disable indexing while syncing with products and enable it after sync complete.
 * Custom basic templates
 * Options on manually sync product with single recipes, last updated, weekly and full sync.
 * Cron configuration to run SRH periodically
 * Images are storing with URL so won't create duplicate media files.
 * In manual sync history of last updated sync process manually or with cron.
 * Updating SRH sync with an existing product and deleting only attached paragraph with updated new paragraph values.
 * Configuring sync with Channel ID and Ciamnum header set.
 * Added a new module to render the MyMenuIQ widget feature.
 * Added new functionality to provide structured data markup for recipe content type.
 * Drupal 9 compatibility and fallback with older versions.

TROUBLESHOOTING
---------------

 * PERFORMANCE ISSUES (ONLY AFFECT IN THE FIRST IMPORT PROCESS;

   * Multithreading in HTTP request it's implemented
   * Save recipe when import it's the bottleneck
      * Proposes:
         * Nutrients entity consumes 50% of time performance
            * Now every nutrient is an entity paragraph attached to a recipe, this allows the admin to edit, organize and work with those entities in the Drupal Way.
            * Change it for key/value simple field, will improve the performance
         * Ingredients entities consume 30% of time performance
            * Now every ingredient are a Taxonomy field attached to a Paragraph entity attached to a Recipe, this allows admin to categorize recipes by ingredients out-of-the-box, and edit, organize and work with ingredients values
            * Construct it only will increase the performance, losing these features

 * SERVER CONFIGURATION (ONLY AFFECT IN THE FRIST IMPORT PROCESS);

   * PHP Max allowed memory will be raised easily during the importation process.
      *  In Cron Importation, Cron will import a specific number of recipes until this happens
         * Every cron, will import until all the recipes are imported.
      * In manual importation, it's the same behavior, buy manually.

   * It's hard recommended to set de PHP Memory 512MB to avoid it

EXTEND
------

 * hook_theme for extending the default template of Lightnest SRH.
 * hook_preprocess_node and paragraph for data processing.
 * Override default CSS libraries to change default UI/UX.

MAINTAINERS
-----------

* Nestle Webcms team.
* Check the changelog file for more details.
