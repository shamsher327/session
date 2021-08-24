/**
 * @file
 *   Javascript for the adding header script of bazaarvoice and product iframe.
 */

(function ($) {
  "use strict";

  Drupal.behaviors.LnbazaarvoiceReviews = {
    attach: function (context, settings) {
      // Check if the variable exist.
      if (drupalSettings.bazaarvoiceReviews != undefined) {
        // Check if Bazaarvoice product code is append on header.
        if (!$('body').hasClass('ln-bazaarvoice')) {
          var bazaarvoiceReviews = document.createElement('script');
          // Product rating iframe for fetching component of bazaarvoice.
          bazaarvoiceReviews.setAttribute('type', 'text/javascript');
          bazaarvoiceReviews.innerHTML = "$BV.configure('global', {productId:'" + drupalSettings.bazaarvoiceReviews.productid + "'})";
          document.getElementsByTagName('head')[0].appendChild(bazaarvoiceReviews);

          // Get Review Container from bazaarvoice.
          var sbx = document.createElement('script');
          sbx.setAttribute('type', 'text/javascript');
          sbx.innerHTML = "$BV.ui('rr', 'show_reviews', {doShowContent: function () {}});";
          document.getElementsByTagName('head')[0].appendChild(sbx);
          // Add one class to make sure we have added Bazaarvoice JS code.
          $('body').addClass('ln-bazaarvoice');
        }
      }
    }
  };
})(jQuery);
