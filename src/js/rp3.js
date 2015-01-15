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

	/**
	 * Special animations for the Woolly Mammoth Home Page Hero
	 */
	woollyClassSwap = function() {
		var startPos	= Math.floor( Math.random() * 5 ) + 1,
			endPos		= startPos + 1,
			$woolly		= $('#home-hero .woolly'),
			$thisEl		= $woolly.filter( '.position-' + startPos ).eq(0);

		// Only execute if our start position < 4
		if ( startPos < 4 ) {
			// Fix the endPos
			if ( endPos > 3 ) {
				endPos = 1;
			}

			$thisEl.addClass('hidden');

			setTimeout( function() {
				$thisEl
					.removeClass('position-' + startPos)
					.addClass('position-'+ endPos)
					.removeClass('hidden');
			}, 1000 );
		}
	},
	woolly = function() {

		var $homeHeroImage	= $('#home-hero .hero__image'),
			$zombie			= $('<div>').addClass('woolly zombie position-2'),
			$puppet			= $('<div>').addClass('woolly puppet position-3'),
			$cherokee		= $('<div>').addClass('woolly cherokee position-1');

		if ( $homeHeroImage.length > 0 ) {
			$homeHeroImage.append( $zombie ).append( $puppet ).append( $cherokee );
		}

		setInterval( woollyClassSwap, 3000 );
	},

	init = function() {
		toggleNavigation();
		equalizeHeights();
		videoToggle();
		raptorJim();
		woolly();
		
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
