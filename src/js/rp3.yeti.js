/* global rp3:true, Cookies:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.yeti = (function($) {

	'use strict';

	var

	yetiRising = function() {

		if ( ! Cookies.get( 'RPYeti' ) ) {

			setTimeout( function() {
				$('#agency-yeti').addClass('yeti-rising');
			}, 500 );

			yetiCookie();
		}
	},

	yetiCookie = function() {

		// Yetis _love_ cookies!

		Cookies.set( 'RPYeti', true, {
			expires: 1
		});

	},

	yetiDown = function() {

		$('#dismiss-yeti').on('click', function(e) {
			e.preventDefault();
			$('#agency-yeti').addClass('yeti-down');

			setTimeout( function() {
				$('#agency-yeti').removeClass('yeti-rising');
			}, 600 );
		});

		$('#agency-yeti').on('click', function(e) {
			var clicked = $(e.target); // get the element clicked
			if (clicked.is('g') || clicked.parents().is('g')) {
				return; // click happened within the dialog, do nothing here
			} else { // click was outside the dialog, so close it
				e.preventDefault();
				$('#agency-yeti').addClass('yeti-down');
				ga('send', 'event', 'Yeti Takeover', 'Dismiss the Yeti');

				setTimeout( function() {
					$('#agency-yeti').removeClass('yeti-rising');
				}, 600 );
			}
		});
	},

	init = function() {
		yetiRising();
		yetiDown();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	// rp3.yeti.init();
}());
