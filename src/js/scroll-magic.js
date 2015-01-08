jQuery(document).ready( function($) {

	// Get the viewport height so we can set our offset to 50%
	var height = $(window).outerHeight();
	height = Math.floor( height / 2 );

	// init controller
	var controller = new ScrollMagic({
		globalSceneOptions: {
			offset: 0
		}
	});

	// build scenes
	new ScrollScene({
			triggerElement: "#home-work",
			reverse: false
		})
		.setClassToggle( "#home-work .hero:first-child", "active" )
		.addTo( controller );

}(jQuery));
