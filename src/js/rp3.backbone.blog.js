/* global rp3:true, picturefill:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone.blog = (function($, _, Backbone) {

	/** Do something awesome */

	var exclude, industries,

	$blog__backbone	= $('#blog__backbone'),
	$blog__loading_indicator = $('#blog__loading-indicator'),

	// Posts collection instance

	postCollection = new rp3.backbone.collections.Posts(),

	/** Post View */

	PostView = Backbone.View.extend({

		render: function( filters ) {

			var that = this;

			// set up collection query filters
			filters = filters || {};

			// Fetch our next batch of posts
			var query = {

				// used by jQuery.ajax to build query parameters
				data: filters,

				success: function( posts ) {
					var template = _.template( $('#blog-template').html() );

					that.$el.html( template( { posts: posts.toJSON() } ) );

					_.each( posts.models, function( post ) {
						that.$el.find( '#single-post-content__comments-placeholder-' + post.get('ID') ).load( post.get('link') + '?ajax=html' );
					});

					// If the current page is divisible by three, add on our interstitial
					// Otherwise, add a "horizontal rule" type thing
					if ( 0 === ( postCollection.state.currentPage % 3 ) ) {
						displayInterstitial();
					} else {
						displayHorizontalRule();
					}

					// run picturefill to update inserted elements
					picturefill({
						reevaluate: true
					});

					// Turn off the loading indicator
					$blog__loading_indicator.removeClass('visible');

					// Pull the page up 50px
					window.scrollBy( 0, 50 );
				},

				error: function() {
					window.alert( 'Sorry, an error occurred [posts].' );
				},

			};

			// Fetch first or next page from collection, depending on collection state
			if ( null === postCollection.state.currentPage ) {
				postCollection.fetch( query );
			} else {
				if( postCollection.hasMore() ) {
					postCollection.more( query );
				} else {
					//TODO: do something to show that there are no more posts
				}
			}

			return this;
		},

	}),

	postView = new PostView(),

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
	 * Display the "horizontal rule"
	 */
	displayHorizontalRule = function() {

		var $horizontalRuleElement = $('<div>').addClass( 'blog__backbone__horizontal-rule' ),
			template = _.template( $('#blog-template-horizontal-rule').html() );

		$horizontalRuleElement.html( template() );

		$blog__backbone.append( $horizontalRuleElement );
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

				$blog__loading_indicator.addClass('visible');

				// Create an element to store our rendering
				$postElement = $('<div>').addClass('blog__backbone__post');
				postView.setElement( $postElement );

				// Set the filters for this query
				var filters = {
					'filter[posts_per_page]'	: 1,
					'filter[post__not_in]'		: exclude,
				};

				// Collection for taxonomy selectors
				var taxonomy = [];

				// Industry taxonomy
				if( ! _.isEmpty( industries ) ) {
					taxonomy.push({
						'taxonomy':	'rp3_tax_industries',
						'field':	'term_id',
						'terms':	industries,
					});
				}

				// If we have taxonomy selectors, set relationshop and assign to filters
				if( 0 < taxonomy.length ) {
					filters['filter[tax_query]'] = taxonomy;
					filters['filter[tax_query][relation]'] = 'AND';
				}

				// Render the results
				postView.render( filters );

				// Append results to the container, rather than replacing it
				$blog__backbone.append( $postElement );

			}
		});
	},

	init = function() {

		// Bring in our variables from the PHP template

		exclude		= rp3.backbone.get('exclude');
		industries	= rp3.backbone.get('industries');

		listenForScroll();
	};

	return {
		init:init
	};

}(jQuery, _, Backbone));

(function() {

	'use strict';

	if ( -1 < location.href.indexOf( '/blog' ) ) {
		rp3.backbone.blog.init();
	}
}());
