/* global rp3:true, picturefill:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone.news = (function($, _, Backbone) {

	'use strict';

	var post_type, offset;

	var
		$listing__backbone	= $('#listing__backbone'),
		paged				= 2,

	// Posts collection instance
	postCollection = new rp3.backbone.collections.Posts(),

	/** Post List View */

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

					var template = _.template( $('#listing-template').html() );
					that.$el.html( template( { posts: posts.toJSON() } ) );

					// run picturefill to update inserted elements
					if ( 'function' === typeof( 'picturefill' ) ) {
						picturefill();
					}
				},

				error: function() {
					window.alert( 'Sorry, an error occurred [news].' );
				}
			});

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

			if ( 0 < $listingContentsBackbone.size() ) {
				paged = parseInt( $listingContentsBackbone.last().data('paged') ) + 1;
			}

			// Create an element to store our rendering
			$postElement = $('<div>').addClass('listing__contents listing__contents--backbone').attr( 'data-paged', paged );
			postView.setElement( $postElement );

			// Determine the proper offset
			offset += 6;

			// Set the filters for this query
			var filters = {
				'type'						: post_type,
				'filter[posts_per_page]'	: 6,
				'filter[offset]'			: offset,
			};

			// Render the results
			postView.render( filters );

			// Append results to the container, rather than replacing it
			$listing__backbone.append( $postElement );
		});

		// 	// update the location
		// 	locationHref = window.location.href.match( hrefPattern )[0] + '/page/' + nextPageNumber + '/';
		// 	window.history.pushState( '', '', locationHref );
	},

	init = function() {

		// Bring in our variables from the PHP template

		post_type	= rp3.backbone.get('post_type');
		offset		= parseInt( rp3.backbone.get('offset') );

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
