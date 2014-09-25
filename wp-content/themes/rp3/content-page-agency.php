<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- .entry-content -->

	<div class="page__hero-image hero-image">
	<?php
	if ( is_page( 'agency' ) && ( get_the_post_thumbnail() !== '' ) ) {
		echo rp3_picture_element( get_post_thumbnail_id(), 'home-page-hero', '' );
	}
	?>
	</div>

	<?php get_template_part( 'components/leadership' ); ?>

	<div class="page__hero-image hero-image">
	<?php
	if ( is_page( 'agency' ) && ( get_the_post_thumbnail() !== '' ) ) {
		echo rp3_picture_element( get_post_thumbnail_id(), 'home-page-hero', '' );
	}
	?>
	</div>

	<?php get_template_part( 'components/clients' ); ?>

</article>
<!-- #post-## -->
