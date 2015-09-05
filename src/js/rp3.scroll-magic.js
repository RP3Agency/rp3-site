if ( rp3 === undefined ) { var rp3 = {}; }

rp3.scrollMagic = (function($) {

	'use strict';

	// init controller
	var controller = new ScrollMagic();

	// build scenes
	var $homeWork		= $('#front-page__work'),
		$hero			= $homeWork.find('.front-page__work__item'),
		$homeBlocks		= $('#front-page__blocks'),
		$homeBlocksRow	= $homeBlocks.find('.front-page__blocks__row'),

	// This is where the scrollMagic happens :-)
	scrollMagic = function() {
		if ( $hero.length > 0 ) {
			$hero.each( function(i) {

				var j				= i + 1,
					triggerEl		= '#front-page__work .full-width-image-panel--' + j,
					targetEl		= '#front-page__work .full-width-image-panel--' + j + ' a',
					targetClass		= 'active';

				new ScrollScene({
					triggerHook:		0.9,
					triggerElement:		triggerEl,
					reverse:			false
				})
				.setClassToggle( targetEl, targetClass )
				.addTo( controller );
			});
		}
	},

	/** Second verse, nearly same as the first */
	scrollMagicBlocks = function() {
		if ( $homeBlocks.length > 0 ) {
			$homeBlocksRow.each( function(i) {

				var j				= i + 1,
					triggerEl		= '#front-page__blocks .front-page__blocks__row--' + j,
					targetEl		= '#front-page__blocks .front-page__blocks__row--' + j + ' .front-page__blocks__block',
					targetClass		= 'active';

				new ScrollScene({
					triggerHook:		0.9,
					triggerElement:		triggerEl,
					reverse:			false
				})
				.setClassToggle( targetEl, targetClass )
				.addTo( controller );
			});
		}
	},

	init = function() {

		// Only run at viewports of 600+ pixels
		var rem = 600 / 16;

		rem = rem + 'rem';

		if ( window.matchMedia( '(min-width: ' + rem + ')' ).matches ) {
			scrollMagic();
			scrollMagicBlocks();
		} else {
			// Override the styling issues that would happen if we pulled our browser out from
			// narrow to wide
			$hero.find('a').css( 'margin-top', '0' ).css( 'opacity', '1' );
			$homeBlocksRow.find('.front-page__blocks__block').css( 'opacity', '1' );
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
