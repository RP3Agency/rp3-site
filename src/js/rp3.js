/* global rp3:true, ga:false, $f:false, Clipboard:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

var rp3 = (function($) {

	'use strict';

	var $body = $('body'),

	/* ==========================================================================
	Breakpoints
	========================================================================== */

	breakpoint,

	getBreakpoint = function() {

		var breakpointSmall			= 321 / 16,
			breakpointMedium		= 600 / 16,
			breakpointIntermediate	= 800 / 16,
			breakpointLarge			= 1000 / 16;

		// Upgrade, if appropriate
		if ( window.matchMedia( "( min-width: " + breakpointLarge + "em )" ).matches ) {
			return 'large';
		} else if ( window.matchMedia( "( min-width: " + breakpointIntermediate + "em )" ).matches ) {
			return 'intermediate';
		} else if ( window.matchMedia( "( min-width: " + breakpointMedium + "em )" ).matches ) {
			return 'medium';
		} else if ( window.matchMedia( "( min-width: " + breakpointSmall + "em )" ).matches ) {
			return 'small';
		}

		// If all else fails, return default.
		return 'default';

	},

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

	copyPermalinkSuccess = function( postID ) {
		var $toolTip = $('#share-link-' + postID);

		$toolTip.addClass( 'tt--open tt--success' );

		setTimeout( function() {
			$toolTip.removeClass( 'tt--open tt--success' );
		}, 3000 );
	},

	copyPermalinkFailure = function( postID ) {
		var $toolTip = $('#share-link-' + postID);

		$toolTip.addClass( 'tt--open tt--failure' );

		setTimeout( function() {
			$toolTip.removeClass( 'tt--open tt--failure' );
		}, 3000 );
	},

	copyPermalinkToClipboard = function() {

		var clipboard = new Clipboard('.share-link'),
			$shareLink = $('.share-link'),
			postID;

		$shareLink.on( 'click', function(e) {
			e.preventDefault();
			postID = $(this).data( 'post-id' );
		});

		clipboard.on( 'success', function() {
			copyPermalinkSuccess( postID );
		});

		clipboard.on( 'error', function() {
			copyPermalinkFailure( postID );
		});
	},

	copyPermalinkOption = function() {

		var $shareLink = $('li.share-link');

		$shareLink.each( function() {

			var postID = $(this).data( 'post-id' );

			$( '#share-link-' + postID ).insertBefore( $('#post-' + postID + ' .share-end' ) );
		});
	},

	/* ==========================================================================
	   Display a Career Article
	========================================================================== */

	displayCareerArticle = function() {

		var $allPosts			= $('.careers__article'),
			$buttons			= $('button.careers__trigger'),
			panelID, $columnContainer,
			thisID, $thisPost, $thisContent,
			thatID, $thatPost, $thatContent;

		$buttons.each( function() {

			$(this).on( 'click', function() {

				thisID = $(this).data( 'id' );
				$thisPost = $('#post-' + thisID);
				$thisContent = $thisPost.find( '.careers__content' );

				if ( ( breakpoint === 'medium' ) || ( breakpoint === 'intermediate' ) || ( breakpoint === 'large' ) ) {

					/** Column Mode */

					panelID = $(this).parents( '.page__panel' ).data( 'panel-id' );

					$columnContainer = $('#panel-' + panelID ).find( '.careers__inner__content' );

					$columnContainer.html( $thisContent.html() );

				} else {

					/** Accordion Mode */

					if ( $thisPost.hasClass( 'open' ) ) {

						$thisPost.addClass('close').removeClass('open');

						if ( Modernizr.csstransitions ) {
							$thisPost.one( 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
								$thisPost.removeClass( 'close' );
								$thisContent.slideUp( 200 );
							});
						} else {

						}
					} else if ( ! $thisPost.hasClass( 'close' ) ) {

						// Close any other open posts
						$allPosts.each( function() {

							thatID = $(this).find('.careers__trigger').data( 'id' );
							$thatPost = $('#post-' + thatID);
							$thatContent = $('#post-' + thatID + '-content');

							if ( ( thisID !== thatID ) && ( $thatPost.hasClass( 'open' ) ) ) {
								$thatPost.removeClass('open');
								$thatContent.slideUp( 200, function() {

									$('html, body').animate({
										scrollTop: $thisPost.offset().top
									}, 200);
								});
							}
						});

						$thisContent.slideDown( 200, function() {
							$thisPost.addClass('open');
						});
					}
				}
			});
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
		displayCareerArticle();

		if ( $body.hasClass( 'home' ) ) {
			frontPageVideoAudio();
		}


		var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;

		var observer = new MutationObserver( function() {

			// fired when a mutation occurs
			copyPermalinkOption();
			copyPermalinkToClipboard();
		});

		// define what element should be observed by the observer
		// and what types of mutations trigger the callback
		observer.observe(document, {
			subtree: true,
			attributes: true
		});

		// Figure out our current breakpoint. It's a constant struggle.

		breakpoint = getBreakpoint();

		$(window).on( 'resize', function() {
			breakpoint = getBreakpoint();
		});
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
