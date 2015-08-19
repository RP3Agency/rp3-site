<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'news' ); ?>>

	<div class="news__wrapper">

		<div class="entry-content">

			<?php the_content(); ?>

		</div>
		<!-- .entry-content -->

		<?php get_template_part( 'template-parts/component', 'listing' ); ?>

	</div>

</article>
<!-- #post-## -->
