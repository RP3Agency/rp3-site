/**
 * Special animations for the Woolly Mammoth Home Page Hero
 */

/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.woolly = (function($) {

	'use strict';

	var

	posters = [ 'zombie', 'puppet', 'cherokee' ], i, j,
	posterElements = [],
	$homeHeroImage = $('#home-hero .hero__image'),
	last = 0,

	animation = function() {

		var random1		= Math.floor( Math.random() * 3 ) + 1,
			random2		= Math.floor( Math.random() * 3 ),
			$woolly		= $('#home-hero .woolly'),
			$thisEl		= $woolly.filter( '.position-' + random1 );

		if ( ( ! $thisEl.hasClass( posters[random2] ) ) && ( last !== random1 ) ) {

			$thisEl.addClass('hidden');

			setTimeout( function() {
				$thisEl.removeClass('zombie puppet cherokee').addClass( posters[random2] ).removeClass( 'hidden' );
			}, 2250 );

			last = random1;
		}
	},

	// Adjust the positioning as the viewport changes
	positioning = function() {

		var $el1 = $homeHeroImage.find('.position-1'),
			$el2 = $homeHeroImage.find('.position-2'),
			$el3 = $homeHeroImage.find('.position-3'),

			rightPos1 = 0,
			leftPos2  = 0,
			leftPos3  = 0,
			topPos1   = 0,
			topPos2   = 0,
			topPos3   = 0,

			halfWidth  = Math.floor( $(window).width() / 2 ),
			halfHeight = Math.floor( $homeHeroImage.height() / 2 );

		// Apply the proper offsets to each
		rightPos1 = halfWidth + 546;
		leftPos2  = halfWidth + 489;
		leftPos3  = halfWidth + 99;

		topPos1   = halfHeight - 208;
		topPos2   = halfHeight - 535;
		topPos3   = halfHeight + 129;

		// Now position our elements accordingly
		$el1.css('right', rightPos1 + 'px');
		$el2.css('left', leftPos2 + 'px');
		$el3.css('left', leftPos3 + 'px');

		$el1.css('top', topPos1 + 'px');
		$el2.css('top', topPos2 + 'px');
		$el3.css('top', topPos3 + 'px');
	},

	initialize = function() {

		if ( $homeHeroImage.length > 0 ) {

			for ( i = 0; i < posters.length; i++ ) {
				j = i + 1;
				posterElements[i] = $('<div>').addClass( 'woolly position-' + j + ' ' + posters[i] );
				$homeHeroImage.append( posterElements[i] );
			}

			positioning();
		}
	},

	init = function() {
		initialize();

		setInterval( animation, 3000 );

		$(window).on('resize', function() {
			positioning();
		});
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';

	if ( Modernizr.csstransforms ) {
		rp3.woolly.init();
	}
}());
