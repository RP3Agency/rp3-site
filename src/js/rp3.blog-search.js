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

		render: function( filters ) {

			var that = this;

			// set up collection query filters
			filters = filters || {};

			var query = {

				data: filters,

				success: function( posts ) {

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

	/* ==========================================================================
	   Toggle Search Screen
	========================================================================== */

	toggleSearch = function() {

		var overlay				= $('#blog-search');

		if ( overlay.hasClass( 'open' ) ) {
			overlay.removeClass( 'open' );
			overlay.addClass( 'close' );

			if ( Modernizr.csstransitions ) {
				overlay.one( 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', function() {
					overlay.removeClass( 'close' );
				});
			}

		} else if ( ! overlay.hasClass( 'close' ) ) {
			overlay.addClass( 'open' );

			$searchInput.trigger( 'focus' );
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

			// remove the focus
			$searchInput.trigger( 'blur' );

			filters = {
				'filter[s]'					: $searchInput.val(),
				'filter[posts_per_page]'	: -1,
				'filter[post_type]'			: 'post'
			};

			$searchSuggestions.fadeOut( 200, function() {
				$(this).remove();

				postView.render( filters );

				$searchResults.append( $postElement ).addClass( 'open' );
			});
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
