'use strict';
(function($, Drupal) {
  Drupal.behaviors.imageHotspotView = {
    attach: function(context, settings) {
      $('.image-hotspot-areas-wrapper:not(.init-view)', context).each(function() {
        var $wrapper = $(this);
        var $imageWrapper = $wrapper.find('.image-wrapper');
        var $labelsWrapper = $wrapper.find('.labels');

        var field_name = this.dataset.fieldName;
        var image_style = this.dataset.imageStyle;
        var fid = this.dataset.fid;
        var entity_id = this.dataset.entityId;
        var lang = this.dataset.lang;
        var hotspots = settings.hotspot_areas[entity_id][lang][field_name][fid][image_style].hotspots;

        $.each(hotspots, function(hid, hotspot) {
          var data = hotspot;
          data.hid = hid;

          Drupal.behaviors.imageHotspotView.createHotspotLabel($labelsWrapper, data);
          Drupal.behaviors.imageHotspotView.createHotspotBox($imageWrapper, data);
        });
        $wrapper.addClass('.init-view');
      });
    },

    createHotspotLabel: function ($labelsWrapper, data) {
      var html = '<span>' + data.title + '</span>';
      html = '<div class="label-title">' + html + '</div>';
      var title = (data.description !== '') ? data.description : data.title;
      var $label = $('<div />', {
        class: 'label',
        title: title,
        'data-hid': data.hid,
        tabindex:0,
        html: html,
        on: {
          mouseenter: function (event) {
            var hid = this.dataset.hid;
            $(this).parent().parent().parent().find('.hotspot-box[data-hid="' + hid + '"]').css('border','1px red solid');
          },
          mouseleave: function (event) {
            var hid = this.dataset.hid;
            $(this).parent().parent().parent().find('.hotspot-box[data-hid="' + hid + '"]').css('border','none');
          },
          focus: function(event) {
            var hid = this.dataset.hid;
            $(this).parent().parent().parent().find('.hotspot-box[data-hid="' + hid + '"]').css('border','1px red solid');
          },
          blur: function(event) {
            var hid = this.dataset.hid;
            $(this).parent().parent().parent().find('.hotspot-box[data-hid="' + hid + '"]').css('border','none');
          }
        }
      });
      $label.appendTo($labelsWrapper);
      return $label;
    },

    createHotspotBox: function ($imageWrapper, data) {
      var $image = $imageWrapper.children('img');
      var scale = {
        width: 100 / $image.attr('width'),
        height: 100 / $image.attr('height')
      };
      var dimensions = {
        width: scale.width * (data.x2 - data.x),
        height: scale.height * (data.y2 - data.y)
      };
      var position = {
        top: scale.height * data.y,
        left: scale.width * data.x
      };

      // Build hotspot box.
      var tipTipText = '<div class="tooltip-title"><h2>' + data.title
          + '</h2></div><div class="tooltip-description">' + data.description + '</div>'
          + '<div class="tooltip-link"><a href="' + data.link + '" target="_blank">' + data.link_title + '</a></div>';
      var $box = $('<div />', {
        class: 'hotspot-box',
        'data-hid': data.hid
      }).css({
        top: position.top + '%',
        left: position.left + '%',
        width: dimensions.width + '%',
        height: dimensions.height + '%',
        'border-radius': (data.shape == 'circle') ? '50%' : '0%'
      }).html($('<a />', {'href': 'javascript:void(0)', tabindex:0}).css({width: "100%", height: "100%", display:"block"}).text(" "))
        .tipTip({
          content: '<div class="image-hotspots-tooltip">' + tipTipText + '</div>',
          maxWidth: '600px',
          activation: data.mouse_behaviour,
          keepAlive: true,
        });

      $box/*.parent()*/.appendTo($imageWrapper);

      return $box;
    }
  };
})(jQuery, Drupal);
