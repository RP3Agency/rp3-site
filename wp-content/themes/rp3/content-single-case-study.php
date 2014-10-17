<?php
/**
 * The template used for displaying content for a single case study
 *
 * @package RP3
 */

// Get the list of related tags in an array
// $terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
// foreach ( $terms as $term ) {
// 	$work_tags[] = $term->name;
// }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>

	<!-- Introduction -->

	<?php get_template_part( 'components/work/introduction' ); ?>


	<!-- Think -->

	<?php get_template_part( 'components/work/think' ); ?>


	<!-- Feel -->

	<?php get_template_part( 'components/work/feel' ); ?>


	<!-- Build -->

	<?php get_template_part( 'components/work/build' ); ?>


	<!-- Results -->

	<?php get_template_part( 'components/work/results' ); ?>


	<!-- Related Work -->

	<?php get_template_part( 'components/work/related-work' ); ?>

</article>
<!-- #post-## -->
