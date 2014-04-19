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
		var $siteNavigation = $('#site-navigation');

		var y = $siteNavigation.offset().top,
			scrollY = $(window).scrollTop();

		if ( scrollY >= y ) {
			$siteNavigation.addClass('fixed');
		} else {
			$siteNavigation.removeClass('fixed');
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
