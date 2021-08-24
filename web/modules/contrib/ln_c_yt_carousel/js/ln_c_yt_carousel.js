(function ($) {
  'use strict';

  Drupal.behaviors.ln_c_yt_carousel = {
    attach: function (context, settings) {
      if (drupalSettings.ln_c_yt_carousel.autoslide == 1) {
        var carousel_autoslide = true;
      }
      var slider = $('.slider-single').once().slick({
        lazyLoad: 'ondemand',
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        speed: 250,
        accessibility: true,
        dots: false,
        asNavFor: '.slider-nav',
        autoplay: carousel_autoslide,
        autplaySpeed: drupalSettings.ln_c_yt_carousel.duration,
      });
      $('.slider-nav').once().slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        asNavFor: '.slider-single',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1023,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              infinite: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              infinite: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: false
            }
          }
        ]
      });
      $('.youtube-slider .slider').once().on('click', function () {
        $('.expand').slideToggle('fast');
        $('.youtubedesc').toggleClass('open');
      });
    }
  };
}(jQuery));
