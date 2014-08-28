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
	forcePrimaryNav = function() {
		var $siteNavigation = $('#site-navigation');

		if ( Modernizr.mq( '(min-width: 40em)' ) ) {
			$siteNavigation.removeAttr('style');
		}
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

	/**
	 * Show/Hide Search in Header Auxiliary
	 */
	showHideSearch = function() {
		var $masthead = $('#masthead'),
			$searchForm = $masthead.find('form'),
			$searchClose = $masthead.find('.close'),
			$searchOpen = $masthead.find('.search-toggle');

		$searchOpen.on( 'click', function(e) {
			e.preventDefault();
			$searchForm.fadeIn();
		})

		$searchClose.on( 'click', function(e) {
			e.preventDefault();
			$searchForm.fadeOut();
		});
	},

	/**
	 * Show/Hide People Information
	 */
	showHidePeople = function() {
		var $articles		= $('#people article');

		$articles.each( function() {
			$(this).on( "click", function() {
				$(this).toggleClass('active');
			});
		});
	},

	/**
	 * Home Page Panel Sizes
	 */
	homePagePanelSizes = function() {
		var windowHeight = $(window).outerHeight(true),
			headerHeight = $("#header-container").outerHeight(true),
			panelHeight = 0,
			$panels = $("#introduction");

// console.log( 'windowHeight : ' + windowHeight );
// console.log( 'headerHeight : ' + headerHeight );

		panelHeight = windowHeight - headerHeight;

		$panels.height( panelHeight );
	},

	init = function() {
		toggleNavigation();
		showHideSearch();
		showHidePeople();
		// homePagePanelSizes();
		
		$(window).on( 'scroll', function() {
			// navigationAnchor();
			// homePagePanelSizes();
		});

		$(window).on( 'resize', function() {
			forcePrimaryNav();
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
