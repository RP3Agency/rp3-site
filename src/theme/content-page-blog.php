<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content component component--padded">

		<div class="entry-content__container">

			<?php the_content(); ?>

		</div>

	</div>
	<!-- .entry-content -->

	<?php get_template_part( 'components/listing' ); ?>

	<!-- Related Content -->

	<?php if ( is_active_sidebar( 'blog-archive' ) ) : ?>

		<div id="blog-archive-widget-area" class="widget-area blog-archive-widget-area" role="complementary">

			<div class="blog-archive-widget-area__container component component--padded">

				<?php dynamic_sidebar( 'blog-archive' ); ?>

			</div>

		</div>

	<?php endif; ?>

</article>
<!-- #post-## -->
