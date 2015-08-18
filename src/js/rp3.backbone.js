/* global rp3:true, listing_post_type:true, listing_offset:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone = (function($, _, Backbone) {

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


	// Bring in our variables from the PHP template
	var post_type	= listing_post_type,
		offset		= listing_offset;




	var

	baseUrl				= '/wp-json/posts?',
	$listing__backbone	= $('#listing__backbone'),
	paged				= 2,


	/**
	 * Backbone Classes
	 */
	
	/** Post Model */

	PostModel = Backbone.Model.extend({

		defaults: {

			'four_three_small':			null,
			'four_three_small_2x':		null,
			'four_three_medium':		null,
			'four_three_medium_2x':		null
		}
	}),

	/** Post List View */

	PostView = Backbone.View.extend({

		render: function() {

			var that = this;

			// Fetch our next batch of posts

			postCollection.fetch({

				success: function( posts ) {

					posts.each( function( post ) {

						// Convert the dates to English

						post.attributes.date = convertDate( post.attributes.date );

						// Gather our responsive images

						// post.set( 'four_three_small',		responsiveImages( post.attributes.featured_image, 'four_three_small' ) );
						// post.set( 'four_three_small_2x',	responsiveImages( post.attributes.featured_image, 'four_three_small_2x' ) );
						// post.set( 'four_three_medium',		responsiveImages( post.attributes.featured_image, 'four_three_medium' ) );
						// post.set( 'four_three_medium_2x',	responsiveImages( post.attributes.featured_image, 'four_three_medium_2x' ) );
					});

					var template = _.template( $('#listing-template').html() );
					that.$el.html( template( { posts: posts.models } ) );

					// if ( 'function' === typeof( 'picturefill' ) ) {
					// 	picturefill();
					// }
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

	PostCollection = Backbone.Collection.extend({
		model: PostModel
	}),

	postCollection = new PostCollection(),



	setupMoreButtonListener = function() {

		var $listingViewMore = $('#listing__view-more'),
			$postElement, url,
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

			// Set the URL for this query
			url = baseUrl;
			url = url + 'filter[posts_per_page]=6';
			url = url + '&type=' + post_type;
			url = url + '&filter[offset]=' + offset;

			postCollection.url = url;

			// Render the results
			postView.render();

			// Append results to the container, rather than replacing it
			$listing__backbone.append( $postElement );
		});

		// var postSetClass = 'post-set';

		// 	// Determine which was the last page loaded (or from which page
		// 	// we're starting), so as to know which page we're loading next

		// 	var nextPageNumber = 2,
		// 		$nextPostSet = $('<div>').addClass(postSetClass).attr('data-page', nextPageNumber);

		// 	if ( $container.attr('data-paged') ) {
		// 		nextPageNumber = parseInt( $container.attr('data-paged') ) + 1;
		// 		$container.attr( 'data-paged', nextPageNumber );
		// 	}

		// 	// Update our collections URL
		// 	var url = '/wp-json/posts?filter[posts_per_page]=6&filter[category_name]=';

		// 	if ( onNewsPage ) {
		// 		url += 'news';
		// 	} else {
		// 		url += 'blog';
		// 	}

		// 	if ( 0 < queryOffset ) {
		// 		pageOffset = 6 * ( nextPageNumber - 1 ) + 1;
		// 		url += '&filter[offset]=' + pageOffset;
		// 	} else {
		// 		url += '&page=' + nextPageNumber;
		// 	}

		// 	postCollection.url = url;

		// 	// Update the element that we're rendering the view to
		// 	postView.setElement( $nextPostSet );

		// 	postView.render();

		// 	$(elementID).append( $nextPostSet );

		// 	// update the location
		// 	locationHref = window.location.href.match( hrefPattern )[0] + '/page/' + nextPageNumber + '/';
		// 	window.history.pushState( '', '', locationHref );

	},



	/** Helper methods for both this and rp3.backbone_blog */

	// Date conversion into plain English

	convertDate = function( datetime ) {

		var year, month, date,

			monthArray = [
				'January', 'February', 'March', 'April',
				'May', 'June', 'July', 'August',
				'September', 'October', 'November', 'December'
			];

		year  = datetime.substr( 0, 4 );
		month = monthArray[ parseInt( datetime.substr( 5, 2 ) ) - 1 ];
		date  = datetime.substr( 8, 2 );

		return month + ' ' + parseInt( date ) + ', ' + year;
	},

	// Responsive image gathering

	responsiveImages = function( featuredImage, size ) {

		var thisFeaturedImage = featuredImage.attachment_meta.sizes[size];

		if ( 'undefined' != typeof( thisFeaturedImage ) ) {

			return thisFeaturedImage.url;
		}

		return thisFeaturedImage.source;
	},



	init = function() {
		setupMoreButtonListener();
	};



	return {
		init:init,

		// Publicly expose our helper methods

		convertDate:convertDate,
		responsiveImages:responsiveImages
	};

}(jQuery, _, Backbone));

(function($) {

	'use strict';

	if ( 0 < $('#listing__view-more').size() ) {
		rp3.backbone.init();
	}
}(jQuery));
