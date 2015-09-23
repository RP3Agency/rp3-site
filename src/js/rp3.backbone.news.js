/* global rp3:true, picturefill:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone.news = (function($, _, Backbone) {

	'use strict';

	var post_type, current_page, offset, exclude, tags, categories, industries, services;

	var $listingViewMore	= $('#listing__view-more'),
		$listing__backbone	= $('#listing__backbone'),

	// Posts collection instance
	postCollection = new rp3.backbone.collections.Posts(),

	/** Post List View */

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

					var template = _.template( $('#listing-template').html() );
					that.$el.html( template( { posts: posts.toJSON() } ) );

					// if last page, hide button
					if ( ! postCollection.hasMore() ) {
						$listingViewMore.hide();
					}

					// run picturefill to update inserted elements
					picturefill({
						reevaluate: true
					});
				},

				error: function() {
					// Hide button
					$listingViewMore.hide();

					//TODO: maybe hit a logging service to send notifications
				}
			};

			// Fetch first or next page from collection, depending on collection state
			if ( null === postCollection.state.currentPage ) {
				postCollection.fetch( query );
			} else {
				if( postCollection.hasMore() ) {
					postCollection.more( query );
				}
			}

			return this;
		}
	}),

	postView    = new PostView(),

	setupMoreButtonListener = function() {

		var $listingViewMore = $('#listing__view-more'),
			$postElement,
			$listingContentsBackbone;

		$listingViewMore.on( 'click', function(e) {

			// Don't do anything I wouldn't do.
			e.preventDefault();

			// "Blur" the button
			$(this).blur();

			// Update our pagination count
			$listingContentsBackbone = $('.listing__contents--backbone');

			// Create an element to store our rendering
			$postElement = $('<div>').addClass('listing__contents listing__contents--backbone');
			postView.setElement( $postElement );

			// Set the base filters for this query
			var filters = {
				'type'						: post_type,
				'filter[posts_per_page]'	: 6,
				'filter[post__not_in]'		: exclude,
			};

			// Add tag filters if set
			if( ! _.isEmpty( tags ) ) {
				filters['filter[tag__in]'] = tags;
			}

			// Collection for taxonomy selectors
			var taxonomy = [];

			// News Category taxonomy
			if( ! _.isEmpty( categories ) ) {
				taxonomy.push({
					'taxonomy':	'rp3_tax_news_categories',
					'field':	'term_id',
					'terms':	categories,
				});
			}

			// Industry taxonomy
			if( ! _.isEmpty( industries ) ) {
				taxonomy.push({
					'taxonomy':	'rp3_tax_industries',
					'field':	'term_id',
					'terms':	industries,
				});
			}

			// Service taxonomy
			if( ! _.isEmpty( services ) ) {
				taxonomy.push({
					'taxonomy':	'rp3_tax_services',
					'field':	'term_id',
					'terms':	services,
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
			$listing__backbone.append( $postElement );

			// update the location
			current_page++;
			var locationHref = window.location.href.match( /https?:\/\/[^\/]+\/([^\/]+)/ )[0] + '/page/' + current_page + '/';
			window.history.pushState( '', '', locationHref );

		});

	},

	init = function() {

		// Bring in our variables from the PHP template

		post_type		= rp3.backbone.get('post_type');
		current_page	= rp3.backbone.get('current_page');
		offset			= rp3.backbone.get('offset');
		exclude			= rp3.backbone.get('exclude');
		tags			= rp3.backbone.get('tags');
		categories		= rp3.backbone.get('news_categories');
		industries		= rp3.backbone.get('industries');
		services		= rp3.backbone.get('services');

		setupMoreButtonListener();
	};

	return {
		init: init,
	};

}(jQuery, _, Backbone));

(function($) {

	'use strict';

	if ( 0 < $('#listing__view-more').size() ) {
		rp3.backbone.news.init();
	}
}(jQuery));
