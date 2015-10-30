/* global rp3:true, ga:false, $f:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

var rp3 = (function($) {

	'use strict';

	var $body = $('body'),

	/* ==========================================================================
	Navigation Canvas Slide
	========================================================================== */

	navigationCanvasSlide = function() {

		var $body = $('body'),
			$menuOpen = $('#site-header__menu-open');

		$menuOpen.on( 'click', function(e) {

			e.preventDefault();

			$body.toggleClass('canvas-open');

			$(this).trigger( 'blur' );
		});
	},

	/* ==========================================================================
	   Load videos on work item pages
	========================================================================== */
	videoToggle = function() {

		var $videoTrigger = $('.video__trigger');


		// Loop through each video on the page
		$videoTrigger.each( function() {

			// Get the hash which serves as the basis for all of our unique IDs
			var hash = $(this).data('id'),
				$modal = $('#' + hash + '__modal'), // the modal
				$iframe = $('#' + hash + '__iframe'), // the vimeo iframe
				player = $f( $iframe[0] ); // the vimeo player for the purposes of the API

			player.addEvent( 'ready' ); // initialize the player API

			// Clicking on the trigger reveals the modal and plays the video
			$(this).on( 'click', function(e) {

				e.preventDefault();
				$modal.addClass('visible');
				player.api( 'play' );
			});
		});
	},


	/**
	 * Raptor Jim
	 */
	raptorJim = function() {
		var $body = $('body');

		if ( $body.hasClass('error404') ) {
			$body.raptorize({
				'enterOn': 'konami-code'
			});

			$('#rp404').raptorize({
				"enterOn" : "timer",
				"delayTime": 300000
			});
		}
	},

	/** Reveal Comments Section */
	revealComments = function() {
		$( 'body' ).on( 'click', '.single-blog__comments__trigger', function(e) {
			e.preventDefault();

			var $this = $(this),
				post_id = $this.data('commentPost'),
				$commentsForm = $('#single-blog__comments__form-' + post_id);

			$commentsForm.slideDown();
		});
	},

	/* ==========================================================================
	   Front Page Video With Audio
	========================================================================== */
	frontPageVideoAudio = function() {

		var $playAudioLink = $('#play-with-audio'),
			$iFrame = $('#front-page__video')[0],
			player = $f($iFrame);

		player.addEvent( 'ready', function() {

			player.api( 'setVolume', 0 );
		});

		$playAudioLink.on( 'click', function(e) {

			e.preventDefault();

			if ( undefined !== window.ga ) {
				ga( 'send', 'event', 'Interface Elements', 'Enable Audio' );
			}

			player.api( 'setVolume', 1 );
			player.api( 'seekTo', 0 );
			$(this).fadeOut( 100, function() {
				$(this).remove();
			});
		});
	},

	/* ==========================================================================
	   Fix Blog Video Aspect Ratios
	========================================================================== */

	fixBlogVideoAspectRatios = function() {

		var $iframes = $('iframe[src*="vimeo"], iframe[src*="youtube"]'),
			$container,
			$iframeParent,
			videoContainer = 'video-container';

		$iframes.each( function() {

			$iframeParent = $(this).parent();

			if ( ! $iframeParent.hasClass( videoContainer ) ) {
				$container = $('<div>').addClass( videoContainer );
				$container.append( $(this) );
				$iframeParent.append( $container );
			}
		});

	},

	// Sorry for the mess...
	campaignMonitor = function() {

		$('#subForm').on( 'submit', function(e) {
			e.preventDefault();
			$.getJSON(
				this.action + "?callback=?",
				$(this).serialize(),
				function( data ) {
					if ( data.Status === 400 ) {
						alert( "Error: " + data.Message );
					} else {
						var successMsg = "Thank you!<br><br>" + data.Message,
							modalElement = $('<div>').addClass( 'blog__subscribe__modal' ),
							template = _.template( $('#blog-template-subscription-modal' ).html() );

						if ( ! Modernizr.touch ) {
							modalElement.html( template() );
							modalElement.find( '#blog-subscription-modal__message' ).html( successMsg );
							$body.append( modalElement );
							$('input[type="email"]').val('');
							modalElement.find( '#blog-subscription-modal__close' ).on( 'click', function(e) {
								e.preventDefault();
								modalElement.fadeOut( 100, function() {
									$(this).remove();
								});
							});

							$body.keydown( function ( e ) {
								if(e.keyCode == 27) {
									e.preventDefault();
									modalElement.fadeOut( 100, function() {
										$(this).remove();
									});
								}
							});
						} else {
							$('input[type="email"]').val('');
							alert( successMsg.replace( '<br><br>', "\n\n" ) );
						}
					}
				}
			);
		});
	},

	/** Track Blog Related Posts clicks */
	trackBlogRelated = function() {
		$( 'body' ).on( 'click', '.single-blog__related__post', function() {

			if ( undefined !== window.ga ) {
				ga( 'send', 'event', 'Navigation', 'Blog Related Post Clicked' );
			}
		});
	},

	blogSubHeader = function() {

		var $blogSubHeader = $('#blog-header__sub-header'),
			waypoint;

		if ( $blogSubHeader.size() > 0 ) {

			waypoint = $blogSubHeader.waypoint({
				handler: function( direction ) {
					if ( 'down' === direction ) {
						$blogSubHeader.addClass('fixed');
					} else if ( 'up' === direction ) {
						$blogSubHeader.removeClass('fixed');
					}
				}
			});
		}
	},

	/* ==========================================================================
	   Copy permalink to clipboard
	========================================================================== */

	copyPermalinkSuccess = function( text ) {
		var $toolTip = $('#copy-permalink').parent();

		$toolTip.addClass( 'tooltip tooltip--success' );

		setTimeout( function() {
			$toolTip.removeClass( 'tooltip tooltip--success' );
		}, 3000 );
	},

	copyPermalinkFailure = function() {
		var $toolTip = $('#copy-permalink').parent();

		$toolTip.addClass( 'tooltip tooltip--failure' );

		setTimeout( function() {
			$toolTip.removeClass( 'tooltip tooltip--failure' );
		}, 3000 );
	},

	copyPermalinkToClipboard = function() {

		var clipboard = new Clipboard('#copy-permalink'),
			$copyPermalink = $('#copy-permalink');

		$copyPermalink.on( 'click', function(e) {
			e.preventDefault();
		});

		clipboard.on( 'success', function(e) {
			copyPermalinkSuccess( e.text );
		});

		clipboard.on( 'error', function(e) {
			copyPermalinkFailure();
		});
	},

	copyPermalinkOption = function() {

		var $shareLink = $('li.share-link');

		$shareLink.each( function() {
			console.log( $(this) );
			console.log( $(this).data( 'post-id' ) );

			var postID = $(this).data( 'post-id' );

			$('#share-link-' + postID ).insertBefore( $('#post-' + postID + ' .share-end' ) );
		});
	},

	init = function() {

		navigationCanvasSlide();
		videoToggle();
		raptorJim();
		revealComments();
		trackBlogRelated();
		campaignMonitor();
		blogSubHeader();
		fixBlogVideoAspectRatios();
		copyPermalinkToClipboard();
		copyPermalinkOption();

		if ( $body.hasClass( 'home' ) ) {
			frontPageVideoAudio();
		}
	};

	return {
		init:init,
		fixBlogVideoAspectRatios:fixBlogVideoAspectRatios
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());
