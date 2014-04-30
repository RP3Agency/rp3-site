var wawf = (function($) {

	var

	/**
	 * Set the proper height on the hero div based on the hero image aspect ratio
	 */
	resizeHero = function() {
		var ratio = 1.6,
			$hero = $('#hero'),
			heroWidth = 0;

		heroWidth = $hero.width();
		$hero.height( Math.floor( heroWidth / ratio ) );
	},

	/**
	 * Tasks to do onResize
	 */
	onResize = function() {
		/* we'll do stuff here later */
		resizeHero();
	},

	init = function() {
		/* do stuff that we define above */
		resizeHero();

		$(window).on( 'resize', function() {
			onResize();
		});
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	wawf.init();
}());
