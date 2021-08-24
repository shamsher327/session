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

The Lightnest TINT module integrates the TINT social media feed service with Drupal.

TINT is a service that integrates all of your brand's social media posts in one beautiful stream, perfect for embedding on your website.


REQUIREMENTS
------------

This module requires the following modules:

* Paragraphs (https://www.drupal.org/project/paragraphs)
* Advanced DataLayer (https://www.drupal.org/project/advanced_datalayer)

INSTALLATION
------------

* Install as you would normally install a contributed Drupal module. Visit
   https://www.drupal.org/node/1897420 for further information.


CONFIGURATION
-------------

* Configure the field inside the Struture » Content types » Any content type : Add entity reference or paragraph reference field and select Text paragraph in reference.

* Go to that Node type page under crate a node form.

* Visit the TINT website at https://www.tintup.com and create an account.

* Add the TINT you would like to see in your feed.


FUNCTIONALITY
-------------

* A title and description can be added.

* Data Personalization Id from tint feeds.

* Data Id from tint feeds.

* Data Clickformore cab be select.

* Data Columns can be added.

* Data Expand can be added.

* Data Infinitescroll can be added.

TROUBLESHOOTING
---------------

 * If the content does not display, check the following:

   - Does paragraph--dsu-tint.html.twig template is execute?

EXTEND
------

 * hook_theme for extending default template of Lightnest paragraph DSU Tint.
 * hook_preprocess_paragraph for data processing.
 * Override default css libraries to change default UI/UX.


MAINTAINERS
-----------

* Nestle Webcms team.