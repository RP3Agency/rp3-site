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
