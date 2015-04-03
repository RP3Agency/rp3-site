/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

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


		// var actions = {
		// 	direction: "down",
		// 	callback: function(scrollIntent) {
		// 		window.alert( 'condition met!' );
		// 	}
		// },

		// options = {

		// };

		// var scrollIntent = new ScrollIntent( window, actions, options );
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
			$equalHeights = $('.equal-heights');

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

		// scrollIntent;
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());
