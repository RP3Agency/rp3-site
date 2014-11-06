/* jshint browser:true, jquery:true */

var rp3 = (function($) {

	'use strict';

	var

	/**
	 * Toggle the "visibility" class of the mobile nav to trigger the CSS fade in and fade out
	 */
	showMainNav = function() {
		var $mobileNav = $('#mobile-nav'),
			$menuClose = $("#menu-close");
		$mobileNav.addClass('visible');
	},
	hideMainNav = function() {
		var $mobileNav = $('#mobile-nav');

		$mobileNav.css('visibility', 'visible').removeClass('visible');

		setTimeout( function() {
			$mobileNav.removeAttr('style');
		}, 300);
	},
	toggleNavigation = function() {
		var $menuOpen = $("#menu-open"),
			$menuClose = $("#menu-close");

		$menuOpen.on('click', function(e) {
			e.preventDefault();
			showMainNav();
		});

		$menuClose.on('click', function(e) {
			e.preventDefault();
			hideMainNav();
		});
	},


	/**
	 * Equalize the height of elements of a given selector
	 */
	getMaxHeight = function( elements ) {
		var maxHeight = 0;

		for ( var i = 0; i < elements.length; i++ ) {
			if ( $(elements[i]).height() > maxHeight ) {
				maxHeight = $(elements[i]).height();
			}
		}

		return maxHeight;
	},
	equalizeHeights = function() {
		var maxHeight = 0,
			$relatedWorkLabel = $('.related-work__label'),
			$equalHeights = $('.equal-heights');

		if ( $relatedWorkLabel.length > 0 ) {
			$relatedWorkLabel.removeAttr('style');
			maxHeight = getMaxHeight( $relatedWorkLabel );
			$relatedWorkLabel.height(maxHeight);
		}

		if ( $equalHeights.length > 0 ) {
			if ( window.matchMedia( '(min-width: 600px)' ).matches ) {
				$equalHeights.removeAttr('style');
				maxHeight = getMaxHeight( $equalHeights );
				$equalHeights.height(maxHeight);
			} else {
				$equalHeights.css('height', 'auto');
			}
		}
	},

	videoPause = function(player, url, action, value) {
		var data = {
			method: action
		};

		if (value) {
			data.value = value;
		}

		var message = JSON.stringify(data);
		player[0].contentWindow.postMessage(data, url);
	},
	videoToggle = function() {
		var $videoModal = $('#video__modal'),
			$videoTrigger = $('#video__trigger'),
			$modalClose = $('#modal-close');

		if ( 0 < $videoModal.length ) {

			// Vimeo API
			var player = $('iframe');

			var url = window.location.protocol + player.attr('src').split('?')[0];

			$videoTrigger.on( 'click', function(e) {
				e.preventDefault();
				$videoModal.addClass('visible');
			});

			$modalClose.on( 'click', function(e) {
				e.preventDefault();
				
				// Stop playback
				videoPause(player, url, 'pause');
				$videoModal.css('visibility', 'visible').removeClass('visible');
				setTimeout( function() {
					$videoModal.removeAttr('style');
				}, 200);
			});
		}
	},

	init = function() {
		toggleNavigation();
		equalizeHeights();
		videoToggle();
		
		$(window).on( 'scroll', function() {
		});

		$(window).on( 'resize', function() {
			equalizeHeights();
		});
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());


/**
 * Accelerometer Experiment
 */

// jQuery(document).ready(function($) {

// 	var has_touch = 'ontouchstart' in document.documentElement;
// 	var accX, accY, width, height, xA, yA, movement;

// 	if(has_touch) {

// 		// (resize = function() {

// 		// 	height = $(window).height();
// 		// 	width = $(window).width();

// 		// 	$('#home-work a').width(width).height(height);


// 		// })();

// 		window.ondevicemotion = function(event) {

// 			accX = Math.round(event.accelerationIncludingGravity.x*10) / 10;
// 			accY = Math.round(event.accelerationIncludingGravity.y*10) / 10;

// 			movement = 10;

// 			xA = -(accX / 10) * movement;
// 			yA = -(accY / 10) * movement;


// 			run();

// 		}
// 	}
	
// 	function run() {

// 		$('#home-work picture').css({'left' : xA+'px', 'top' : yA+'px',
// 			'box-shadow' : ''+xA+'px '+yA+'px 10px rgba(0,0,0,0.3)'});

// 		bX = -(xA*2)-100;
// 		bY = -(yA*2)-300;

// 		// $('#home-work a').css({'background-position' : bX+'px '+bY+'px'});

// 	}
	
// }(jQuery));


/**
 * Google maps
 */
function initialize() {

	if ( '' !== document.getElementById('contact__map') ) {

		var myLatLng = new google.maps.LatLng(38.9827398,-77.0940005);
		var mapOptions = {
			center: myLatLng,
			zoom: 11,
			draggable: false,
			scrollwheel: false,
			streetViewControl: false,
			mapTypeControl: false,
			panControl: false,
			styles: [
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#333739"
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						}
					]
				},
				{
					"featureType": "poi",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						},
						{
							"lightness": -7
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						},
						{
							"lightness": -28
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						},
						{
							"visibility": "on"
						},
						{
							"lightness": -15
						},
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						},
						{
							"lightness": -18
						}
					]
				},
				{
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#ffffff"
						}
					]
				},
				{
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						},
						{
							"lightness": -34
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry",
					"stylers": [
						{
							"visibility": "on"
						},
						{
							"color": "#333739"
						},
						{
							"weight": 0.8
						}
					]
				},
				{
					"featureType": "poi.park",
					"stylers": [
						{
							// "color": "#2ecc71"
							"color": "#2e91cc"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "labels",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#333739"
						},
						{
							"weight": 0.3
						},
						{
							"lightness": 10
						}
					]
				}
			],
		};
		var map = new google.maps.Map(document.getElementById('contact__map'), mapOptions);

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'RP3 Agency'
		});
	}
}
if (typeof google !== 'undefined') {
	google.maps.event.addDomListener(window, 'load', initialize);
}
