/* global rp3:true, listing_post_type:true, listing_offset:true, wp:false, picturefill:false */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone = (function($, _, Backbone, wp) {

	'use strict';

	// var $body      = $('body'),
	// 	onNewsPage = $body.hasClass('page-news'),

	// 	elementID, templateID, pageOffset,

	// 	// For the history pushState stuff
	// 	locationHref, hrefPattern = /http:\/\/[^\/]+\/(news|blog)/;

	// if ( onNewsPage ) {
	// 	templateID = '#news-template';
	// } else {
	// 	templateID = '#blog-template';
	// }

	var post_type, offset;

	var
		$listing__backbone	= $('#listing__backbone'),
		paged				= 2,


	/**
	 * Backbone Classes
	 */

	/** Post Model */

	PostModel = wp.api.models.Post.extend({

		// define additional default attribute values
		defaults: {
			'four_three_small':			null,
			'four_three_small_2x':		null,
			'four_three_medium':		null,
			'four_three_medium_2x':		null,
			'eight_three_large':		null,
			'eight_three_large_2x':		null,
		},

		// set calculated values on model initialization
		initialize: function() {
			var self = this;

			// set long format date string from date object
			this.set({ longDate: this.longDate() });

			// for each image size in defaults, set responsive image from featured image
			_.each( _.keys( this.defaults ), function( size ) {
				self.set( size, self.responsiveImage( size ) );
			});
		},

		// make model read-only
		sync: function( method ) {
			if( method === 'read' ) {
				return wp.api.models.Post.prototype.sync.apply(this, arguments);
			}
		},

		toJSON: function( ) {
			// get base serialized post
			var attributes = wp.api.models.Post.prototype.toJSON.apply(this, arguments);

			// serialize author attribute directly from related Author model instance
			attributes.author = this.attributes.author.toJSON();

			return attributes;
		},

		// Date conversion into plain English
		longDate: function( ) {
			var months = [ 'January', 'February', 'March', 'April',	'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'	],
				date = this.get( 'date' );
			return months[ date.getMonth() ] + ' ' + date.getDate() + ', ' + date.getFullYear();
		},

		responsiveImage: function( size ) {
			// If featuredImage is null, return nothing
			if ( ! this.has( 'featured_image' ) ) {
				return false;
			}

			var featuredImage = this.get( 'featured_image' );

			// If featuredImage has error_data as a property, or doesn't have an ID property, return nothing
			if ( featuredImage.hasOwnProperty( 'error_data' ) || ! featuredImage.hasOwnProperty( 'ID' ) ) {
				return false;
			}

			// If featuredImage has the property ID, figure out the appropriate size to return
			if ( featuredImage.attachment_meta.sizes.hasOwnProperty( size ) && featuredImage.attachment_meta.sizes[size].hasOwnProperty( 'url' ) ) {
				return featuredImage.attachment_meta.sizes[size].url;
			} else {
				return featuredImage.source;
			}
		},

	}),

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

	/** Posts Collection */

	PostCollection = wp.api.collections.Posts.extend({
		model: PostModel
	}),

	postCollection = new PostCollection(),



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

		post_type	= listing_post_type;
		offset		= listing_offset;

		setupMoreButtonListener();
	};

	return {
		init: init,

		// publicly expose the models
		models: {
			PostModel: PostModel,
		}
	};

}(jQuery, _, Backbone, wp));

(function($) {

	'use strict';

	if ( 0 < $('#listing__view-more').size() ) {
		rp3.backbone.init();
	}
}(jQuery));
