/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

var rp3 = (function($) {

	'use strict';

	var lastScroll = 0,

	/* ==========================================================================
	Navigation Canvas Slide
	========================================================================== */

	navigationCanvasSlide = function() {

		var $body = $('body'),
			$menuOpen = $('#site-header__menu-open');

		$menuOpen.on( 'click', function(e) {

			e.preventDefault();

			$body.toggleClass('canvas-open');

			$(this).trigger( 'blur' );
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

	/** Reveal Comments Section */
	revealComments = function() {
		$( 'body' ).on( 'click', '.single-blog__comments__trigger', function(e) {
			e.preventDefault();

			var $this = $(this),
				post_id = $this.data('commentPost'),
				$commentsForm = $('#single-blog__comments__form-' + post_id);

			$commentsForm.slideDown();
		});
	},

	init = function() {
		navigationCanvasSlide();
		equalizeHeights();
		videoToggle();
		raptorJim();
		revealComments();

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
