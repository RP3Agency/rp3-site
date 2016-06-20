// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone.blogSearch = (function($, _, Backbone) {

	var

	$body					= $('body'),
	$searchForm				= $('#search-form'),
	$searchResults			= $('#blog-search__results'),
	$searchResultsTemplate	= $('#blog-search__results__template'),
	$noResults				= $('#blog-search__no-results' ),
	$searchInput			= $('input[name="s"]'),
	filters,
	searchQuery,
	$postElement,

	/* ==========================================================================
	   Backbone Stuff
	========================================================================== */

	// Posts collection instance

	postCollection = new rp3.backbone.collections.Posts(),

	// Post view

	PostView = Backbone.View.extend({

		render: function( filters, searchQuery ) {

			var that = this;

			// set up collection query filters
			filters = filters || {};

			var query = {

				data: filters,

				success: function( posts ) {

					if ( 0 === posts.length ) {
						$searchResults.removeClass( 'open' );
						$noResults.addClass( 'open' );
						return;
					}

					$noResults.removeClass( 'open' );

					/** Store the query string by appending it to the end of the link */

					_.each( posts.models, function( post ) {
						post.attributes.link = post.attributes.link + '/#/search/' + encodeURIComponent( searchQuery );
					});

					var template = _.template( $searchResultsTemplate.html() );

					that.$el.html( template( { posts: posts.toJSON() } ) );

					$searchResults.append( $postElement ).addClass( 'open' );
				},

				error: function() {

				}
			};

			postCollection.fetch( query );

			return this;
		}
	}),

	postView = new PostView(),

	// Router

	AppRouter = Backbone.Router.extend({

		routes: {
			'search/:searchQuery':	'search'
		}
	}),

	appRouter = new AppRouter(),

	/* ==========================================================================
	   Toggle Search Screen
	========================================================================== */

	toggleSearch = function( layer, triggerEvent ) {

		triggerEvent.preventDefault();

		if ( layer.hasClass( 'open' ) ) {

			$body.removeClass( 'search-open' );

			rp3.elementFadeOut( layer );

		} else if ( ! layer.hasClass( 'close' ) ) {

			rp3.elementFadeIn( layer );

			$body.addClass( 'search-open' );

			if ( -1 < location.href.indexOf( '/blog' ) ) {

				if ( 0 < searchQuery.length ) {

					$searchInput.val( searchQuery );
					$searchForm.trigger( 'submit' );
				}
			}

			if ( ! Modernizr.touchevents ) {
				$searchInput.trigger( 'focus' );
			} else {
				var $viewportMeta = $('meta[name="viewport"]');

				$searchInput.on( 'focus', function() {
					$viewportMeta.attr( 'content', 'width=device-width,initial-scale=1,maximum-scale=1' );
				});

				$searchInput.on( 'blur', function() {
					$viewportMeta.attr( 'content', 'width=device-width,initial-scale=1,maximum-scale=10' );
				});
			}
		}
	},

	toggleSearchControl = function() {

		var triggerBttn				= $('#search__trigger--mobile'),
			closeBttn				= $('#blog-search__close'),
			mobileMenuTriggerBttn	= $('#site-header__menu-open'),
			mobileMenuCloseBttn		= $('#mobile-nav__close'),
			searchLayer				= $('#blog-search'),
			mobileMenuLayer			= $('#site-header__site-navigation--mobile');

		triggerBttn.on( 'click', function( e ) {
			toggleSearch( searchLayer, e );
		});

		mobileMenuTriggerBttn.on( 'click', function( e ) {
			toggleSearch( mobileMenuLayer, e );
		});

		closeBttn.on( 'click', function( e ) {
			toggleSearch( searchLayer, e );
		});

		mobileMenuCloseBttn.on( 'click', function( e ) {
			toggleSearch( mobileMenuLayer, e );
		});

		$(document).keyup( function(e) {

			if ( ( e.keyCode == 27 ) && ( $('#blog-search').hasClass( 'open' ) ) ) {
				toggleSearch();
			}
		});
	},

	searchControl = function() {

		$postElement = $('<div>');
		postView.setElement( $postElement );

		$searchForm.on( 'submit', function(e) {
			e.preventDefault();

			// Assign the query to a variable
			searchQuery = $searchInput.val();

			// remove the focus
			$searchInput.trigger( 'blur' );

			filters = {
				'filter[s]'					: searchQuery,
				'filter[posts_per_page]'	: -1,
				'filter[post_type]'			: 'post'
			};

			postView.render( filters, searchQuery );

			// Add the search query to our location bar
			appRouter.navigate( '#/search/' + encodeURIComponent( searchQuery ), { trigger: true } );
		});
	},

	init = function() {
		toggleSearchControl();
		searchControl();

		if ( -1 < location.href.indexOf( '/blog' ) ) {

			// check to see if we have a saved search
			searchQuery = Backbone.history.getFragment();

			if ( 0 < searchQuery.length ) {

				searchQuery = decodeURIComponent( searchQuery.substring( searchQuery.indexOf( '/' ) + 1 ) );
				$body.addClass( 'search-saved' );
			}
		}
	};

	return {
		init:init
	};

}(jQuery, _, Backbone));

(function() {

	'use strict';

	// if ( -1 < location.href.indexOf( '/blog' ) ) {
		rp3.backbone.blogSearch.init();
	// }
}());
