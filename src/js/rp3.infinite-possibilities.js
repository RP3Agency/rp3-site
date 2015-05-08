/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.infinite_possibilities = (function($) {

	'use strict';

	var $homeSplash		= $('#home-splash'),
		$headline		= $homeSplash.find('#infinite-possibilities-headline'),
		visible			= 'visible',


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
		setTimeout( makeVisible, 3000 );
	},

	onMouseEnter = function() {
		$homeSplash.on( 'mouseenter', function() {
			makeVisible();
		});
	},

	onMouseLeave = function() {
		$homeSplash.on( 'mouseleave', function() {
			makeHidden();
		});
	},

	mouseAtRest = function() {
		var timer;

		window.addEventListener( 'mousemove', function() {
			makeVisible();
			clearTimeout(timer);
			timer = setTimeout( makeHidden, 3000 );
		});
	},

	init = function() {
		initialHide();
		onMouseEnter();
		onMouseLeave();
		mouseAtRest();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.infinite_possibilities.init();
}());
