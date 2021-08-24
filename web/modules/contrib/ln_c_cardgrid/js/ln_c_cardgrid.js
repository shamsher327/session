(function ($) {
    'use strict';

    Drupal.behaviors.cardgrid = {
        attach: function (context, settings) {

            $(function(){
                resizeRollOverCardTitleHeight();
                $(".toggle-card-rollover-text-body").off("click");
                $(".toggle-card-rollover-text-body").on("click", function(e) {
                    e.preventDefault();
                    $(this).closest("[data-card='ln_c_gridcard_rollover']").toggleClass('active');
                    if ($(this).closest("[data-card='ln_c_gridcard_rollover']").hasClass("active")) {
                        $(this).attr('aria-expanded', true);
                        $(this).parent().find('.card-rollover-text-body').attr('aria-hidden', false);
                    } else {
                        $(this).attr('aria-expanded', false);
                        $(this).parent().find('.card-rollover-text-body').attr('aria-hidden', true);
                    }
                });
            });

            $(".paragraph--type--ln-c-grid-card-item").each(function(index) {
                let $this = $(this);
                let fontColor = $(this).find("[data-card-font-color]").data("card-font-color").trim();
                let bgColor = $(this).find("[data-card-font-color]").data("card-bg-color").trim();

                if (!fontColor) {
                    //FallBack to parent level font-color and background color
                    fontColor = $(this).closest("[data-font-color]").data("font-color").trim();
                }

                if (!bgColor) {
                    //FallBack to parent level font-color and background color
                    bgColor = $(this).closest("[data-bg-color]").data("bg-color").trim();
                }


                /** Generalizing styling of font, border and background **/
                $(this).find(".card-font-color-override").css("color", fontColor);
                $(this).find(".card-background-style-override").css("background-color", bgColor);
                $(this).find(".card-text-block-border-style-override").css("border-color", bgColor);

                if ($(this).attr('data-card') == 'ln_c_gridcard_rollover') {
                    let timestamp = new Date().getTime();
                    let title_attrs = {
                        id: 'rollover_title_'+timestamp,
                        'aria-controls': 'rollover_body_'+timestamp,
                        'href' : '#rollover_body_'+timestamp,
                        'aria-expanded' : false,
                    };

                    let body_attrs = {
                        id: 'rollover_body_'+timestamp,
                        'aria-labelled-by': 'rollover_title_'+timestamp,
                        'aria-hidden' : true
                    };
                    $(this).find(".toggle-card-rollover-text-body").attr(title_attrs);
                    $(this).find(".card-rollover-text-body").attr(body_attrs);
                }

                $(this).hover(handlerIn, handlerOut);

                function handlerIn() {
                    let fontColor = $(this).find("[data-card-font-color]").data("card-font-color").trim();
                    let bgColor = $(this).find("[data-card-font-color]").data("card-bg-color").trim();

                    if (!bgColor) {
                        //FallBack to parent level font-color and background color
                        bgColor = $(this).closest("[data-bg-color]").data("bg-color").trim();
                    }

                    bgColor = hexToRgb(bgColor);
                    let bgColorComponent = bgColor.substring(4, bgColor.length-1).replace(/ /g, "").split(",");

                    let hoverFontColor =  `rgb(${parseInt(bgColorComponent[0]) + 75},${parseInt(bgColorComponent[1]) + 120}, ${parseInt(bgColorComponent[2]) + 85}) `;
                    let hoverBorderColor =  `rgb(${parseInt(bgColorComponent[0]) + 90},${parseInt(bgColorComponent[1]) + 140}, ${parseInt(bgColorComponent[2]) + 115}) `;

                    /** Generalizing styling of font, border and background **/
                    $(this).find(".card-on-hover-font-color-override").css("color", hoverFontColor);
                    //$(this).find(".card-background-style-override").css("font", hoverFontColor);

                    $(this).find(".card-on-hover-lighter-background-style-override").css("background-color", hoverBorderColor);

                    $(this).find(".card-on-hover-border-override").css("border-color", hoverBorderColor);

                    $(this).find(".card-on-hover-image-border-override").find('img').css("border-color", hoverBorderColor);
                }

                function handlerOut() {
                    let fontColor = $(this).find("[data-card-font-color]").data("card-font-color").trim();
                    let bgColor = $(this).find("[data-card-font-color]").data("card-bg-color").trim();

                    if (!fontColor) {
                        //FallBack to parent level font-color and background color
                        fontColor = $(this).closest("[data-font-color]").data("font-color").trim();
                    }

                    $(this).find(".card-on-hover-font-color-override").css("color", "");
                    $(this).find(".card-font-color-override").css("color", fontColor);
                    //$(this).find("img").css("border-color", hoverBorderColor);
                }
            });

            function resizeRollOverCardTitleHeight() {
                if ($(".grid-card-rollover").length) {
                    $(".grid-card-rollover .card-rollover-text-title").height('auto');
                    $(".grid-card-rollover").each(function(){
                        let maxHeight = 0;

                        $(this).find(".card-rollover-text-title").each(function(){
                            if ($(this).height() > maxHeight) {
                                maxHeight = $(this).height();
                            }
                        });
                        $(this).find(".card-rollover-text-title").height(maxHeight);
                    });
                }
            }

            window.hexToRgb = function(hex) {
                // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
                var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
                hex = hex.replace(shorthandRegex, function(m, r, g, b) {
                    return r + r + g + g + b + b;
                });

                var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                /*return result ? {
                    r: parseInt(result[1], 16),
                    g: parseInt(result[2], 16),
                    b: parseInt(result[3], 16)
                } : null;*/
                return result ? `rgb(${parseInt(result[1], 16)}, ${parseInt(result[2], 16)}, ${parseInt(result[3], 16)})` : null;
            }
        }
    };

}(jQuery));
