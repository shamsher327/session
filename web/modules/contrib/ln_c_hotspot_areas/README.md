CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Instructions


INTRODUCTION
------------
  "Lightnest components: Hotspot areas" module allows you to create hot areas in an image, and show information on mouse over or click
  Image must be provided by "Image" core module.

REQUIREMENTS
------------
  This module requires the following modules:

  *  Image
  
INSTALLATION
------------
  Install as you would normally install a contributed Drupal module. See:
  https://drupal.org/documentation/install/modules-themes/modules-8
  for further information.
  
CONFIGURATION
-------------
 * Configure user permissions in "_Administration_ » _People_ » _Permissions_"
   (/admin/people/permissions)
     - Create and edit edit image hotspot areas
       User in this permission can create and edit hotspot areas for image when view it.
       
INSTRUCTIONS
------------
  *  Create content type (or other entities bundle) with image field.
  *  Go to your content type "Manage display" page.
  *  Change the formatter of this image field to "Hotspots Areas".
  *  Select image style.
  *  Create some content.
  *  Open the "view" page of your content.
  *  Under image now you can see "Add hotspot area" button.
  
  Every hotspot is depend of field image style. So if you change it
  you will not see hotspots that was created with previous image style.

