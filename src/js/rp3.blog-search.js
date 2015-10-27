/* global rp3:true */

// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.backbone.blogSearch = (function($, _, Backbone) {

	var

	$searchSuggestions = $('#blog-search__suggestions'),
	$searchForm = $('#search-form'),
	$searchResults = $('#blog-search__results'),
	$searchResultsTemplate = $('#blog-search__results__template'),
	$searchInput = $('input[name="s"]'),
	filters,

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

					/** Store the query string by appending it to the end of the link */

					_.each( posts.models, function( post ) {
						post.attributes.link = post.attributes.link + '/#/search/' + encodeURIComponent( searchQuery );
					});

					var template = _.template( $searchResultsTemplate.html() );

					that.$el.html( template( { posts: posts.toJSON() } ) );
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
		},

		search: function( searchQuery ) {
			
			// Do something awesome

		}
	}),

	appRouter = new AppRouter(),

	/* ==========================================================================
	   Toggle Search Screen
	========================================================================== */

	toggleSearch = function() {

		var $overlay	= $('#blog-search'),
			$body		= $('body');

		if ( $overlay.hasClass( 'open' ) ) {
			$body.removeClass( 'search-open' );
			$overlay.removeClass( 'open' );
			$overlay.addClass( 'close' );

			if ( Modernizr.csstransitions ) {
				$overlay.one( 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
					$overlay.removeClass( 'close' );
				});
			}

		} else if ( ! $overlay.hasClass( 'close' ) ) {
			$overlay.addClass( 'open' );
			$body.addClass( 'search-open' );

			if ( ! Modernizr.touchevents ) {
				$searchInput.trigger( 'focus' );
			}
		}
	},

	toggleSearchControl = function() {

		var triggerBttn			= $('#search__trigger--mobile'),
			closeBttn			= $('#blog-search__close');

		triggerBttn.on( 'click', function() {
			toggleSearch();
		});
		closeBttn.on( 'click', function() {
			toggleSearch();
		});
	},

	searchControl = function() {

		var $postElement;

		$postElement = $('<div>');
		postView.setElement( $postElement );

		$searchForm.on( 'submit', function(e) {
			e.preventDefault();

			// Assign the query to a variable
			var searchQuery = $searchInput.val();

			// remove the focus
			$searchInput.trigger( 'blur' );

			filters = {
				'filter[s]'					: searchQuery,
				'filter[posts_per_page]'	: -1,
				'filter[post_type]'			: 'post'
			};

			$searchSuggestions.fadeOut( 200, function() {
				$(this).remove();

				postView.render( filters, searchQuery );

				$searchResults.append( $postElement ).addClass( 'open' );
			});

			// Add the search query to our location bar
			appRouter.navigate( 'search/' + encodeURIComponent( searchQuery ), { trigger: true } );
		});
	},

	init = function() {
		toggleSearchControl();
		searchControl();
	};

	return {
		init:init
	};

}(jQuery, _, Backbone));

(function() {

	'use strict';

	if ( -1 < location.href.indexOf( '/blog' ) ) {
		rp3.backbone.blogSearch.init();
	}
}());
