<?php
/**
 * The template used for displaying content for a single case study
 *
 * @package RP3
 */

// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>

	<div class="case-study--single__entry-content entry-content">

		<header class="case-study__header">
			<h1 class="case-study__title"><?php the_title(); ?></h1>
			<div class="case-study__client">for <strong><?php the_field( 'client' ); ?></strong></div>
			<div class="case-study__tagline"><?php the_field( 'tagline' ); ?></div>
		</header>
		<!-- // .case-study__header -->

	</div>

	<?php if ( '' != get_field( 'hero_image' ) ) : ?>

	<?php echo rp3_full_bleed_hero_image( get_field( 'hero_image' ), array(
		'image_size'	=> 'case-study',
		'classes'		=> 'hero-image case-study-hero-image'
	) ); ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Think:</h2>

		<?php the_field( 'think_copy' ); ?>

	</div>


	<?php if ( have_rows( 'think_images' ) ) : ?>

		<?php while ( have_rows( 'think_images' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'think_image' ), array(
				'image_size'	=> 'case-study',
				'classes'		=> 'hero-image case-study-hero-image'
			) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Feel:</h2>

		<?php the_field( 'feel_copy' ); ?>

	</div>


	<?php if ( have_rows( 'feel_images' ) ) : ?>

		<?php while ( have_rows( 'feel_images' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'feel_image' ), array(
				'image_size'	=> 'case-study-tall',
				'classes'		=> 'hero-image case-study-hero-image-tall'
			) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Build:</h2>

		<?php the_field( 'build_copy' ); ?>

	</div>


	<?php if ( have_rows( 'build_images' ) ) : ?>

		<?php while ( have_rows( 'build_images' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'build_image' ), array(
			'image_size'	=> 'case-study',
				'classes'	=> 'hero-image case-study-hero-image'
			) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Results:</h2>

		<?php the_field( 'results_copy' ); ?>

	</div>


	<?php if ( have_rows( 'results_images' ) ) : ?>

		<?php while ( have_rows( 'results_images' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'results_image' ), array(
				'image_size'	=> 'case-study',
				'classes'		=> 'hero-image case-study-hero-image'
			) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<?php get_template_part( 'components/work', 'related-work' ); ?>

</article>
<!-- #post-## -->
