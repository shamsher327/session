(function ($) {
  'use strict';

  Drupal.behaviors.accordionComponent = {
    attach: function(context, settings) {

        $('.accordion--text').each(function(index){
            let accordion_title = $(this);
            let accordion_body = accordion_title.parent().find('.accordion--components');

            accordion_title.attr({
                'id' : 'accordion_'+index,
                'aria-controls' : 'accordion_body_'+index,
                'href': '#accordion_body_'+index
            });

            accordion_body.attr({
                'id' : 'accordion_body_'+index,
                'aria-labelled-by' : 'accordion_'+index
            });
        });

        $('.accordion--text', context).once().click(function(e) {
            e.preventDefault();

            var $this = $(this);
            // As we can have more than one accordion we search the parent accordion.
            var $parent_accordion = $this.closest(".paragraph--type--accordion");
            var $parent_accordion_item = $this.closest(".paragraph--type--accordion-item");

            $parent_accordion.find('.paragraph--type--accordion-item:not(.status--enable) .accordion--text').attr('aria-expanded', false).attr('aria-selected', false);

            // If click on open element should be closed.
            if ($this.parent().hasClass('status--enable')) {
                $this.parent().removeClass('status--enable');
                $parent_accordion_item.find("[aria-hidden]").slideUp();

                // Accessbility aria attribute
                var isAriaExp = $this.attr('aria-expanded');
                var newAriaExp = (isAriaExp == "false") ? "true" : "false";
                $this.attr('aria-expanded', newAriaExp);

                 // Accessbility aria-selected attribute
                 /*var isAriaSeclected = $this.attr('aria-selected');
                 var newisAriaSeclected = (isAriaSeclected == "false") ? "true" : "false";
                 $this.attr('aria-selected', newisAriaSeclected);*/

                // Aria Hidden
                var isAriaHidden = $this.siblings('.accordion--components').attr('aria-hidden');
                var newAriaHidden = (isAriaHidden == "false") ? "true" : "false";
                $parent_accordion.find('.accordion--components').attr('aria-hidden', "true");
                $this.siblings('.accordion--components').attr('aria-hidden', newAriaHidden);

            }
            // Clicking on closed element should open it and close others if
            // are open.
            else {
                // Remove the show class to all accordion components but
                // restore it to the depending element of the clicked title.
                $parent_accordion.find('.paragraph--type--accordion-item').removeClass('status--enable');
                $this.parent().addClass('status--enable');

                // Accessbility aria attribute
                $parent_accordion.find('.paragraph--type--accordion-item:not(.status--enable) .accordion--text').attr('aria-expanded', false).attr('aria-selected', false);
                $parent_accordion.find('.paragraph--type--accordion-item:not(.status--enable) .accordion--components').attr('aria-hidden', true);
                var isAriaExp = $this.attr('aria-expanded');
                var newAriaExp = (isAriaExp == "false") ? "true" : "false";
                $this.attr('aria-expanded', newAriaExp);
                $this.siblings('.accordion--components').attr('aria-hidden', ($this.siblings('.accordion--components').attr('aria-hidden') == false ? true : false));

                // Accessbility aria-selected attribute
                var isAriaSeclected = $this.attr('aria-selected');
                var newisAriaSeclected = (isAriaSeclected == "false") ? "true" : "false";
                $this.attr('aria-selected', newisAriaSeclected);

                // Close all elements and open the depending element of the
                // clicked title.
                $parent_accordion.find('.paragraph--type--accordion-item:not(.status--enable) .accordion--components').slideUp();
                $parent_accordion_item.find("[aria-hidden]").slideToggle(400, function() {
                  scrollTop($this);
                });
            }
        });

        // All elements should be closed at the beginning.
        $('.accordion--components', context).hide();
    }
  };

  var scrollTop = function(target) {
    var menuHeight = $('header').height();
    var adminToolbar = $("#toolbar-bar");

    // Take into account the admin bars.
    if (adminToolbar.length > 0) {
      menuHeight = menuHeight + adminToolbar[0].scrollHeight;
    }

    $('html, body').animate(
      {
        // Take into account fixed menu height.
        scrollTop: target.offset().top - menuHeight
      },
      'slow',
      'swing'
    );
  }

}(jQuery));