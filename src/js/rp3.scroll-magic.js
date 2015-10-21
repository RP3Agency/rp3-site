if ( rp3 === undefined ) { var rp3 = {}; }

rp3.scrollMagic = (function($) {

	'use strict';

	// init controller
	var controller = new ScrollMagic(),

	// This is where the scrollMagic happens :-)
	scrollMagic = function() {
		$('.scroll-effect').each( function() {

			var $scrollTrigger = $(this),
				$scrollTarget = $scrollTrigger.find('.scroll-effect-target');

			if( $scrollTarget.hasClass('effect-complete') ) {
				return;
			}
			new ScrollScene({
				triggerHook:		0.9,
				triggerElement:		this,
				reverse:			false
			})
			.setClassToggle( $scrollTarget, 'effect-complete' )
			.addTo( controller );

			$scrollTarget.addClass( 'effect-active' );
		});
	},

	init = function() {

		// Only run at viewports of 600+ pixels
		var rem = 600 / 16;

		rem = rem + 'rem';

		if ( window.matchMedia( '(min-width: ' + rem + ')' ).matches ) {
			scrollMagic();
		}
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.scrollMagic.init();
}());
