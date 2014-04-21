/* jshint browser:true, jquery:true */

var rp3 = (function($) {

	'use strict';

	var 

	showMainNav = function() {
		var $siteNavigation = $('#site-navigation');

		$siteNavigation.slideToggle();
	},
	toggleNavigation = function() {
		var $menuOpen = $("#menu-open");

		$menuOpen.on('click', function(e) {
			e.preventDefault();
			showMainNav();
		});
	},

	/**
	 * Navigation Anchor
	 */
	navigationAnchor = function() {

		if ( ! Modernizr.touch ) {

			var $mastHead			= $('#masthead'),
				$siteNavigation		= $('#site-navigation'),
				$logo				= $siteNavigation.find('.logo'),
				mastHeight			= $mastHead.outerHeight(true),
				scrollY				= $(window).scrollTop();

			if ( scrollY >= mastHeight ) {
				$siteNavigation.addClass('fixed');
				$logo.fadeIn().css('display', 'block');
			} else {
				$siteNavigation.removeClass('fixed');
				$logo.fadeOut();
			}

		}
	},
	init = function() {
		toggleNavigation();
		
		$(window).on( 'scroll', function() {
			navigationAnchor();
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
