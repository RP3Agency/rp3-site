/**
 * homeSplash
 * Make the photos on the home page splash feature fade in
 */

/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.wawf = (function($) {

	'use strict';

	var

	homeSplash = function() {

		var $photos = $('[data-photo]').sort(function() {
				return Math.random() * 10 > 5 ? 1 : -1;
			});


		// If we're in a mobile viewport, or we've set our home-splash cookie,
		// then skip the opening animation
		// if ( ( window.matchMedia( '(min-width: 600px)' ).matches ) || ( $.cookie( 'home-splash' ) === 'true' ) ) {
		if ( ! window.matchMedia( '(min-width: 600px)' ).matches ) {
			$photos.addClass('no-transition').addClass( 'visible' );
		} else {
			$photos.each( function(i) {
				var that = $(this);
				window.setTimeout( function() {
					that.addClass('visible');
				}, 100 * i);
			});

			// Set a cookie so that we only do this once per day
			// $.cookie( 'home-splash', 'true', {
			// 	expires:	1,
			// 	path:		'/'
			// });
		}
	},

	/** init */
	init = function() {
		homeSplash();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.wawf.init();
}());
