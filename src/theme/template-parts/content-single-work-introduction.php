<?php

// Get the required strings and alter the case as appropriate

$title = esc_html( get_the_title() );

if ( '' !== get_field( 'tagline' ) ) {

	$tagline = esc_html( strtolower( get_field( 'tagline' ) ) );
	$tagline = ucfirst( preg_replace( '/\.$/', '', $tagline ) );
	$tagline = $tagline . ' for <strong>' . esc_html( get_field( 'client' ) ) . '</strong>.';

} else {

	$tagline = 'For <strong>' . esc_html( get_field( 'client' ) ) . '</strong>.';

}
?>

<header class="work-single__introduction">

	<h1 class="work-single__title"><?php echo $title; ?></h1>

	<div class="work-single__client"><?php echo $tagline; ?></div>

</header>
