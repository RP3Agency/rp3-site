/* global rp3:true, wp:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone_blog = (function($, _, Backbone, wp) {

	/** Do something awesome */

	var

	offSet			= 0,
	$blog__backbone	= $('#blog__backbone'),

	/** Post View */

	PostView = Backbone.View.extend({

		render: function( filters ) {

			var that = this;

			// set up collection query filters
			filters = filters || {};

			// Fetch our next batch of posts

			postCollection.fetch({

				// used by jQuery.ajax to build query parameters
				data: filters,

				success: function( posts ) {
					var template = _.template( $('#blog-template').html() );
					that.$el.html( template( { posts: posts.toJSON() } ) );

					// If the offSet is divisible by three, add on our interstitial
					if ( 0 === ( parseInt( offSet ) % 3 ) ) {
						displayInterstitial();
					}

				},

				error: function() {
					window.alert( 'Sorry, an error occurred [posts].' );
				}
			});

			return this;
		}
	}),

	postView = new PostView(),

	/** Post Collection */

	PostCollection = wp.api.collections.Posts.extend({
		model:	rp3.backbone.models.PostModel
	}),

	postCollection = new PostCollection(),

	/**
	 * Display the interstitial
	 */
	displayInterstitial = function() {

		var $interstitialElement = $('<div>').addClass( 'blog__backbone__interstitial' ),
			template = _.template( $('#blog-template-interstitial').html() );

		$interstitialElement.html( template() );

		$blog__backbone.append( $interstitialElement );
	},

	/**
	 * Listen for when we reach the bottom of the page
	 */
	listenForScroll = function() {

		var windowScrollTop,
			windowHeight,
			documentHeight,
			$postElement;

		$(window).on( 'scroll', function() {

			windowScrollTop		= $(window).scrollTop();
			windowHeight		= $(window).height();
			documentHeight		= $(document).height();

			if ( documentHeight === windowScrollTop + windowHeight ) {

				// Increment our query offset
				offSet++;

				// Create an element to store our rendering
				$postElement = $('<div>').addClass('blog__backbone__post');
				postView.setElement( $postElement );

				// Set the filters for this query
				var filters = {
					'filter[posts_per_page]'	: 1,
					'filter[offset]'			: offSet,
				};

				// Render the results
				postView.render( filters );

				// Append results to the container, rather than replacing it
				$blog__backbone.append( $postElement );
			}
		});
	},

	init = function() {
		listenForScroll();
	};

	return {
		init:init
	};

}(jQuery, _, Backbone, wp));

(function() {

	'use strict';

	if ( -1 < location.href.indexOf( '/blog' ) ) {
		rp3.backbone_blog.init();
	}
}());
