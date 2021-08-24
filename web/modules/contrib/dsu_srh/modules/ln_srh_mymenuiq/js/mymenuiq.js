(function (jQuery, Drupal, drupalSettings) {
    Drupal.behaviors.mymenuiq = {
        attach: function (context) {
            window.nutritional_text_details = {
                "0-44":{
                    "nutritional_balance_title" : "Room for Balance edited",
                    "nutritional_balance_desc" : "Your meal is not well balanced edited",
                    "cssClasses" : "score-bad",
                },
                "45-69":{
                    "nutritional_balance_title" : "Good Balance",
                    "nutritional_balance_desc" : "Your meal is having good balance",
                    "cssClasses" : "score-medium",
                },
                "70-100":{
                    "nutritional_balance_title" : "Great Balance",
                    "nutritional_balance_desc" : "Your meal is  having great nutritional value",
                    "cssClasses" : "score-good",
                },
            };
            jQuery(document, context).once('mymenuiq').each(function () {

                jQuery("#accordion_button").on("click", function () {
                    //jQuery(".secondary_part").toggleClass('show-me');
                    if (jQuery(".secondary_part").hasClass("show-me")) {
                        closeSecondaryPart();
                    } else {
                        openSecondaryPart();
                    }
                    jQuery("#close-accordion").toggleClass('show-me');
                });

                jQuery("#close-accordion").on("click", function () {
                    closeSecondaryPart();
                    jQuery("#close-accordion").removeClass('show-me');
                });

                jQuery(".add-dish-wrapper .additional-dish .meal").on("click", function (event) {
                    if (jQuery(this).hasClass("selected") || jQuery(this).closest(".additional-dish").hasClass("side-recipe-added")) {
                        return;
                    }
                    jQuery(".add-dish-wrapper .additional-dish .meal").removeClass("selected");
                    jQuery(".add-dish-wrapper .additional-dish").addClass("selection-made");
                    jQuery(this).addClass("selected");
                    var dishType = jQuery(this).data('dish-type');
//                    console.log(dishType);
                    jQuery(this).addClass("loading");
                    jQuery("#side_dishes").addClass("hide");
                    loadDishes(dishType);
                });

                var initialized = false;
                changeCircleDimensions();
                jQuery('.mg-stagemymenu__container').on('click', e => {
                    var recipe_name = jQuery('.js-mg-stage-menu').data("recipename");
                    dataLayer.push({
                        event: "MyMenuIQEvent",
                        eventCategory: "MyMenuIQ",
                        eventAction: "MyMenuIQ Expand",
                        eventLabel: recipe_name
                    });

                    changeCircleDimensions();
                    jQuery(window).scrollTop(0);
                    jQuery(".stagemymenu_overlay-wrapper").addClass("active");
                    jQuery("body").addClass("no-scroll");
                    if (initialized) {
                        jQuery(".stagemymenu_overlay-wrapper").find(".collapse").collapse({
                            toggle: false
                        });
                        initialized = true;
                    } else {
                        jQuery(".stagemymenu_overlay-wrapper").find(".collapse").collapse('hide');
                        if (!jQuery(".nutritional_tips").length) {
                            jQuery(".stagemymenu_overlay-wrapper").find(".collapse").eq(0).collapse('show');
                        }
                    }

                    if (jQuery(".additional-dish .meal").length >= 3) {
                        jQuery('.additional-dish').slick({
                            slidesToShow: 3,
                            dots: false,
                            centerMode: false,
                            infinite: false,
                            mobileFirst: true,
                            responsive: [
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 3,
                                        infinite: false,
                                        arrows: true
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 3,
                                        infinite: false,
                                        arrows: false
                                    }
                                },
                                {
                                    breakpoint: 576,
                                    settings: {
                                        slidesToShow: 2.85,
                                        infinite: false,
                                        arrows: false
                                    }
                                },
                            ]
                        });
                    }

                });

                jQuery(".stagemymenu_overlay_close").on("click", function () {
                    jQuery(".stagemymenu_overlay-wrapper").removeClass("active");
                    jQuery(".combined_recipes .combined_recipes_content").removeClass("active");
                    jQuery("body").removeClass("no-scroll");
                    //resetSelection();
                });

                jQuery(".stagemymenu_overlay-wrapper").on("click", function (event) {
                    if (jQuery(event.target).hasClass("stagemymenu-bg-mask")) {
                        jQuery(".stagemymenu_overlay-wrapper").removeClass("active");
                        jQuery(".combined_recipes .combined_recipes_content").removeClass("active");
                        jQuery("body").removeClass("no-scroll");
                        //resetSelection();
                    }
                });

                jQuery(".see_combined_receipes_CTA").on("click", function () {
                    jQuery(".combined_recipes .combined_recipes_content").addClass("active");
                    var combine_recipe_title = jQuery('.combined_recipes .combined_recipes_content .combined_recipe_titles_wrapper ').find('h2').map(function(){ 
                        return jQuery(this).text(); 
                    }).get().join('|');
                    dataLayer.push({
                        event: "MyMenuIQEvent",
                        eventCategory: "MyMenuIQ",
                        eventAction: "MyMenuIQ Combined Recipes Load",
                        eventLabel: combine_recipe_title
                    });
                });

                jQuery(".combined_link_back").on("click", function () {
                    jQuery(".combined_recipes .combined_recipes_content").removeClass("active");
                });

                jQuery(".close-combined-recipe").on("click", function () {
                    jQuery(".stagemymenu_overlay-wrapper").removeClass("active");
                    //jQuery(".combined_recipes .combined_recipes_content").removeClass("active");
                    jQuery("body").removeClass("no-scroll");
                });


                jQuery(".accordion-function").on("click", function () {
                    var expend, accordion_states;
                    expend = jQuery(this).attr('aria-expanded');
                    accordion_states = (expend == "true" ? "Close" : "Open");
                    var accordian_flag = '';
                    if (accordion_states == 'Open') {
                        accordian_flag = 'Expand';
                    } else {
                        accordian_flag = 'Collapse';
                    }
                    dataLayer.push({
                        event: "MyMenuIQEvent",
                        eventCategory: "MyMenuIQ",
                        eventAction: "MyMenuIQ Accordion "+ accordian_flag,
                        eventLabel: jQuery(this).data("topic") + ' | ' + accordion_states
                    });
                });
            });

            jQuery(window).on('resize', () => {
                changeCircleDimensions();
                if (jQuery(".secondary_part").hasClass("show-me")) {
                    if (jQuery(window).width() > 992) {
                        jQuery(".secondary_part").css({
                            "top": "",
                            "height": ""
                        });
                    } else {
                        let accordion_toggle_btn_position = jQuery("#accordion_button").offset();
                        let top_of_opened_sceondary_part = accordion_toggle_btn_position.top - 12;

                        jQuery(".secondary_part").css("top", top_of_opened_sceondary_part);
                    }
                }
            });

            function openSecondaryPart() {
                jQuery("#accordion_button").addClass("opened");
                if (jQuery(window).width() < 992) {
                    let vh = jQuery(window).height();
                    let vw = jQuery(window).width();
                    let accordion_toggle_btn_position = jQuery("#accordion_button").offset();

                    let top_of_opened_sceondary_part = accordion_toggle_btn_position.top - 15;

                    let secondary_part_height = vh - top_of_opened_sceondary_part;
                    jQuery(".secondary_part").addClass("show-me").show().css({
                        top: vh + 10,
                        height: secondary_part_height
                    });
                    jQuery(".secondary_part").animate({
                        top: top_of_opened_sceondary_part
                    }, 500, 'swing', function(){

                    });
                } else {
                    jQuery(".secondary_part").toggle({effect: "slide", direction: "right"}, 100).removeClass('show-me');
                }
            }

            function closeSecondaryPart() {
                jQuery("#accordion_button").removeClass("opened");
                if (jQuery(window).width() < 992) {
                    let vh = jQuery(window).height();
                    let vw = jQuery(window).width();
                    let accordion_toggle_btn_position = jQuery("#accordion_button").offset();

                    let top_of_opened_sceondary_part = accordion_toggle_btn_position.top - 12;

                    jQuery(".secondary_part").animate({
                        top : vh + 10
                    }, 500, 'swing', function() {
                        jQuery(".secondary_part").removeClass("show-me").hide().css('top',0);
                    });
                } else {
                    jQuery(".secondary_part").toggle({effect: "slide", direction: "right"}, 100).removeClass('show-me');
                }
            }

            function changeCircleDimensions(isReset) {
                if (typeof isReset == 'undefined') {
                    isReset = false;
                }

                try {
                    jQuery('body').find('.circle .progress-ring').each((index, ele) => {
                        let radius,
                            base_circle,
                            circle,
                            circumference,
                            percent,
                            offset,
                            circleWidth = jQuery(ele).width();

                        if (isReset) {
                            percent = jQuery(ele).attr('data-percent') != undefined ? jQuery(ele).attr('data-percent') : 0;
                        } else {
                            percent = jQuery(ele).attr('data-updated-percent') != undefined ? jQuery(ele).attr('data-updated-percent') : 0;
                        }

                        jQuery(ele).find("circle").each(function () {
                            jQuery(this).attr('r', (circleWidth / 2) - 4);
                        });

                        let after_score_text= jQuery(ele).attr('data-after-score-text');
                        jQuery("[data-show-score]").html(`${percent} <span>${after_score_text}</span>`);
                        //Math.PI;
                        circle = jQuery(ele).find('circle.progress-ring__circle')[0];
                        base_circle = jQuery(ele).find('circle.progress-ring__base_circle')[0];

                        radius = jQuery(circle).attr('r');

                        circumference = radius * 2 * (22 / 7);
                        // set circumference for strokeDasharray
                        circle.style.strokeDasharray = `${circumference} ${circumference}`;
                        offset = circumference - percent / 100 * circumference;

                        circle.style.strokeDashoffset = `${circumference}`;

                        circle.style.strokeDashoffset = offset;

                        if (percent > 69) {
                            circle.style.stroke = "#97D815";
                        } else if (percent > 44) {
                            circle.style.stroke = "#F1D100";
                        } else {
                            circle.style.stroke = "#FF8C28";
                        }
                    });
                } catch (e) {
                    console.log('error in circle measurement-mymenu', e);
                }
            }

            function initTabs() {
                jQuery(".tabs").each(function () {
                    var $tab = jQuery(this);
                    var $links = $tab.find(".tabs-links > a");
                    var $content = $tab.find(".tabs-content > .tab-content");
                    $content.hide();
                    $content.first().show().addClass("active");
                    $links.first().addClass("active");
                    $links.click(function (e) {
                        e.preventDefault();
                        var $el = jQuery(this);
                        if (!$el.hasClass("active")) {
                            $content.hide().removeClass("active");
                            $links.removeClass("active");
                            jQuery($el.attr("href")).show().addClass("active");
                            $el.addClass("active");
                        }
                    });
                });
            }

            var mealScore = {
                $scoreEl: null,
                $showScore: null,
                $newScoreEl: null,
                $addScoreEl: null,
                $removeScoreEl: null,
                initialScore: null,
                newScore: null,
                classBad: "score-bad",
                classMedium: "score-medium",
                classGood: "score-good",
                init: function () {
                    var othis = this;
                    othis.$scoreEl = jQuery("[data-score]");
                    othis.$showScore = jQuery("[data-show-score]");
                    othis.$newScoreEl = jQuery("[data-new-score]");
                    othis.$addScoreEl = jQuery("[data-add-score]");
                    othis.$removeScoreEl = jQuery("[data-remove-score]");
                    othis.initialScore = othis.$scoreEl.data("score");
                    othis.generateAddScore();
                    othis.addEventListeners();
                    //othis.hideScores();
                },
                hideScores: function () {
                    var othis = this;
                    othis.$addScoreEl.not(".msg-to-add").hide();
                    othis.$removeScoreEl.not(".msg-to-remove").hide();
                },
                addEventListeners: function () {
                    var othis = this;
                    othis.$addScoreEl.click(function () {
                        othis.addScore(jQuery(this));
                    });
                    othis.$removeScoreEl.click(function (event) {
                        event.stopPropagation();
                        othis.removeScore(jQuery(this));
                    });
                },
                generateAddScore: function () {
                    var othis = this;
                    othis.$newScoreEl.each(function () {
                        $el = jQuery(this);
                        $add = $el.find("[data-add-score]");
                        var addScore = ($el.data("new-score") - othis.initialScore).toString();
                        if (addScore < 0) {
                            $add.addClass("negative-score");
                        } else {
                            $add.removeClass("negative-score");
                        }
                        $add.attr("data-add-score", addScore);
                        $add.first().append(jQuery("<strong>" + (addScore >= 0 ? "+" : "-") + "</strong> " + "<span>" + Math.abs(addScore) + "</span>"));
                    });
                },
                addScore: function ($button) {
                    var othis = this;
                    let $button_score = $button.data("add-score");
                    othis.newScore = $button_score + othis.initialScore;
                    if (othis.newScore > 100) othis.newScore = 100; else if (othis.newScore < 0) othis.newScore = 0;
                    othis.$scoreEl.attr("data-score", othis.newScore);

                    othis.$newScoreEl.removeClass("removed");
                    othis.$newScoreEl.filter(".added").addClass("removed");
                    othis.$newScoreEl.removeClass("added");
                    $button.parents("[data-new-score]").addClass("added");

                    let recipe_id = $button.parents("[data-new-score]").data("id");
                    let dish_type = $button.closest(".item").attr("data-parent-dish-type");
                    let side_dish_name = $button.parents("[data-new-score]").find(".name a").html();
                    let side_dish_image = $button.parents("[data-new-score]").find(".image").find("img").attr("data-src");

                    let item = jQuery(`.meal[data-dish-type='${dish_type}']`).find(`.item[data-id='${recipe_id}']`);
                    let meal_title = jQuery(`.meal[data-dish-type='${dish_type}']`).find(".meal-wrapper").find(".meal-title").html();

                    setTimeout(() => {
                        othis.$scoreEl.addClass("score-added");
                        othis.setClass();

                        if ($button.closest(".item").data("is-generic") != "1") {
                            jQuery(".see_combined_receipes").addClass("active");
                        } else {
                            jQuery(".enjoy_your_meal").addClass("active");
                        }

                        jQuery(".side-dish-selected-img").attr("src", side_dish_image);
                        jQuery(".side-dish-added-title h2").html(side_dish_name);

                        jQuery(`.meal[data-dish-type='${dish_type}']`).find(".added-dish-wrapper").removeClass("hide").find(`.item[data-id='${recipe_id}']`).addClass("added").parent().removeClass("hide");

                        jQuery(".side-dish-added-title").attr("href", item.find(".name a").attr("data-href"));

                        item.parent().prepend(`<a class="meal-title dummy-meal-title" id="">${meal_title}</a>`);
                        jQuery(`.meal[data-dish-type='${dish_type}']`).find(".meal-wrapper").addClass("hide");
                        jQuery(`.additional-dish`).addClass("side-recipe-added");
                        jQuery("#side_dishes").addClass("hide");

                        dataLayer.push({
                            'event' : 'MyMenuIQEvent',
                            'eventCategory' : 'MyMenuIQ',
                            'eventAction' : 'MyMenuIQ Add Complementary Dish',
                            'eventLabel' : `${$button.data('side-dish-name')} Added | ${$button.data('category-name')}`
                        });
                    }, 1000);
                },
                removeScore: function ($button) {
                    var othis = this;
                    othis.newScore = othis.initialScore;
                    if (othis.newScore > 100) othis.newScore = 100; else if (othis.newScore < 0) othis.newScore = 0;
                    othis.$scoreEl.attr("data-score", othis.newScore);

                    othis.$newScoreEl.removeClass("added");
                    $button.parents("[data-new-score]").addClass("removed");
                    othis.$scoreEl.removeClass("score-added");
                    othis.setClass();
                    jQuery(".see_combined_receipes").removeClass("active");
                    jQuery(".enjoy_your_meal").removeClass("active");

                    jQuery("#side_dishes").removeClass("hide");
                    jQuery(`.meal`).find("added-dish-wrapper").addClass("hide");
                    jQuery(`.meal`).find(".meal-wrapper").removeClass("hide");
                    jQuery(`.additional-dish`).removeClass("side-recipe-added");

                    let dish_type = $button.closest(".item").attr("data-parent-dish-type");
                    let side_dish_name = $button.parents("[data-new-score]").find(".name a").html();
                    let meal_title = jQuery(`.meal[data-dish-type='${dish_type}']`).find(".meal-wrapper").find(".meal-title").html();

                    dataLayer.push({
                        'event' : 'MyMenuIQEvent',
                        'eventCategory' : 'MyMenuIQ',
                        'eventAction' : 'MyMenuIQ Remove Complementary Dish',
                        'eventLabel' : `${$button.data('side-dish-name')} Removed | ${$button.data('category-name')}`
                    });

                    resetSelection();
                },
                setClass: function () {
                    var othis = this;
                    var nutritional_balance = "", nutritional_balance_desc = "";

                    othis.$scoreEl.removeClass(othis.classBad + " " + othis.classMedium + " " + othis.classGood);
                    if (othis.newScore > 69) {
                        jQuery(".progress-ring")
                        othis.$scoreEl.addClass(othis.classGood);
                    } else if (othis.newScore > 44) {
                        othis.$scoreEl.addClass(othis.classMedium);
                    } else {
                        othis.$scoreEl.addClass(othis.classBad);
                    }

                    for (var key in nutritional_text_details) {
                        var min_val = parseInt(key.split("-")[0]);
                        var max_val = parseInt(key.split("-")[1]);
                        var nutritional_details = nutritional_text_details[key];

                        if (othis.newScore >= min_val && othis.newScore <= max_val) {
                            jQuery('body').find('.nutritional_balance').text(nutritional_details.nutritional_balance_title);
                            jQuery('body').find('.nutritional_balance_text').text(nutritional_details.nutritional_balance_desc);
                            othis.$scoreEl.addClass(nutritional_details.cssClasses);
                        }
                    }
                    if (othis.newScore)

                    jQuery('body').find('.circle .progress-ring').each(function(){
                        jQuery(this).attr("data-updated-percent", othis.newScore);
                    });
                    changeCircleDimensions();
                }
            };

            function resetSelection() {
                jQuery(".add-dish-wrapper .additional-dish").find(".meal-wrapper").removeClass("hide");
                jQuery(".add-dish-wrapper .additional-dish").removeClass("selection-made").find(".added-dish-wrapper").html("");
                jQuery(".see_combined_receipes").removeClass("active");
                jQuery(".enjoy_your_meal").removeClass("active");

                jQuery(".meal").removeClass("selected");
                jQuery(`.additional-dish`).removeClass("side-recipe-added");
                jQuery("#side_dishes").addClass("hide");

                changeCircleDimensions(true);
            }

            function loadDishes(dishType) {
                var recipeId = drupalSettings.recipeId;
                var nutritionalScore = drupalSettings.nutritionalScore;

                var url = drupalSettings.baseUrl+"/get/side_dish/" + recipeId + "/" + nutritionalScore + "/" + dishType;

                jQuery("#side_dishes").load(url, function (response, status, xhr) {
                    jQuery(`.meal[data-dish-type=${dishType}]`).removeClass("loading");
                    jQuery("#side_dishes").removeClass("hide");
                    jQuery(".stagemymenu_overlay #content").animate({scrollTop: jQuery(".stagemymenu_overlay").height()}, 700);
                    if (status == "success") {
                        jQuery(`.meal[data-dish-type=${dishType}]`).find(".added-dish-wrapper").html(jQuery('.meals-carousel').html());
                        jQuery(`.meal[data-dish-type=${dishType}]`).find(".added-dish-wrapper").children().addClass("hide");

//                        console.log(response);
                        mealScore.init();
                        initTabs();
                        jQuery('.meals-carousel').slick({
                            slidesToShow: 3,
                            dots: false,
                            centerMode: false,
                            mobileFirst: true,
                            infinite : false,
                            arrows : false,
                            responsive: [
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 3,
                                        infinite: false,
                                        arrows: true
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 3,
                                        infinite: false,
                                        arrows: false
                                    }
                                },
                                {
                                    breakpoint: 576,
                                    settings: {
                                        slidesToShow: 2.85,
                                        infinite: false,
                                        arrows: false
                                    }
                                },
                            ]
                        });

                        jQuery("html, body").animate({scrollTop: jQuery(".stagemymenu_overlay").scrollTop(1000)}, 1000);
                    }
                });
            }
        }
    };
})(jQuery, Drupal, drupalSettings);
