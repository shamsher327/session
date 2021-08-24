## Bazaarvoice Integration

This module help us to integrate bazaarvoice Reviews and star rating for product type node using bazaarvoice id in each
node.

Description:
============
The Lightnest Bazaarvoice module is a suite of modules that provide a wide range of integrations with the Bazaarvoice
ratings and reviews service. Proper use of this module requires having a Bazaarvoice account and API Keys for the
Bazaarvoice Conversations API. To collect catalog information from your product display pages, add the JavaScript to
each of your PDPs. To make sure JavaScript is valid,

Usage:
======

- Showing Product ratings with aggregate start ratings.
- Showing reviews and QA for each product from Bazaarvoice iframe.
- Show campaign on product page related to that product bazaarvoice id.
- Add DCC javascript to product display pages.
    - https://knowledge.bazaarvoice.com/wp-content/conversations/en_US/Collect/product_feed.html#step-3-add-dcc-javascript-to-product-display-pages

Installation:
=============

Installation of this module is just like any other Drupal module.

1) Go to drupal extend and enable the module.
2) Once enabled the module go to "DSU Product" content type manage field.
3) Make sure "Bazaarvoice Product ID" field exist under the content type.
4) Go to manage display and enable "Bazaarvoice Product ID" field because default its in disable state.
5) Go to Admin form config and set client key/id (admin/config/services/ln_bazaarvoice)
6) Save admin configuration with all required field.
7) Copy BazaarVoice Container ID and use in node--dsu-product.html twig in this way
   -  ````<div id="BVRRContainer"></div>````.
8) Copy the Product start rating snippet and paste in twig to show product ratings and star.
9) Create node and enter Bazaarvoice product id in product node.
10) Save node form and Clear the cache.

Example:

- Showing Review container:

 ````
   {% if content.field_bv_product_id %}
    <div id="BVRRContainer"></div>
   {% endif %}
 ````

- Show product ratings and stars.

````
 {% if content.field_bv_product_id %}
   <div itemscope itemtype="http://schema.org/AggregateRating">
     <div id="BVRRSummaryContainer"></div>
   </div>
   <div data-bv-show="inline_rating"
     data-bv-product-id="{{ content.field_bv_product_id[0]['#context']['value'] }}"
     data-bv-redirect-url="http://mycompany.com/product1">
   </div>
 {% endif %} 
 ````

Overriding:
==========

Need for extending this module just use default template and markup based on UI of product node.
