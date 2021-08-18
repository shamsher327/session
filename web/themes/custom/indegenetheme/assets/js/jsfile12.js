/**
 * @file
 * CKEditor Read more functionality.
 */
 var Drupal = Drupal || { 'settings': {}, 'behaviors': {}, 'locale': {} };

(function ($) {
  'use strict';
  Drupal.behaviors.ckeditorReadmore = {
    attach: function (context, settings) {
      var $ckeditorReadmore = $('.ckeditor-readmore');

      if ($ckeditorReadmore.length > 0) {
        $ckeditorReadmore
          .once()
          .wrap('<div class="ckeditor-readmore-wrapper"></div>')
          .parent()
          .prepend('<button class="ckeditor-readmore-btn">Read more</button>');

        $('body').once('ckeditorReadmoreToggleEvent').on('click', '.ckeditor-readmore-btn', function (ev) {
          $(this).next().slideToggle();
        });
      }
    }
  };
})(jQuery);
;
(function($) {
  Drupal.behaviors.simple_cookie_compliance = {
    attach: function () {
      // Show cookie compliance message if the cookie is not set.
      if (document.cookie.indexOf('simple_cookie_compliance_dismissed=') == -1) {
        $('#cookie-compliance').show();
      }
    }
  }
}(jQuery));
;
