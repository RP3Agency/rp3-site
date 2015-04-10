<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_content(); ?>

		</div>

	</div>
	<!-- .entry-content -->



	<?php /*
	<!-- Search form -->
	<section class="search-form">

		<?php get_search_form( true ); ?>

	</section>
	<!-- // .search-form -->
	*/ ?>



	<?php get_template_part( 'components/listing' ); ?>



	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_2' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_2' ), array(
			'image_size'	=> 'sub-page-hero',
		) );
	endif; ?>



	<!-- Related Content -->

	<?php if ( is_active_sidebar( 'blog-archive' ) ) : ?>

		<div id="blog-archive-widget-area" class="widget-area blog-archive-widget-area" role="complementary">

			<?php dynamic_sidebar( 'blog-archive' ); ?>

		</div>

	<?php endif; ?>

</article>
<!-- #post-## -->
