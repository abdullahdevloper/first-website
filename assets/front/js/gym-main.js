(function($) {
    'use strict';  
  
  
      /*---------------------------------  
          sticky header JS
      -----------------------------------*/
      $(window).on('scroll',function() {    
          var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $(".finlance_header").removeClass("sticky");
           }else{
            $(".finlance_header").addClass("sticky");
           }
      }); 
      /*---------------------------------  
          sticky header JS
      -----------------------------------*/
       /*---------------------------------  
          Search JS
      -----------------------------------*/
      $(".search_icon,.close_link").on('click', function(e) {
        e.preventDefault();
        $(".search_wrapper").toggleClass("active");
      });
      /*---------------------------------  
          Meanmenu JS
      -----------------------------------*/ 
      $('.primary_menu nav').meanmenu({
        meanMenuContainer: '.mobile_menu',
        meanScreenWidth: "991"
      });
      /*---------------------------------  
          Meanmenu JS
      -----------------------------------*/
      /*---------------------- 
         Slick Slider js
      ------------------------*/
      // mainSlider
      function mainSlider() {
      var BasicSlider = $('.hero_slide_v1');
      BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single_slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single_slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BasicSlider.slick({
        autoplay: true,
        autoplaySpeed: 10000,
        dots: false,
        fade: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false
      });
  
      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
          var $this = $(this);
          var $animationDelay = $this.data('delay');
          var $animationType = 'animated ' + $this.data('animation');
          $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
          });
          $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
          });
        });
      }
    }
    mainSlider();
  
  
  
  
      $('.service-slick,.team_slick,.blog_slick').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        autoplay: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                }
              },
              {
                breakpoint: 780,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
        ]
      });
  
      $('.pricing_slick').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                }
              },
              {
                breakpoint: 780,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
        ]
      });
  
  
      $('.testimonial_slide').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false
      });
      // start edits 
//  $(document).ready(function() {
//     $('#productsSlider').slick({
//         dots: true,
//         infinite: true,
//         speed: 500,
//         slidesToShow: 4,
//         slidesToScroll: 1,
//         rtl: true, // تأكد أن هذه القيمة true إذا كان الموقع بالعربية
//         prevArrow: $('.prev-arrow'),
//         nextArrow: $('.next-arrow'),
//         responsive: [
//             {
//                 breakpoint: 1200,
//                 settings: {
//                     slidesToShow: 3,
//                 }
//             },
//             {
//                 breakpoint: 992,
//                 settings: {
//                     slidesToShow: 2,
//                 }
//             },
//             {
//                 breakpoint: 768, // شاشات التابلت والجوال الكبيرة
//                 settings: {
//                     slidesToShow: 2,
//                     arrows: true
//                 }
//             },
//             {
//                 breakpoint: 576, // شاشات الجوال الصغيرة
//                 settings: {
//                     slidesToShow: 1, // عرض منتج واحد كما في الصورة المطلوبة
//                     centerMode: true, // يجعل المنتج في المنتصف تماماً
//                     centerPadding: '20px',
//                     arrows: true
//                 }
//             }
//         ]
//     });
// });


$('#modernProductSlider').slick({
    dots: false,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 1,
    rtl: true,
    prevArrow: $('.custom-prev'),
    nextArrow: $('.custom-next'),
    responsive: [
        {
            breakpoint: 1200,
            settings: { slidesToShow: 2 }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '40px'
            }
        }
    ]
});

$(document).ready(function () {
    "use strict";

    // 1. تهيئة سلايدر البانر (Hero Slider)
    var $heroSlider = $('.hero-slider-active');
    if ($heroSlider.length > 0) {
        $heroSlider.slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 1000,
            fade: true, // تأثير التلاشي يعطي فخامة أكثر
            autoplay: true,
            autoplaySpeed: 5000,
            rtl: rtl == 1 ? true : false, // يدعم RTL تلقائياً بناءً على متغير السيستم
            pauseOnHover: false,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            touchMove: true, // مهم جداً لسحب الإصبع في الجوال
            swipe: true
        });

        // 2. إعادة تشغيل الانيميشن عند تغيير السلايد (لضمان ظهور النصوص دائماً)
        $heroSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            var $animatingElements = $('.single-hero-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
    }

    // وظيفة تشغيل الانيميشن
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            }).addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }

    // 3. الهيدر الذكي (Sticky Header)
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".site-main-header").removeClass("sticky-active");
        } else {
            $(".site-main-header").addClass("sticky-active");
        }
    });

    // 4. إصلاح قائمة الجوال
    // بما أنك تستخدم مكتبة MeanMenu أو مكتبة مشابهة في السيستم الحالي، 
    // هذا الكود يضمن أنها تعمل بسلاسة مع الهوية الجديدة
    if ($('.mobile_menu').length > 0) {
        $('.main-nav-links').clone().appendTo('.mobile_menu'); // نسخ المنيو لنسخة الجوال
    }
});

