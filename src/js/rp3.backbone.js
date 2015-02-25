/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone = (function($, _, Backbone) {

	'use strict';

	var $body      = $('body'),
		onNewsPage = $body.hasClass('page-news'),
		onBlogPage = $body.hasClass('page-blog'),

		$viewMoreButton = $('#view-more');

	var




	/**
	 * Backbone Classes
	 */
	
	/** Post Model */

	PostModel = Backbone.Model.extend({

	}),

	/** Posts Collection */

	PostsCollection = Backbone.Collection.extend({
		url:   '/wp-json/posts?filter[category_name=news]',
		model: PostModel
	}),

	/** Post List View */

	PostListView = Backbone.View.extend({
		el:     '#news-listing',
		render: function() {
			var that = this;

			postsCollection.fetch({
				success: function( posts ) {

					// Convert the dates into something more human-friendly
					var datetime, year, month, date, formatted,
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
						];

					posts.each( function( post ) {
						datetime = post.attributes.date;

						year  = datetime.substr(0, 4);
						month = datetime.substr(5, 2);
						date  = datetime.substr(8, 2);

						month = monthArray[ parseInt( month ) - 1 ];

						formatted = month + ' ' + parseInt( date ) + ', ' + year;

						post.attributes.date = formatted;
					});

					var template = _.template( $( '#news-template' ).html() );
					that.$el.html( template( { posts: posts.models } ) );				
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

			// Now pop up a friendly test message.
			// window.alert( "How's it going?" );

			// "Blur" the button
			$(this).blur();

			// Determine which was the last page loaded, so as to know which page we're loading next
			var $lastPostSetArray = $('.' + postSetClass),
				nextPageNumber = 2,
				$nextPostSet = $('<div>').addClass(postSetClass).attr('data-page', nextPageNumber);

			if ( $lastPostSetArray.length > 0 ) {
				nextPageNumber = $( $lastPostSetArray[ $lastPostSetArray.length - 1 ] ).data( 'page' ) + 1;
				$nextPostSet.attr( 'data-page', nextPageNumber );
			}

			// Update our collections URL
			var url = '/wp-json/posts?filter[category_name]=news&filter[posts_per_page]=6&page=' + nextPageNumber;

			postsCollection.url = url;

			// Update the element that we're rendering the view to
			postListView.setElement( $nextPostSet );

			postListView.render();

			$('#news-listing').append( $nextPostSet );

		});

	},

	init = function() {

		setupMoreButtonListener();

		$(window).scroll(function() {
		});

		$(window).on( 'resize', function() {
		});
	};


	if ( ( onNewsPage ) || ( onBlogPage ) ) {

		return {
			init:init
		};

	}

	return;

}(jQuery, _, Backbone));

(function() {
	'use strict';
	rp3.backbone.init();
}());
