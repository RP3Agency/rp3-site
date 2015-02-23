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


		// Animate all the things, all the time!
		$photos.each( function(i) {
			var that = $(this);
			window.setTimeout( function() {
				that.addClass('visible');
			}, 100 * i);
		});
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
