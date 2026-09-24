/**
 * Bizcon front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Slick and Magnific Popup that build the
 * same markup, so the theme's stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  UI.owl('.player_info_item', {
    items: 1,
    loop: true,
    dots: false,
    autoplay: true,
    margin: 40,
    autoplayHoverPause: true,
    autoplayTimeout: 5000,
    nav: true,
    navText: [
      '<img src="img/icon/left.svg" alt="">',
      '<img src="img/icon/right.svg" alt="">'
    ],
    responsive: {
      0: {
        margin: 15
      },
      600: {
        margin: 10
      },
      1000: {
        margin: 10
      }
    }
  });

  UI.ready(function () {
    if (document.getElementById('default-select')) {
      UI.enhanceSelects('select');
    }
  });

  UI.magnific('.popup-youtube, .popup-vimeo', {
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // menu fixed js code
  UI.ready(function () {
    var menus = UI.toElements('.main_menu');
    if (!menus.length) return;
    window.addEventListener('scroll', function () {
      var windowTop = window.pageYOffset + 1;
      menus.forEach(function (menu) {
        if (windowTop > 50) {
          menu.classList.add('menu_fixed', 'animated', 'fadeInDown');
        } else {
          menu.classList.remove('menu_fixed', 'animated', 'fadeInDown');
        }
      });
    }, { passive: true });
  });

  // Testimonial slider with its thumbnail strip.
  UI.ready(function () {
    function markThumbnail(index) {
      UI.toElements('.slider-nav-thumbnails .slick-slide').forEach(function (slide, i) {
        slide.classList.toggle('slick-active', i === index);
      });
    }
    function show(el) {
      el.style.display = '';
      if (window.getComputedStyle(el).display === 'none') el.style.display = 'block';
    }

    UI.toElements('.slider').forEach(function (el) {
      // On before slide change match active thumbnail to current slide
      el.addEventListener('beforeChange', function (e) {
        markThumbnail(e.detail.nextSlide);
      });
      //UPDATED
      el.addEventListener('afterChange', function (e) {
        UI.toElements('.content').forEach(function (content) {
          content.style.display = 'none';
        });
        UI.toElements('.content[data-id="' + (e.detail.currentSlide + 1) + '"]').forEach(show);
      });
    });

    UI.slick('.slider', {
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      speed: 300,
      infinite: true,
      asNavFor: '.slider-nav-thumbnails',
      autoplay: true,
      pauseOnFocus: true,
      dots: true
    });

    UI.slick('.slider-nav-thumbnails', {
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider',
      focusOnSelect: true,
      infinite: true,
      prevArrow: false,
      nextArrow: false,
      centerMode: true,
      responsive: [
        {
          breakpoint: 480,
          settings: {
            centerMode: false
          }
        }
      ]
    });

    // Only the first thumbnail starts active.
    markThumbnail(0);
  });
}());
