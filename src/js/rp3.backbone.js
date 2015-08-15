/* global rp3:true, picturefill:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone = (function($, _, Backbone) {

	'use strict';

	var $body      = $('body'),
		onNewsPage = $body.hasClass('page-news'),
		onBlogPage = $body.hasClass('page-blog'),

		$viewMoreButton = $('#view-more'),

		// For date conversion
		datetime, year, month, date, formattedDate,
		monthArray = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December'
		],

		elementID, templateID, pageOffset,

		// For the history pushState stuff
		locationHref, hrefPattern = /http:\/\/[^\/]+\/(news|blog)/;

	elementID  = '#listing';

	if ( onNewsPage ) {
		templateID = '#news-template';
	} else {
		templateID = '#blog-template';
	}


	var $container = $(elementID),
		queryOffset = window.queryOffset;

	var


	/**
	 * Backbone Classes
	 */
	
	/** Post Model */

	PostModel = Backbone.Model.extend({}),

	/** Posts Collection */

	PostsCollection = Backbone.Collection.extend({
		url:   '/wp-json/posts?filter[category_name=news]',
		model: PostModel
	}),

	/** Post List View */

	PostListView = Backbone.View.extend({
		el:     elementID,
		render: function() {
			var that = this;

			postsCollection.fetch({
				success: function( posts ) {

					posts.each( function( post ) {

						/** Convert the dates into something more human-friendly */
						datetime = post.attributes.date;

						year  = datetime.substr(0, 4);
						month = datetime.substr(5, 2);
						date  = datetime.substr(8, 2);

						month = monthArray[ parseInt( month ) - 1 ];

						formattedDate = month + ' ' + parseInt( date ) + ', ' + year;

						post.attributes.date = formattedDate;

						/** Next: Deal with the various responsive image sizes we need */
						var sourceType, sourceValue;

						sourceValue = post.attributes.featured_image;

						if ( null !== sourceValue ) {
							sourceType = typeof( post.attributes.featured_image.source );
						}

						if (
							( 'undefined' !== sourceType ) &&
							( null !== sourceValue )
						) {

							if ( 'undefined' != typeof( post.attributes.featured_image.attachment_meta.sizes.four_three_small ) ) {
								post.attributes.img_small = post.attributes.featured_image.attachment_meta.sizes.four_three_small.url;
							} else {
								post.attributes.img_small = post.attributes.featured_image.source;
							}

							if ( 'undefined' != typeof( post.attributes.featured_image.attachment_meta.sizes.four_three_small_2x ) ) {
								post.attributes.img_small_2x = post.attributes.featured_image.attachment_meta.sizes.four_three_small_2x.url;
							} else {
								post.attributes.img_small_2x = post.attributes.featured_image.source;
							}

							if ( 'undefined' != typeof( post.attributes.featured_image.attachment_meta.sizes.four_three_medium ) ) {
								post.attributes.img_medium = post.attributes.featured_image.attachment_meta.sizes.four_three_medium.url;
							} else {
								post.attributes.img_medium = post.attributes.featured_image.source;
							}

							if ( 'undefined' != typeof( post.attributes.featured_image.attachment_meta.sizes.four_three_medium ) ) {
								post.attributes.img_medium_2x = post.attributes.featured_image.attachment_meta.sizes.four_three_medium.url;
							} else {
								post.attributes.img_medium_2x = post.attributes.featured_image.source;
							}
						}
					});

					var template = _.template( $( templateID ).html() );
					that.$el.html( template( { posts: posts.models } ) );

					if ( 'function' === typeof( 'picturefill' ) ) {
						picturefill();
					}
				},
				error: function() {
					window.alert( 'Sorry, an error occurred.' );
				}
			});

			return this;
		}
	}),



	postsCollection = new PostsCollection(),
	postListView    = new PostListView(),



	setupMoreButtonListener = function() {

		var postSetClass = 'post-set';

		$viewMoreButton.on( 'click', function( event ) {

			// Don't do anything I wouldn't do.
			event.preventDefault();

			// "Blur" the button
			$(this).blur();

			// Determine which was the last page loaded (or from which page
			// we're starting), so as to know which page we're loading next

			var nextPageNumber = 2,
				$nextPostSet = $('<div>').addClass(postSetClass).attr('data-page', nextPageNumber);

			if ( $container.attr('data-paged') ) {
				nextPageNumber = parseInt( $container.attr('data-paged') ) + 1;
				$container.attr( 'data-paged', nextPageNumber );
			}

			// Update our collections URL
			var url = '/wp-json/posts?filter[posts_per_page]=6&filter[category_name]=';

			if ( onNewsPage ) {
				url += 'news';
			} else {
				url += 'blog';
			}

			if ( 0 < queryOffset ) {
				pageOffset = 6 * ( nextPageNumber - 1 ) + 1;
				url += '&filter[offset]=' + pageOffset;
			} else {
				url += '&page=' + nextPageNumber;
			}

			postsCollection.url = url;

			// Update the element that we're rendering the view to
			postListView.setElement( $nextPostSet );

			postListView.render();

			$(elementID).append( $nextPostSet );

			// update the location
			locationHref = window.location.href.match( hrefPattern )[0] + '/page/' + nextPageNumber + '/';
			window.history.pushState( '', '', locationHref );

		});

	},

	init = function() {

		if ( ( onNewsPage ) || ( onBlogPage ) ) {
			setupMoreButtonListener();
		}
	};


	return {
		init:init
	};

}(jQuery, _, Backbone));

(function() {
	'use strict';
	rp3.backbone.init();
}());
