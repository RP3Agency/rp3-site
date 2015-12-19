/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.yeti = (function($) {

	'use strict';

	var

	yetiDown = function() {

		setTimeout( function() {
			$('#agency-yeti').addClass('yeti-down');
		}, 7000 );
	},

	init = function() {
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
