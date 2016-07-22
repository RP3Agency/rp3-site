// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.video = (function($) {
	'use strict';

	var

	// player, done = false,

	onYouTubeIframeAPIReady = function() {

		var $videoTrigger = $('.video__trigger.youtube');

		// Loop through each video on the page
		$videoTrigger.each( function() {

			// Get the hash which serves as the basis for all of our unique IDs
			var hash = $(this).data('id'),
				$modal = $('#' + hash + '__modal'), // the modal
				iframeId = hash + '__iframe',
				youtubePlayer = new YT.Player( iframeId );

			// Clicking on the trigger reveals the modal and plays the video
			$(this).on( 'click', function(e) {

				e.preventDefault();
				$modal.addClass('visible');
				console.log( youtubePlayer );
				youtubePlayer.playVideo();
			});
		});
	},


	/* ==========================================================================
	   Load videos on work item pages
	========================================================================== */

	vimeoToggle = function() {

		var $videoTrigger = $('.video__trigger.vimeo');

		// Loop through each video on the page
		$videoTrigger.each( function() {

			// Get the hash which serves as the basis for all of our unique IDs
			var hash = $(this).data('id'),
				$modal = $('#' + hash + '__modal'), // the modal
				$iframe = $('#' + hash + '__iframe'), // the vimeo iframe
				vimeoPlayer = $f( $iframe[0] ); // the vimeo player for the purposes of the API

			vimeoPlayer.addEvent( 'ready' ); // initialize the player API

			// Clicking on the trigger reveals the modal and plays the video
			$(this).on( 'click', function(e) {

				e.preventDefault();
				$modal.addClass('visible');
				vimeoPlayer.api( 'play' );
			});
		});
	},



	/* ==========================================================================
	   Init
	========================================================================== */

	init = function() {

		// Load YouTube iFrame API

		var tag = document.createElement('script');
		tag.src = 'https://www.youtube.com/iframe_api';
		var firstScriptTag = document.getElementsByTagName( 'script' )[0];
		firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );

		vimeoToggle();
	};

	return {
		init : init,
		onYouTubeIframeAPIReady : onYouTubeIframeAPIReady
	};
}(jQuery));


(function() {
	'use strict';
	rp3.video.init();
}());


/** As far as I can tell, this has to sit in the global namespace. */

function onYouTubeIframeAPIReady() {
	rp3.video.onYouTubeIframeAPIReady();
}