//  end edits

      $('.partner_slide').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 600,
        autoplay: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        rtl: rtl == 1 ? true : false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
      /*---------------------- 
          Slick Slider js
      ------------------------*/  
  
  
      /*---------------------- 
          Hero Area Backgound Video js
      ------------------------*/  
      if ($("#bgndVideo").length > 0) {
          $("#bgndVideo").YTPlayer();
      }
      /*---------------------- 
          Hero Area Backgound Video js
      ------------------------*/  
  
  
      /*---------------------- 
          Hero Area Water Effect js
      ------------------------*/  
      if ($("#heroHome4").length > 0) {
          $('#heroHome4').ripples({
              resolution: 500,
              dropRadius: 20,
              perturbance: 0.04
          });
      }
      /*---------------------- 
          Hero Area Water Effect js
      ------------------------*/  
  
  
      /*---------------------- 
          Hero Area Particles Effect js
      ------------------------*/  
      if ($("#particles-js").length > 0) {
          particlesJS.load('particles-js', 'assets/front/js/particles.json');
      }
      /*---------------------- 
          Hero Area Particles Effect js
      ------------------------*/  
  
  
      /*---------------------- 
          Projects Carousel js
      ------------------------*/  
      var projectCarousel = $('.project-ss-carousel');
      projectCarousel.owlCarousel({
          loop: true,
          dots: true,
          nav: true,
          navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-right-arrow'></i>"],
          autoplay: false,
          autoplayTimeout: 5000,
          smartSpeed: 1500,
          rtl: rtl == 1 ? true : false,
          items: 1
      });
      /*---------------------- 
          Projects Carousel js
      ------------------------*/
      
      // project carousel Image popup
      $('.single-magnific-ss').magnificPopup({
        type: 'image',
        gallery:{
          enabled:true
        }
      });    
      $('.single-ss').on('click', function(e) {
          e.preventDefault();
          let id = $(this).data('id');
          $("#singleMagnificSs"+id).trigger('click');
      });
  
      /*---------------------- 
          magnific-popup js
      ----------------------*/
      $('.play_btn').magnificPopup({
          type: 'iframe',
          removalDelay: 300,
          mainClass: 'mfp-fade'
      });
      /*---------------------- 
          magnific-popup js
      ----------------------*/
  
      /*----------------------
          Counter js
      ------------------------*/
      $('.counter').counterUp({
          delay: 50,
          time: 2000
      });
  
      // wow js
      new WOW().init();
  
  
      /*---------------------- 
          Scroll top js
      ------------------------*/
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll_up').fadeIn();
        } else {
            $('#scroll_up').fadeOut();
        }
      });
      $('#scroll_up').on('click', function() {
          $("html, body").animate({
              scrollTop: 0
          }, 600);
          return false;
      });
      /*---------------------- 
          Scroll top js
      ------------------------*/
  
      $('a.see-more').on('click', function(e) {
        e.preventDefault();
        $(this).prev('span').show();
        $(this).hide();
      })    
  
  
    $(window).on('load', function() {
        // preloader fadeout onload
        $(".loader-container").addClass('loader-fadeout');
  
        // preloader fadeout onload
        $(".loader-container").addClass('loader-fadeout');
  
  
        // isotope initialize
        $('.grid').isotope({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.single-pic',
            percentPosition: true,
            masonry: {
                // set to the element
                columnWidth: '.grid-sizer'
            }
        });               
      
    });
  
    new LazyLoad();
  })(window.jQuery);   