/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone_blog = (function($, _, Backbone) {

	/** Do something awesome */

	var

	baseUrlPost		= '/wp-json/posts?',
	// baseUrlAuthor	= '/wp-json/users?',
	offSet			= 0,
	$blog__backbone	= $('#blog__backbone'),


	/**
	 * Backbone Classes
	 */
	
	/** Post Model */
	
	PostModel = Backbone.Model.extend({

		defaults: {

			'four_three_small':			null,
			'four_three_small_2x':		null,
			'four_three_medium':		null,
			'four_three_medium_2x':		null,
			'eight_three_large':		null,
			'eight_three_large_2x':		null
		}
	}),

	/** Post View */

	PostView = Backbone.View.extend({

		render: function() {

			var that = this;

			// Fetch our next post

			postCollection.fetch({

				success: function( posts ) {

					posts.each( function( post ) {

						// Convert the date to English
						post.attributes.date = convertDate( post.attributes.date );

						// Gather our responsive images
						post.set( 'four_three_small', responsiveImages( post.attributes.featured_image, 'four_three_small' ) );
						post.set( 'four_three_small_2x', responsiveImages( post.attributes.featured_image, 'four_three_small_2x' ) );
						post.set( 'four_three_medium', responsiveImages( post.attributes.featured_image, 'four_three_medium' ) );
						post.set( 'four_three_medium_2x', responsiveImages( post.attributes.featured_image, 'four_three_medium_2x' ) );
						post.set( 'eight_three_large', responsiveImages( post.attributes.featured_image, 'eight_three_large' ) );
						post.set( 'eight_three_large_2x', responsiveImages( post.attributes.featured_image, 'eight_three_large_2x' ) );

					});

					var template = _.template( $('#blog-template').html() );
					that.$el.html( template( { posts: posts.models } ) );


					// Get the author(s) information

					// var $authorElement = $('<div>').addClass('author');
					// authorView.setElement( $authorElement );
					// authorCollection.url = baseUrlAuthor;
					// authorView.render();


					// If the offSet is divisible by three, add on our interstitial
					if ( 0 === ( parseInt( offSet ) % 3 ) ) {
						displayInterstitial();
					}

				},

				error: function() {
					window.alert( 'Sorry, an error occurred. [posts]' );
				}
			});

			return this;
		}
	}),

	postView = new PostView(),

	/** Post Collection */

	PostCollection = Backbone.Collection.extend({
		model:	PostModel
	}),

	postCollection = new PostCollection(),



	/** Author Model */

	// AuthorModel = Backbone.Model.extend({}),

	/** Author View */

	// AuthorView = Backbone.View.extend({

	// 	render: function() {

	// 		var that = this;

	// 		// Fetch our author

	// 		authorCollection.fetch({

	// 			success: function( authors ) {

	// 				authors.each( function( author ) {
	// 					// Do we even need to do anything here?
	// 				});

	// 				var template = _.template( $('#blog-template-author').html() );
	// 				that.$el.html( template( { authors: authors.models } ) );
	// 			},

	// 			error: function() {
	// 				window.alert( 'Sorry, an error occurred. [authors]' );
	// 			}
	// 		});

	// 		return this;
	// 	}
	// }),

	// authorView = new AuthorView(),

	/** Author Collection */

	// AuthorCollection = Backbone.Collection.extend({
	// 	model: AuthorModel
	// }),

	// authorCollection = new AuthorCollection(),










	/**
	 * Convert dates to English
	 */
	convertDate = function( datetime ) {

		var year, month, date,

			monthArray = [
				'January', 'February', 'March', 'April',
				'May', 'June', 'July', 'August',
				'September', 'October', 'November', 'December'
			];

		year = datetime.substr( 0, 4 );
		month = datetime.substr( 5, 2 );
		date = datetime.substr( 8, 2 );

		month = monthArray[ parseInt( month ) - 1 ];

		return month + ' ' + parseInt( date ) + ', ' + year;
	},



	/**
	 * Gather Up Responsive Images
	 */
	responsiveImages = function( featuredImage, size ) {

		var thisFeaturedImage = featuredImage.attachment_meta.sizes[size];

		if ( 'undefined' != typeof( thisFeaturedImage ) ) {
			return thisFeaturedImage.url;
		}

		return thisFeaturedImage.source;
	},



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

				// Set the URL for this query
				postCollection.url = baseUrlPost + 'filter[posts_per_page]=1&filter[offset]=' + offSet;

				// Render the results
				postView.render();

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

}(jQuery, _, Backbone));

(function() {
	'use strict';
	rp3.backbone_blog.init();
}());
