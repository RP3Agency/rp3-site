/**
 * Google maps
 */

/** Tell JSHint that we know about the "google" object;
	it gets defined by an externally-loaded google maps script */

/* global google */

(function() {

	var marker;

	function initialize() {

		if ( '' !== document.getElementById('contact__map') ) {

			var myLatLng = new google.maps.LatLng(38.9827398, -77.0940005),
				blue = '#2e91cc',
				mapOptions = {
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
									"color": blue
								}
							]
						},
						{
							"featureType": "poi",
							"stylers": [
								{
									"color": blue
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
									"color": blue
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
									"color": blue
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
									"color": blue
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
									"color": blue
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
									"color": blue
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
				},

				map = new google.maps.Map(document.getElementById('contact__map'), mapOptions);

				marker = new google.maps.Marker({
					position: myLatLng,
					map: map,
					title: 'RP3 Agency'
				});
		}
	}

	if (typeof google !== 'undefined') {
		google.maps.event.addDomListener(window, 'load', initialize);
	}

})();
