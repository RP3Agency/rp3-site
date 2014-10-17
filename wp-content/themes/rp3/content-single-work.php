<?php
/**
 * The template used for displaying content for a single mini study
 *
 * @package RP3
 */

// Get the list of related tags in an array
// $terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
// foreach ( $terms as $term ) {
// 	$work_tags[] = $term->name;
// }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mini-study' ); ?>>

	<!-- Introduction -->

	<?php get_template_part( 'components/work/introduction' ); ?>


	<!-- Main Copy -->

	<?php get_template_part( 'components/work/main-copy' ); ?>


	<!-- Secondary Images -->

	<?php if ( have_rows( 'mini_study_images' ) ) : ?>

		<?php if ( 'stacked' == get_field( 'layout' ) ) : ?>

			<?php get_template_part( 'components/work/images-stacked' ); ?>

		<?php elseif ( 'grid' == get_field( 'layout' ) ) : ?>

			<?php get_template_part( 'components/work/images-grid' ); ?>

		<?php endif; ?>

	<?php endif; ?>


	<!-- Related Work -->

	<?php get_template_part( 'components/work/related-work' ); ?>

</article>
<!-- #post-## -->
