//swiper slider

    var mySwiper = new Swiper ('.s1', {
      slidesPerView: 1,
      spaceBetween: 0,
	  fadeEffect: {
      crossFade: true
      },
      loop: true,
	  centeredSlides: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
	  autoplay: {
    	delay: 5000,
  	  },
    });

//    var mySwiper2 = new Swiper ('.s2', {
//      slidesPerView: 4,
//      spaceBetween: 1,
//      loop: true,
//      pagination: {
//        el: '.swiper-pagination2',
//        clickable: true,
//      },
//      navigation: {
//        nextEl: '.swiper-button-next2',
//        prevEl: '.swiper-button-prev2',
//      },
//	  autoplay: {
//    	delay: 3000,
//  	  },
//		breakpoints: {
//		// when window width is <= 576px
//		680: {
//		  slidesPerView: 1,
//		  spaceBetween: 1,
//		},
//		// when window width is <= 768px
//		1020: {
//		  slidesPerView: 2,
//		  spaceBetween: 1,
//		},
//		// when window width is <= 992px
//		1300: {
//		  slidesPerView: 3,
//		  spaceBetween: 1,
//		},
//	  },
//    });
//
//	var mySwiper3 = new Swiper ('.s3', {
//      slidesPerView: 6,
//      spaceBetween: 1,
//      loop: true,
//      pagination: {
//        el: '.swiper-pagination3',
//        clickable: true,
//      },
//      navigation: {
//        nextEl: '.swiper-button-next3',
//        prevEl: '.swiper-button-prev3',
//      },
//	  autoplay: {
//    	delay: 3000,
//  	  },
//		breakpoints: {
//		// when window width is <= 576px
//		576: {
//		  slidesPerView: 1,
//		  spaceBetween: 1,
//		},
//		// when window width is <= 768px
//		768: {
//		  slidesPerView: 2,
//		  spaceBetween: 1,
//		},
//		// when window width is <= 992px
//		992: {
//		  slidesPerView: 4,
//		  spaceBetween: 1,
//		},
//	  },
//    });

//headroom
(function() {
	
    var header = new Headroom(document.querySelector("#header"), {
        tolerance: 5,
        offset : 0,
        classes: {
          initial: "animated",
          pinned: "slideDown",
          unpinned: "slideUp"
        }
    });
    header.init();
	
}());
//

//hide navbar on on scroll down
//var prev = 1000;
//var $window = $(window);
//var nav = $('.main-nav');
//
//$window.on('scroll', function(){
//  var scrollTop = $window.scrollTop();
//  nav.toggleClass('hidden', scrollTop > prev);
//  prev = scrollTop;
//});
//end of navbar scroll reveal function

// paroller.js
$(document)
        .ready(function () {
            //initialize paroller.js
            $('[data-paroller-factor]').paroller();
            //initialize paroller.js and set options for elements with .paroller class
            $('.paroller').paroller({
                type: 'foreground',
                direction: 'vertical'
            });
        });
//

$(function() {

  var $window           = $(window),
      win_height_padded = $window.height() * 1,
      isTouch           = Modernizr.touch;

  if (isTouch) { $('.revealOnScroll').addClass('animated'); }

  $window.on('scroll', revealOnScroll);

  function revealOnScroll() {
    var scrolled = $window.scrollTop(),
        win_height_padded = $window.height() * 1;

    // Showed...
    $(".revealOnScroll:not(.animated)").each(function () {
      var $this     = $(this),
          offsetTop = $this.offset().top;

      if (scrolled + win_height_padded > offsetTop) {
        if ($this.data('timeout')) {
          window.setTimeout(function(){
            $this.addClass('animated ' + $this.data('animation'));
          }, parseInt($this.data('timeout'),10));
        } else {
          $this.addClass('animated ' + $this.data('animation'));
        }
      }
    });
    // Hidden...
   $(".revealOnScroll.animated").each(function (index) {
      var $this     = $(this),
          offsetTop = $this.offset().top;
      if (scrolled + win_height_padded < offsetTop) {
        $(this).removeClass('animated fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight');
      }
    });
  }

  revealOnScroll();
});

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

// jquery scrollintoview easing start
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('.easing').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 500, 'easeInSine');
        event.preventDefault();
    });
});
// scrol/intoview easing end

$(document).on('click', '#mobile-button', function() {
$("#header").toggleClass("bg-armas-red");
});

//$(document).on('click', '#sudo-swp-prev', function() {
//$("#real-swp-prev").click();
//});
//
//$(document).on('click', '#sudo-swp-next', function() {
//$("#real-swp-next").click();
//});
//
//$(document).on('click', '#sudo-swp-prev2', function() {
//$("#real-swp-prev2").click();
//});
//
//$(document).on('click', '#sudo-swp-next2', function() {
//$("#real-swp-next2").click();
//});

// Highlight the top nav as scrolling occurs
//$('body').scrollspy({
//    target: '.subnav'
//});

//$(document).ready(function () {
//$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
//  if (!$(this).next().hasClass('show')) {
//    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
//  }
//  var $subMenu = $(this).next(".dropdown-menu");
//  $subMenu.toggleClass('show');
//
//
//  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
//    $('.dropdown-submenu .show').removeClass("show");
//  });
//	
//  return false;
//});
//});

// Odometer + Textroller JS
$('#stats-odometer').waypoint(function() {
		setTimeout(function(){
			$('.tahun-didirikan').html('2004');
			$('.luas-area').html('12300');
			$('.jumlah-karyawan').html('435');
			}, 1000);
			//
			  var elt         = document.getElementById("roller");
			  var texts       = ["PT", "PMDN"]
			  elt.textrollers  = new TextRollers({
				  el: elt,
				  values: texts,    // an array of texts.     default : [el.innerHtml]
				  align: "middle",    // right, left or middle. default : middle
				  delay: 1000,      // in milliseconds,       default : 5000
				  loop: false       // at the end, restart.   default : true
			  });
}, {
    offset: '50%'
});

//svg graph
$(".jumlah-truk-graph").waypoint(function() {
$(".jumlah-truk-graph").addClass("playsvg");
}, {
    offset: '50%'
});

$(".pelanggan-kami-pie").waypoint(function() {
$(".pelanggan-kami-pie").addClass("playsvg");
}, {
    offset: '50%'
});

$(".jenis-merek-truk-pie").waypoint(function() {
$(".jenis-merek-truk-pie").addClass("playsvg");
}, {
    offset: '50%'
});

$(".jumlah-truk-pie").waypoint(function() {
$(".jumlah-truk-pie").addClass("playsvg");
}, {
    offset: '50%'
});

$(".perkembangan-sistem").waypoint(function() {
$(".perkembangan-sistem").addClass("playsvg");
}, {
    offset: '75%'
});

$(".ritase-sekarang").waypoint(function() {
$(".ritase-sekarang").addClass("playsvg");
}, {
    offset: '75%'
});

new UISearch( document.getElementById( 'sb-search' ) );