/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.yeti = (function($) {

	'use strict';

	var

	yetiRising = function() {

		setTimeout( function() {
			$('#agency-yeti').addClass('yeti-rising');
		}, 500 );
	},

	yetiDismissed = function() {
		alert('hello!');
		$('#agency-yeti').removeClass('yeti-rising');
	},

	// yetiCookie = function() {

	// },

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
