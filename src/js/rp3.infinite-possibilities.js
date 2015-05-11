/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.infinite_possibilities = (function($) {

	'use strict';

	var $html			= $('html'),
		$homeHero		= $('#home-hero'),
		$homeHeroVideo	= $homeHero.find('#home-hero-video'),
		$headline		= $homeHero.find('#infinite-possibilities-headline'),
		visible			= 'visible',
		mousedOver		= false,
		timing			= 3000,


	// Make it visible
	makeVisible = function() {
		if ( ( $html.hasClass( 'no-touch' ) ) && ( ! $headline.hasClass( 'visible' ) ) ) {
			$headline.addClass(visible);
		}
	},

	// Make it hidden
	makeHidden = function() {
		if ( ( $html.hasClass('no-touch') ) && ( $headline.hasClass( 'visible' ) ) ) {
			$headline.removeClass(visible);
		}
	},


	// Now, when to do those other things...

	initialHide = function() {
		setTimeout( makeHidden, timing );
	},

	onMouseEnter = function() {
		$homeHero.on( 'mouseenter', function() {
			mousedOver = true;
			makeVisible();
		});
	},

	onMouseLeave = function() {
		$homeHero.on( 'mouseleave', function() {
			mousedOver = false;
			setTimeout( makeHidden, timing );
		});
	},

	mouseAtRest = function() {
		var timer;

		window.addEventListener( 'mousemove', function() {
			if ( mousedOver ) {
				makeVisible();
				clearTimeout(timer);
				timer = setTimeout( makeHidden, timing );
			}
		});
	},

	displayVideo = function() {
		var $video, $source;

		if ( $html.hasClass( 'no-touch' ) ) {
			$video = $('<video autoplay loop muted>').addClass('home-splash__video');
			$source = $('<source>').attr('src', '/wp-content/themes/rp3/videos/city-of-possibilities.mp4');
			$video.append($source);
			$homeHeroVideo.replaceWith($video);
		}
	},

	init = function() {
		displayVideo();
		initialHide();
		onMouseEnter();
		mouseAtRest();
		onMouseLeave();
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.infinite_possibilities.init();
}());
