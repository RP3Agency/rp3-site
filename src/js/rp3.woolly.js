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

	/** Animation via css transitions (default method) */
	animation = function() {

		var random1		= Math.floor( Math.random() * 3 ) + 1,
			random2		= Math.floor( Math.random() * 3 ),
			$woolly		= $('#home-hero .woolly'),
			$thisEl		= $woolly.filter( '.position-' + random1 );

		/**
		 * Only perform the animation IF:
		 * - The new poster is different than the poster it's replacing AND
		 * - We're not animating the same poster twice in a row
		 */
		if ( ( ! $thisEl.hasClass( posters[random2] ) ) && ( last !== random1 ) ) {

			$thisEl.addClass('hidden');

			setTimeout( function() {
				$thisEl.removeClass('zombie puppet cherokee')
					.addClass( posters[random2] )
					.removeClass( 'hidden' );
			}, 2250 );

			last = random1;
		}
	},

	/** Initialize our hero by creating the elements for the transitioning posters in the DOM */
	initialize = function() {

		if ( $homeHeroImage.length > 0 ) {

			for ( i = 0; i < posters.length; i++ ) {
				j = i + 1;
				posterElements[i] = $('<div>').addClass( 'woolly position-' + j + ' ' + posters[i] );
				$homeHeroImage.append( posterElements[i] );
			}
		}
	},

	/** IE9 doesn't support transitions, so fade in and out via jQuery */
	polyfill = function() {
		var random1		= Math.floor( Math.random() * 3 ) + 1,
			random2		= Math.floor( Math.random() * 3 ),
			$woolly		= $('#home-hero .woolly'),
			$thisEl		= $woolly.filter( '.position-' + random1 );

		if ( ( ! $thisEl.hasClass( posters[random2] ) ) && ( last !== random1 ) ) {

			$thisEl.fadeOut( 2000 );

			setTimeout( function() {
				$thisEl.removeClass('zombie puppet cherokee')
					.addClass( posters[random2] )
					.fadeIn( 2000 );
			}, 2250 );

			last = random1;
		}
	},

	/** init */
	init = function() {
		initialize();

		if ( Modernizr.mq( '( min-width: 768px )' ) ) {

			if ( Modernizr.csstransforms ) {
				setInterval( animation, 3000 );
			} else {
				setInterval( polyfill, 3000 );
			}
		}
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.woolly.init();
}());
