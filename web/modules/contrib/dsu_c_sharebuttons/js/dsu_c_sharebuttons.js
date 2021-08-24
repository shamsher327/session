/**
 * @file
 *   Javascript for the event tracking on social share.
 */

(function ($, Drupal) {
  $ ('.social-media-sharing.dsu').find ('a').click (function () {
    dataLayer &&
      dataLayer.push ({
        event: 'socialShare',
        eventCategory: 'Social Share',
        eventAction: $(this).attr ('title'),
        eventLabel: $(this).closest('li').data ('contenttype'),
        sharePageName:$(this).closest('li').data ('contentname'),
        contentShared: 1,
      });
  });
}) (jQuery, Drupal);
