/**
 * @file
 *   Javascript for the adding event tracking from advanced datalayer.
 */

(function ($, Drupal) {
  // Check Rating & Reviews is exist on any content type.
  if($(".rating-review").length > 0) {
    // Call on submit drupal ratings & reviews form.
    $(document).on('click', '.js-form-wrapper .js-form-submit', function () {
      // Contain the value of the rating submitted by the user.
      var user_rating = $("#comment-form .fivestar-widget-static").find(".star .on").length;
      // Get content type of the node.
      var content_type = $(".rating-review").data("contentname");
      // Get title of the node.
      var content_name = $(".rating-review").data("eventlabel");
      dataLayer.push({
        event: "customEvent",
        eventCategory: "Ratings & Reviews",
        eventAction: "Rating or Review Published",
        eventLabel: content_name,
        contentName: content_type,
        reviewRating: user_rating,
        reviewSubmitted: 1
      });
    });
  }

  $(document).ready(function(){
    var selectBox = '<select data-drupal-selector="edit-field-dsu-ratings-0-rating" class="form-select form-control" id="edit-field-dsu-ratings-0-rating--2" name="field_dsu_ratings[0][rating]" style=" display: none;">';
    selectBox+='<option value="-">' + Drupal.t('Select rating') + '</option>';
    selectBox+='<option value="20">' + Drupal.t('Give it @star/@count', {'@star': '1', '@count': '5'}) + '</option>';
    selectBox+='<option value="40">' + Drupal.t('Give it @star/@count', {'@star': '2', '@count': '5'}) + '</option>';
    selectBox+='<option value="60">' + Drupal.t('Give it @star/@count', {'@star': '3', '@count': '5'}) + '</option>';
    selectBox+='<option value="80">' + Drupal.t('Give it @star/@count', {'@star': '4', '@count': '5'}) + '</option>';
    selectBox+='<option value="100">' + Drupal.t('Give it @star/@count', {'@star': '5', '@count': '5'}) + '</option></select>';
    $('#comment-form .fivestar-form-item .fivestar-').append($(selectBox));

    $('#comment-form .fivestar-form-item .star').hover(function(){
      $(this).addClass("hover").prevAll().addClass("hover");
      }, function(){
      $(this).removeClass("hover").prevAll().removeClass("hover");
    });

    $('#comment-form .fivestar-form-item .star').click(function(){
      $("#comment-form .fivestar-form-item .star span").removeClass("on").addClass("off");
      $(this).children("span").removeClass("off").addClass('on');
      $(this).prevAll().children("span").removeClass("off").addClass("on");
      $('#edit-field-dsu-ratings-0-rating--2').val(($(this).prevAll().length+1)*20);
    });

    var recommend = $('fieldset[data-drupal-selector="edit-field-dsu-recommend"]');
    recommend.find('label').on('click', function(event) {
      event.preventDefault();
      var input = $(this).prev();

      if (input.prop('checked')) {
        input.attr('checked', false);
        input.prop('checked', false);
      }
      else {
        recommend.find('input').attr('checked', false);
        recommend.find('input').prop('checked', false);
        input.attr('checked', true);
        input.prop('checked', true);
      }
    })
  });

})(jQuery, Drupal);
