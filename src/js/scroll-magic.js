if ( rp3 === undefined ) { var rp3 = {}; }

rp3.scrollMagic = (function($) {

	'use strict';

	// Get the viewport height so we can set our offset to 50%
	var height = $(window).outerHeight();
	height = Math.floor( height / 2 );

	// init controller
	var controller = new ScrollMagic({
		globalSceneOptions: {
			offset: 0
		}
	});

	// build scenes
	var $homeWork		= $('#home-work'),
		$hero			= $homeWork.find('.hero'),

	// This is where the scrollMagic happens :-)
	scrollMagic = function() {
		if ( $hero.length > 0 ) {
			$hero.each( function(i) {

				var j				= i + 1,
					triggerEl		= '.home-work-trigger-' + j,
					targetEl		= '#home-work .hero-' + j,
					targetClass		= 'active active-' + j;

				new ScrollScene({
					triggerElement:		triggerEl,
					reverse:			false
				})
				.setClassToggle( targetEl, targetClass )
				.addTo( controller );
			});

			// Make sure our container has the proper height
			$homeWork.height( 600 * $hero.length - $hero.length );
		}
	},

	init = function() {
		scrollMagic();

		// $(window).scroll(function() {
		// });

		// $(window).on( 'resize', function() {
		// });
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.scrollMagic.init();
}());
