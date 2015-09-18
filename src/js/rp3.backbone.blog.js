/* global rp3:true, picturefill:false, ga:false */

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
						that.$el.find( '#single-post-content__comments-placeholder-' + post.get('ID') ).load( post.get('link') + '?ajax=html .single-blog__comments' );
						that.$el.find( '#single-post-content__related-placeholder-' + post.get('ID') ).load( post.get('link') + '?ajax=html .single-blog__related' );
					});

					// If the current page is divisible by three, add on our interstitial
					if ( 0 === ( postCollection.state.currentPage % 3 ) ) {
						displayInterstitial();
					}

					// run picturefill to update inserted elements
					picturefill({
						reevaluate: true
					});

					// Fix any blog aspect ratio issues that might be out there
					rp3.fixBlogVideoAspectRatios();

					// Refresh our sub header waypoint
					// Only works if it returns an error to the console. WTGF?????
					rp3.waypoint[0].refresh();

					// store current location (previous loaded or landing url) and article depth in local scope
					var prev_link = location.href,
						article_depth = postCollection.state.currentPage;

					// add article scroll waypoint
					that.$el.find('article').waypoint({
  						handler: function( direction ) {
							var $article = $(this.element);
							if( direction == 'up' ) {
								history.pushState( null, null, prev_link );
							} else {
								history.pushState( null, null, $article.data('permalink') );
							}
							// trigger analytics page view and reporting events
							if ( undefined !== window.ga ) {
								ga( 'send', 'pageview', location.pathname );
								ga( 'send', 'event', 'Navigation', 'Blog Scrolled', {
									page: location.pathname,			// Associate with page just in case
									metric1: article_depth,				// Custom Metric - Blog Article Depth
									metric2: $(window).scrollTop(),		// Custom Metric - Blog Pixel Depth
								});
							}
  						},
						offset: '100%',
					});

					// Turn off the loading indicator
					$blog__loading_indicator.removeClass('visible');

					// Pull the page up 50px if not at top
					if( 0 !== $(window).scrollTop() ) {
						window.scrollBy( 0, 50 );
					}

				},

				error: function() {
					// Turn off the loading indicator
					$blog__loading_indicator.removeClass('visible');

					//TODO: maybe hit a logging service to send notifications
				},

			};

			// Fetch first or next page from collection, depending on collection state
			if ( null === postCollection.state.currentPage ) {
				postCollection.fetch( query );
			} else {
				if( postCollection.hasMore() ) {
					postCollection.more( query );
				} else {
					$blog__loading_indicator.removeClass('visible');
					//TODO: do something else to show that there are no more posts
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
	 * Listen for when we reach the bottom of the page
	 */
	listenForScroll = function() {

		var windowScrollTop,
			windowHeight,
			documentHeight,
			$postElement;

		$(window).on( 'scroll', _.debounce( function() {

			windowScrollTop		= $(window).scrollTop();
			windowHeight		= $(window).height();
			documentHeight		= $(document).height();

			if ( documentHeight <= windowScrollTop + windowHeight + 100 ) {

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
		}, 50));

		$(window).trigger('scroll');
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
