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
			}, 2500 );

			last = random1;
		}
	},

	initialize = function() {

		if ( $homeHeroImage.length > 0 ) {

			for ( i = 0; i < posters.length; i++ ) {
				j = i + 1;
				posterElements[i] = $('<div>').addClass( 'woolly position-' + j + ' ' + posters[i] );
				$homeHeroImage.append( posterElements[i] );
			}
		}
	},

	init = function() {
		initialize();

		setInterval( animation, 3000 );
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';

	if ( ! Modernizr.touch ) {
		rp3.woolly.init();
	}
}());
