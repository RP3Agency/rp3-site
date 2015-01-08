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
	var $hero = $('#home-work .hero');

	if ( $hero.length > 0 ) {
		$hero.each( function(i) {

			var j = i + 1;

			var targetEl		= '#home-work .hero:nth-child(' + j + ')',
				targetClass		= 'active active-' + j;

			new ScrollScene({
				triggerElement:		"#home-work",
				reverse:			false
			})
			.setClassToggle( targetEl, targetClass )
			.addTo( controller );
		});

		// Make sure our container has the proper height
		$("#home-work").height( 600 * $hero.length - $hero.length );
	}

	// new ScrollScene({
	// 		triggerElement: "#home-work .hero",
	// 		reverse: false
	// 	})
	// 	.setClassToggle( "#home-work .hero", "active" )
	// 	.addTo( controller );

}(jQuery));
