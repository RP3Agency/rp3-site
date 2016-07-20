// Define our "rp3" object, if not already defined
if ( rp3 === undefined ) { var rp3 = {}; }

rp3.wpapi = ( function( $, wp ) {

	var

	// Private settings
	_settings,


	// Models
	PostModel = wp.api.models.Post.extend({

		// define additional default attribute values
		defaults: {
			'four_three_small':			null,
			'four_three_small_2x':		null,
			'four_three_medium':		null,
			'four_three_medium_2x':		null,
			'eight_three_large':		null,
			'eight_three_large_2x':		null,
			'four_three_thumb':			null,
			'link_white_paper':			false
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
			if( _.contains( [ 'read', 'option' ], method ) ) {
				return wp.api.models.Post.prototype.sync.apply(this, arguments);
			}
		},

		// extend Post model serialization
		toJSON: function( ) {

			// get base serialized post
			var attributes = wp.api.models.Post.prototype.toJSON.apply(this, arguments);

			// serialize author attribute directly from related Author model instance
			attributes.author = this.attributes.author;

			return attributes;
		},

		// Date conversion into plain English
		longDate: function( ) {
			var months = [ 'January', 'February', 'March', 'April',	'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'	],
				date = this.get( 'date' );
			return months[ date.getMonth() ] + ' ' + date.getDate() + ', ' + date.getFullYear();
		},

		// Generate responsive image at given size from featured image
		responsiveImage: function( size ) {

			// If featuredImage is null, return the greatest hits image (I love that we're calling it that. ;-)
			if ( ! this.has( 'featured_media' ) ) {
				return greatestHitsImage( size, this.get( 'type' ) );
			}

			var featuredImage = this.get( 'featured_media' );

			// If featuredImage has error_data as a property, or doesn't have an ID property, return
			// the "greatest hits" image.
			if ( featuredImage.hasOwnProperty( 'error_data' ) || ! featuredImage ) {
				return greatestHitsImage( size, this.get( 'type' ) );
			}

			// If featuredImage has the property ID, figure out the appropriate size to return
			if ( featuredImage.attachment_meta.sizes.hasOwnProperty( size ) && featuredImage.attachment_meta.sizes[size].hasOwnProperty( 'url' ) ) {
				return featuredImage.attachment_meta.sizes[size].url;
			} else {
				return featuredImage.source;
			}
		}
	}),


	// "Greatest Hits" image (default image for old posts)
	greatestHitsImage = function( size, type ) {

		var defaultImage;

		if ( 'post' === type ) {
			defaultImage = 'https://media.rp3agency.com/wp-content/uploads/2015/09/17090506/GENERIC-BLOG-HEADER';
		} else {
			return false;
		}

		switch ( size ) {

			case 'four_three_small':
				return defaultImage + '-320x240.jpg';

			case 'four_three_small_2x':
				return defaultImage + '-640x480.jpg';

			case 'four_three_medium':
				return defaultImage + '-600x450.jpg';

			case 'four_three_medium_2x':
				return defaultImage + '-1200x900.jpg';

			case 'eight_three_large':
				return defaultImage + '-1200x450.jpg';

			case 'eight_three_large_2x':
				return defaultImage + '.jpg';

			case 'four_three_thumb':
				return defaultImage + '-160x120.jpg';

			default:
				return false;
		}
	},


	// Collections
	PostCollection = wp.api.collections.Posts.extend({

		model: PostModel,
	}),


	// Read-only getter for Backbone settings
	getSetting = function( setting ) {

		return _settings.result( setting );
	},


	init = function() {

		_settings = _( $('[data-backbone]').data('backbone') );
	};

	return {

		init : init,
		get : getSetting,
		models : {
			Post : PostModel
		},
		collections : {
			Posts : PostCollection
		}
	};

}( jQuery, wp ) );




(function($) {
	'use strict';

	if ( 0 < $('[data-backbone]').length ) {

		// Initialize the API
		wp.api.init();

		// Initialize _our usage_ of the API
		wp.api.loadPromise.done( function() {

			rp3.wpapi.init();
		});
	}

}(jQuery));
