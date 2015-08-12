<?php
/**
 * The template used for displaying content for a single work item
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'work-single' ); ?>>

	<!-- Introduction -->

	<?php get_template_part( 'template-parts/content', 'single-work-introduction' ); ?>

	<?php

	/**
	 * Flexible Content Layouts
	 */

	if ( have_rows( 'panels' ) ) {

		while ( have_rows( 'panels' ) ) {

			the_row();

			get_template_part( 'panels/' . get_row_layout() );
		}
	}
	?>

</article>
<!-- #post-## -->

<!-- Related Work -->

<?php get_template_part( 'template-parts/content', 'single-work-related' ); ?>
