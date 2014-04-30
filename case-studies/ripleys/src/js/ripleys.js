var ripleys = (function($) {

	var

	/**
	 * Tasks to do onResize
	 */
	onResize = function() {
		/* we'll do stuff here later */
	},

	init = function() {
		/* do stuff that we define above */

		onResize();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	ripleys.init();
}());
