(function ($) {
	"use strict";

/*=============================================
	=    		 Preloader			      =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader();
});


/*=============================================
	=          Data Background               =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})

/*=============================================
	=           Data Color             =
=============================================*/
$("[data-bg-color]").each(function () {
	$(this).css("background-color", $(this).attr("data-bg-color"));
});


/*===========================================
	=          One page Menu               =
=============================================*/
var scrollLink = $('.section-link');
// Active link switching
$(window).scroll(function () {
	var scrollbarLocation = $(this).scrollTop();

	scrollLink.each(function () {

		var sectionOffset = $(this.hash).offset().top - 90;

		if (sectionOffset <= scrollbarLocation) {
			$(this).parent().addClass('active');
			$(this).parent().siblings().removeClass('active');
		}
	});
});
//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
	$('a.section-link[href*="#"]:not([href="#"])').on('click', function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - 80)
				}, 1200, "easeInOutExpo");
				return false;
			}
		}
	});
});


/*=============================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.tgmenu__wrap li.menu-item-has-children ul').length) {
	$('.tgmenu__wrap .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="plus-line"></span></div>');
}

//Mobile Nav Hide Show
if ($('.tgmobile__menu').length) {

	var mobileMenuContent = $('.tgmenu__wrap .tgmenu__main-menu').html();
    $('.tgmobile__menu .tgmobile__menu-box .tgmobile__menu-outer').empty().append(mobileMenuContent);

	//Dropdown Button
	$('.tgmobile__menu li.menu-item-has-children .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(300);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.tgmobile__menu-backdrop, .tgmobile__menu .close-btn, .tgmobile__menu .navigation li a').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
}


/*=============================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 50) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');

	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
	}
});


/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top -50
    }, 1000);

  });
};


/*=============================================
	=        Roadmap Active		      =
=============================================*/
var roadmapSwiper = new Swiper('.roadmap__active', {
    // Optional parameters
    loop: false,
    slidesPerView: 1,
    spaceBetween: 32,
    breakpoints: {
        '1500': {
            slidesPerView: 1,
        },
        '1200': {
            slidesPerView: 1,
        },
        '992': {
            slidesPerView: 1,
        },
        '768': {
            slidesPerView: 1,
        },
        '576': {
            slidesPerView: 1,
        },
        '0': {
            slidesPerView: 1,
        },
    },
    pagination: {
        el: ".tg-swiper-scrollbar",
        type: "progressbar",
    },
    // Navigation arrows
    navigation: {
        nextEl: ".tg-swiper-next",
        prevEl: ".tg-swiper-prev",
    },
});


/*=============================================
	=        Collection Active		      =
=============================================*/
var collectionSwiper = new Swiper('.collection-three-active', {
    // Optional parameters
    loop: false,
    slidesPerView: 4,
    spaceBetween: 48,
    breakpoints: {
        '1500': {
            slidesPerView: 4,
        },
        '1200': {
            slidesPerView: 4,
        },
        '992': {
            slidesPerView: 3,
        },
        '768': {
            slidesPerView: 2,
            centeredSlides: true,
            centeredSlidesBounds: true,
            spaceBetween: 35,
        },
        '576': {
            slidesPerView: 2,
            centeredSlides: true,
            centeredSlidesBounds: true,
            spaceBetween: 30,
        },
        '420': {
            slidesPerView: 2,
            centeredSlides: true,
            centeredSlidesBounds: true,
            spaceBetween: 20,
        },
        '0': {
            slidesPerView: 1,
        },
    },
    pagination: {
        el: '.tg-swiper-pagination',
        clickable: true,
    },
    // Navigation arrows
    navigation: {
        nextEl: ".tg-swiper-next",
        prevEl: ".tg-swiper-prev",
    },
});



/*=============================================
	=        Banner Active		      =
=============================================*/
var bannerSwiper = new Swiper('.banner__collection-active', {
    // Optional parameters
    loop: false,
    effect: 'fade',
    fadeEffect: {
        crossFade: true,
    },
    slidesPerView: 1,
    spaceBetween: 24,
    breakpoints: {
        '1500': {
            slidesPerView: 1,
        },
        '1200': {
            slidesPerView: 1,
        },
        '992': {
            slidesPerView: 1,
        },
        '768': {
            slidesPerView: 1,
        },
        '576': {
            slidesPerView: 1,
        },
        '0': {
            slidesPerView: 1,
        },
    },
    pagination: {
        el: '.tg-swiper-pagination',
        clickable: true,
    },
    // Navigation arrows
    navigation: {
        nextEl: ".tg-swiper-next",
        prevEl: ".tg-swiper-prev",
    },
});


/*=============================================
	=    		Isotope	Active  	      =
=============================================*/
$('.grid').imagesLoaded(function () {
	// init Isotope
	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-item',
		}
	});
	// filter items on button click
	$('.portfolio-menu').on('click', 'button', function () {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});

});
//for menu active class
$('.product-license li').on('click', function (event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


/*=============================================
	=    		DarkMode Active  	      =
=============================================*/
function tg_theme_toggler() {

    $('.modeSwitch').on("change", function () {
        toggleTheme();
    });

    // set toggle theme scheme
    function tg_set_scheme(tg_theme) {
        localStorage.setItem('tg_theme_scheme', tg_theme);
        document.documentElement.setAttribute("tg-theme", tg_theme);
    }

    // toggle theme scheme
    function toggleTheme() {
        if (localStorage.getItem('tg_theme_scheme') === 'dark') {
            tg_set_scheme('light');
        } else {
            tg_set_scheme('dark');
        }
    }

    // set the first theme scheme
    function tg_init_theme() {
        if (localStorage.getItem('tg_theme_scheme') === 'dark') {
            tg_set_scheme('dark');
            document.querySelector('.modeSwitch').checked = true;
        } else {
            tg_set_scheme('light');
            document.querySelector('.modeSwitch').checked = false;
        }
    }
    tg_init_theme();
}
if ($(".modeSwitch").length > 0) {
    tg_theme_toggler();
}


})(jQuery);