/* jshint browser:true, jquery:true */

var rp3 = (function($) {

	'use strict';

	var lastScroll = 0,

	/**
	 * Toggle the "visibility" class of the mobile nav to trigger the CSS fade in and fade out
	 */
	showMainNav = function() {
		var $mobileNav = $('#mobile-nav');
		$mobileNav.addClass('visible');
	},
	hideMainNav = function() {
		var $mobileNav = $('#mobile-nav');

		$mobileNav.css('visibility', 'visible').removeClass('visible');

		setTimeout( function() {
			$mobileNav.removeAttr('style');
		}, 300);
	},
	toggleNavigation = function() {
		var $menuOpen = $("#menu-open"),
			$menuClose = $("#menu-close");

		$menuOpen.on('click', function(e) {
			e.preventDefault();
			showMainNav();
		});

		$menuClose.on('click', function(e) {
			e.preventDefault();
			hideMainNav();
		});
	},

	/**
	 * Apply the "fixed" class to the desktop header if the user starts to scroll back up
	 */
	applyFixedHeader = function() {
		// Sets the current scroll position
		var scrollTop = $(window).scrollTop(),
			$body = $('body'),
			$window = $(window);

		// Determines up-or-down scrolling

		// Scrolling Down
		if ( lastScroll > 0 ) {
			if (scrollTop > lastScroll) {
				$body.removeClass('fixed-nav');

			// Scrolling Up
			} else {
				$body.addClass('fixed-nav');
			}

			if ( $window.scrollTop() === 0 ) {
				$body.removeClass('fixed-nav');
			}
		}

		// Updates scroll position
		lastScroll = scrollTop;
	},


	/**
	 * Equalize the height of elements of a given selector
	 */
	getMaxHeight = function( elements ) {
		var maxHeight = 0;

		for ( var i = 0; i < elements.length; i++ ) {
			if ( $(elements[i]).height() > maxHeight ) {
				maxHeight = $(elements[i]).height();
			}
		}

		return maxHeight;
	},
	equalizeHeights = function() {
		var maxHeight = 0,
			$relatedWorkLabel = $('.related-work__label'),
			$equalHeights = $('.equal-heights');

		if ( $relatedWorkLabel.length > 0 ) {
			$relatedWorkLabel.removeAttr('style');
			maxHeight = getMaxHeight( $relatedWorkLabel );
			$relatedWorkLabel.height(maxHeight);
		}

		if ( $equalHeights.length > 0 ) {
			if ( window.matchMedia( '(min-width: 600px)' ).matches ) {
				$equalHeights.removeAttr('style');
				maxHeight = getMaxHeight( $equalHeights );
				$equalHeights.height(maxHeight);
			} else {
				$equalHeights.css('height', 'auto');
			}
		}
	},

	videoToggle = function() {
		var $videoModal = $('#video__modal'),
			$videoTrigger = $('#video__trigger');

		if ( 0 < $videoModal.length ) {
			$videoTrigger.on( 'click', function(e) {
				e.preventDefault();
				$videoModal.addClass('visible');
			});
		}
	},


	/**
	 * Raptor Jim
	 */
	raptorJim = function() {
		var $body = $('body');

		if ( $body.hasClass('error404') ) {
			$body.raptorize({
				'enterOn': 'konami-code'
			});

			$('#rp404').raptorize({
				"enterOn" : "timer",
				"delayTime": 300000
			});
		}
	},

	init = function() {
		toggleNavigation();
		equalizeHeights();
		videoToggle();
		raptorJim();
		
		$(window).scroll(function() {
			applyFixedHeader();
		});

		$(window).on( 'resize', function() {
			equalizeHeights();
		});
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());


/**
 * Accelerometer Experiment
 */

// jQuery(document).ready(function($) {

// 	var has_touch = 'ontouchstart' in document.documentElement;
// 	var accX, accY, width, height, xA, yA, movement;

// 	if(has_touch) {

// 		// (resize = function() {

// 		// 	height = $(window).height();
// 		// 	width = $(window).width();

// 		// 	$('#home-work a').width(width).height(height);


// 		// })();

// 		window.ondevicemotion = function(event) {

// 			accX = Math.round(event.accelerationIncludingGravity.x*10) / 10;
// 			accY = Math.round(event.accelerationIncludingGravity.y*10) / 10;

// 			movement = 10;

// 			xA = -(accX / 10) * movement;
// 			yA = -(accY / 10) * movement;


// 			run();

// 		}
// 	}
	
// 	function run() {

// 		$('#home-work picture').css({'left' : xA+'px', 'top' : yA+'px',
// 			'box-shadow' : ''+xA+'px '+yA+'px 10px rgba(0,0,0,0.3)'});

// 		bX = -(xA*2)-100;
// 		bY = -(yA*2)-300;

// 		// $('#home-work a').css({'background-position' : bX+'px '+bY+'px'});

// 	}
	
// }(jQuery));
