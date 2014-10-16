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

// Output the hero images
function rp3_case_study_hero_images( $field, $subfield, $tall = false ) {

	$rows = get_field( $field );

	if ( 0 < sizeof( $rows ) ) {

		$image_size = 'case-study';
		$classes = 'hero-image case-study-hero-image';

		if ( $tall ) {
			$image_size .= '-tall';
			$classes .= '-tall';
		}

		foreach ( $rows as $row ) {
			echo rp3_full_bleed_hero_image( $row[$subfield], array(
				'image_size'	=> $image_size,
				'classes'		=> $classes
			) );
		}
	}
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>

	<!-- Introduction -->

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


	<!-- Think -->


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Think:</h2>

		<?php the_field( 'think_copy' ); ?>

	</div>


	<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>


	<!-- Feel -->


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Feel:</h2>

		<?php the_field( 'feel_copy' ); ?>

	</div>


	<?php rp3_case_study_hero_images( 'feel_images', 'feel_image', true ); ?>


	<!-- Build -->


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Build:</h2>

		<?php the_field( 'build_copy' ); ?>

	</div>


	<?php rp3_case_study_hero_images( 'build_images', 'build_image' ); ?>


	<!-- Results -->


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Results:</h2>

		<?php the_field( 'results_copy' ); ?>

	</div>


	<?php rp3_case_study_hero_images( 'results_images', 'results_image' ); ?>


	<!-- Related Work -->


	<?php get_template_part( 'components/work', 'related-work' ); ?>

</article>
<!-- #post-## -->
