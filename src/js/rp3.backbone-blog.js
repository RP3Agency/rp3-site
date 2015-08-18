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

						post.attributes.date = rp3.backbone.convertDate( post.attributes.date );

						// Gather our responsive images

						post.set( 'four_three_small',		rp3.backbone.responsiveImages( post.attributes.featured_image, 'four_three_small' ) );
						post.set( 'four_three_small_2x',	rp3.backbone.responsiveImages( post.attributes.featured_image, 'four_three_small_2x' ) );
						post.set( 'four_three_medium',		rp3.backbone.responsiveImages( post.attributes.featured_image, 'four_three_medium' ) );
						post.set( 'four_three_medium_2x',	rp3.backbone.responsiveImages( post.attributes.featured_image, 'four_three_medium_2x' ) );
						post.set( 'eight_three_large',		rp3.backbone.responsiveImages( post.attributes.featured_image, 'eight_three_large' ) );
						post.set( 'eight_three_large_2x',	rp3.backbone.responsiveImages( post.attributes.featured_image, 'eight_three_large_2x' ) );
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
					window.alert( 'Sorry, an error occurred [posts].' );
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
	// 				window.alert( 'Sorry, an error occurred [authors].' );
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

	if ( -1 < location.href.indexOf( '/blog' ) ) {
		rp3.backbone_blog.init();
	}
}());
