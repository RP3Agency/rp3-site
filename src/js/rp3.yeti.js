/* global rp3:true */

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
	rp3.yeti.init();
}());
