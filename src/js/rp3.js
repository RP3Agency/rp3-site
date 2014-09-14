/* jshint browser:true, jquery:true */

var rp3 = (function($) {

	'use strict';

	var 

	showMainNav = function() {
		var $primaryMenu = $('#primary-menu');

		$primaryMenu.slideToggle();
	},
	toggleNavigation = function() {
		var $menuOpen = $("#menu-open");

		$menuOpen.on('click', function(e) {
			e.preventDefault();
			showMainNav();
		});
	},
	forcePrimaryNav = function() {
		var $primaryMenu = $('#primary-menu');

		if ( Modernizr.mq( '(min-width: 31.25em)' ) ) {
			$primaryMenu.removeAttr('style');
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
		// showHideSearch();
		// showHidePeople();
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


/**
 * Accelerometer Experiment
 */

jQuery(document).ready(function($) {

	var has_touch = 'ontouchstart' in document.documentElement;
	var accX, accY, width, height, xA, yA, movement;
	
	if(has_touch) {

		(resize = function() {
			
			height = $(window).height();
			width = $(window).width();
		
			$('#home-work a').width(width).height(height);
			
			
		})();
		
		window.ondevicemotion = function(event) {
		  	
		    accX = Math.round(event.accelerationIncludingGravity.x*10) / 10;  
		    accY = Math.round(event.accelerationIncludingGravity.y*10) / 10;  
		    
		    movement = 10;
		    
		    xA = -(accX / 10) * movement;
		    yA = -(accY / 10) * movement;
		    
		    
			run();
		    
		}  
	}
	
	function run() {
		    
	    $('#home-work picture').css({'left' : xA+'px', 'top' : yA+'px',
			'box-shadow' : ''+xA+'px '+yA+'px 10px rgba(0,0,0,0.3)'});
	    
	    bX = -(xA*2)-100;
	    bY = -(yA*2)-300;
	    
	    // $('#home-work a').css({'background-position' : bX+'px '+bY+'px'});
	
	}
	
}(jQuery));
