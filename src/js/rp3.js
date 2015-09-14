/* global rp3:true, ga:false, $f:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

var rp3 = (function($) {

	'use strict';

	var lastScroll = 0,
		$body = $('body'),

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

		var $videoTrigger = $('.video__trigger');


		// Loop through each video on the page
		$videoTrigger.each( function() {

			// Get the hash which serves as the basis for all of our unique IDs
			var hash = $(this).data('id'),
				$modal = $('#' + hash + '__modal'), // the modal
				$iframe = $('#' + hash + '__iframe'), // the vimeo iframe
				player = $f( $iframe[0] ); // the vimeo player for the purposes of the API

			player.addEvent( 'ready' ); // initialize the player API

			// Clicking on the trigger reveals the modal and plays the video
			$(this).on( 'click', function(e) {

				e.preventDefault();
				$modal.addClass('visible');
				player.api( 'play' );
			});
		});
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

	/* ==========================================================================
	   Front Page Video With Audio
	========================================================================== */
	frontPageVideoAudio = function() {

		var $playAudioLink = $('#play-with-audio'),
			$iFrame = $('#front-page__video')[0],
			player = $f($iFrame);

		player.addEvent( 'ready', function() {

			player.api( 'setVolume', 0 );
		});

		$playAudioLink.on( 'click', function(e) {

			e.preventDefault();

			ga( 'send', 'event', 'Interface Elements', 'Enable Audio' );

			player.api( 'setVolume', 1 );
			player.api( 'seekTo', 0 );
			$(this).fadeOut( 100, function() {
				$(this).remove();
			});
		});
	},

	/* ==========================================================================
	   Fix Blog Video Aspect Ratios
	========================================================================== */

	fixBlogVideoAspectRatios = function() {

		var $iframes = $('iframe[src*="vimeo"], iframe[src*="youtube"]'),
			$container,
			$iframeParent,
			videoContainer = 'video-container';

		$iframes.each( function() {

			$iframeParent = $(this).parent();

			if ( ! $iframeParent.hasClass( videoContainer ) ) {
				$container = $('<div>').addClass( videoContainer );
				$container.append( $(this) );
				$iframeParent.append( $container );
			}
		});

	},

	/** Track Blog Related Posts clicks */
	trackBlogRelated = function() {
		$( 'body' ).on( 'click', '.single-blog__related__post', function() {
			ga( 'send', 'event', 'Navigation', 'Blog Related Post Clicked' );
		});
	},

	init = function() {

		navigationCanvasSlide();
		equalizeHeights();
		videoToggle();
		raptorJim();
		revealComments();
		trackBlogRelated();

		if ( $body.hasClass( 'home' ) ) {
			frontPageVideoAudio();
		}

		if ( $body.hasClass( 'blog' ) ) {
			fixBlogVideoAspectRatios();
		}

		$(window).scroll(function() {
			applyFixedHeader();
		});

		$(window).on( 'resize', function() {
			equalizeHeights();
		});

		// scrollIntent;
	};

	return {
		init:init,
		fixBlogVideoAspectRatios:fixBlogVideoAspectRatios
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());
