/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.infinite_possibilities = (function($) {

	'use strict';

	var $homeSplash		= $('#home-splash'),
		$headline		= $homeSplash.find('#infinite-possibilities-headline'),
		visible			= 'visible',
		mousedOver		= false,
		timing			= 3000,


	// Make it visible
	makeVisible = function() {
		$headline.addClass(visible);
	},

	// Make it hidden
	makeHidden = function() {
		$headline.removeClass(visible);
	},


	// Now, when to do those other things...

	initialHide = function() {
		setTimeout( makeHidden, timing );
	},

	onMouseEnter = function() {
		$homeSplash.on( 'mouseenter', function() {
			mousedOver = true;
			makeVisible();
		});
	},

	onMouseLeave = function() {
		$homeSplash.on( 'mouseleave', function() {
			mousedOver = false;
			setTimeout( makeHidden, timing );
		});
	},

	mouseAtRest = function() {
		var timer;

		window.addEventListener( 'mousemove', function() {
			if ( mousedOver ) {
				makeVisible();
				clearTimeout(timer);
				timer = setTimeout( makeHidden, timing );
			}
		});
	},

	init = function() {
		initialHide();
		onMouseEnter();
		mouseAtRest();
		onMouseLeave();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.infinite_possibilities.init();
}());
