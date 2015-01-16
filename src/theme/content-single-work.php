<?php
/**
 * The template used for displaying content for a single work item
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mini-study' ); ?>>

	<!-- Introduction -->

	<?php get_template_part( 'components/work/introduction' ); ?>

	<?php

	/**
	 * Flexible Content Layouts
	 */

	if ( have_rows( 'panels' ) ) {

		while ( have_rows( 'panels' ) ) {

			the_row();

			echo '<!-- Layout: ' . get_row_layout() . ' -->';

			get_template_part( 'panels/' . get_row_layout() );
		}
	}
	?>

	<!-- Related Work -->

	<?php get_template_part( 'components/work/related-work' ); ?>

</article>
<!-- #post-## -->
