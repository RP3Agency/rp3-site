<?php
if ( 'true' == get_field( 'case_study' ) ) {
	$class = esc_attr( 'case-study-introduction' );
} else {
	$class = esc_attr( 'work-introduction' );
}
?>

<div class="<?php echo $class; ?>__entry-content entry-content">

	<header class="<?php echo $class; ?>__header">
		<h1 class="<?php echo $class; ?>__title"><?php the_title(); ?></h1>

		<?php if ( ( 'true' == get_field( 'case_study' ) ) && ( '' != get_field( 'client' ) ) ) : ?>

			<div class="<?php echo $class; ?>__client">for <strong><?php the_field( 'client' ); ?></strong></div>

		<?php endif; ?>

		<?php if ( ( 'true' == get_field( 'case_study' ) ) && ( '' != get_field( 'tagline' ) ) ) : ?>

			<div class="<?php echo $class; ?>__tagline"><?php the_field( 'tagline' ); ?></div>

		<?php endif; ?>

	</header>
	<!-- // .<?php echo $class; ?>__header -->

</div>


<?php if ( '' != get_field( 'hero_image' ) ) : ?>

<?php echo rp3_full_bleed_hero_image( get_field( 'hero_image' ), array(
	'image_size'	=> 'case-study',
	'classes'		=> 'hero-image ' . $class . '-hero-image case-study-hero-image'
) ); ?>

<?php endif; ?>
