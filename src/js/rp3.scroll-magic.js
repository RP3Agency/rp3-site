if ( rp3 === undefined ) { var rp3 = {}; }

rp3.scrollMagic = (function($) {

	'use strict';

	// init controller
	var controller = new ScrollMagic();

	// build scenes
	var $homeWork		= $('#home-work'),
		$hero			= $homeWork.find('.full-width-image-panel'),
		$homeBlocks		= $('#home-blocks'),
		$homeBlocksRow	= $homeBlocks.find('.home-blocks__row'),

	// This is where the scrollMagic happens :-)
	scrollMagic = function() {
		if ( $hero.length > 0 ) {
			$hero.each( function(i) {

				var j				= i + 1,
					triggerEl		= '#home-work .full-width-image-panel--' + j,
					targetEl		= '#home-work .full-width-image-panel--' + j + ' a',
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
					triggerEl		= '#home-blocks .home-blocks__row--' + j,
					targetEl		= '#home-blocks .home-blocks__row--' + j + ' .home-blocks__block',
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
		scrollMagic();
		scrollMagicBlocks();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.scrollMagic.init();
}());
