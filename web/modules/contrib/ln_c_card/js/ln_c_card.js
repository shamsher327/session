(function ($) {
  'use strict';

  Drupal.behaviors.card = {
    attach: function (context, settings) {
      var totalOverlay = $('.paragraph--type--ln-c-card .component-paragraph-field-item');

      for (var i = 0; i < totalOverlay.length; i++) {
        var $this = $(totalOverlay).eq(i);
        var parentDiv = $this.closest('.component-paragraph-field');

        var selectedBgColor = $this.data('color');
        var fontColor = $this.data('font-color');
        if( selectedBgColor == '' ){
          selectedBgColor = $(parentDiv).data('color');
          fontColor = $(parentDiv).data('font-color');
          $this.css("color", fontColor);
        }

        $this.find('.hovercard-overlay').css("background", selectedBgColor);
        $this.find('.hoverMicro > span').css("background", selectedBgColor);
        $this.find('.card-bottom-wrapper .card-bottom-text').css({"background": selectedBgColor, "color": fontColor});
        $this.find('.card-rollover-wrapper .card-rollover-text').css({"background": selectedBgColor, "color": fontColor});
        $this.find('.card-full-color-wrapper').css({"background": selectedBgColor, "color": fontColor});

        var cardTitleOnImage = $this.find('.card-title-on-image-wrapper');
        if(cardTitleOnImage.length > 0) {
            cardTitleOnImage.find('.card-text-overlay').css({"background": selectedBgColor, "color": fontColor});
        }

        var hoverCardAnchor = $('.hover-card-box').find('.card-rollover-wrapper > a')[i];
        if(hoverCardAnchor != undefined) {
          $(hoverCardAnchor).css("color", selectedBgColor);
        }
      }
    }
  };

}(jQuery));
