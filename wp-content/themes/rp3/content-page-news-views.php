<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

/**
 * Generate our query for this page
 * Todo: genericize this page, and insert the query via a shortcode
 */
$news = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'news',
	'posts_per_page'	=> 3
) );

$blog = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'blog',
	'posts_per_page'	=> 3
) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_content(); ?>

		</div>

	</div>
	<!-- .entry-content -->



	<!-- Search form -->
	<section class="search-form">

		<?php get_search_form( true ); ?>

	</section>
	<!-- // .search-form -->




	<!-- News Articles -->

	<?php if ( $news->have_posts() ) : ?>

	<section id="news-listing" class="news-listing">

		<?php while ( $news->have_posts() ) : $news->the_post(); ?>

			<div class="news-listing__article">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

					<h1 class="news-listing__headline"><?php the_title(); ?></h1>

					<div class="news-listing__date"><?php echo get_the_date(); ?></div>

					<div class="news-listing__excerpt equal-heights">

						<?php the_excerpt(); ?>

					</div>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="blog__thumbnail">

							<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

						</div>

					<?php endif; ?>

					<p class="link continue">Continue reading</p>

				</a>

			</div>

		<?php endwhile; ?>

	</section>
	<!-- // #news-listing -->

	<?php endif; wp_reset_query(); ?>


	<div class="all-news-link">
		<a href="<?php echo esc_url( home_url( 'news' ) ); ?>">View All News</a>
	</div>



	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_1' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_1' ), array(
			'image_size'	=> 'interstitial',
			'classes'		=> 'hero hero-image interstitial'
		) );
	endif; ?>



	<?php if ( '' != get_field( 'blog_intro_copy' ) ) : ?>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_field( 'blog_intro_copy' ); ?>

		</div>

	</div>
	<!-- .entry-content -->

	<?php endif; ?>



	<!-- Blog Posts -->

	<?php if ( $blog->have_posts() ) : ?>

	<section id="blog-listing" class="blog-listing">

		<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

			<div class="blog-listing__article">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

					<h1 class="blog-listing__headline"><?php the_title(); ?></h1>

					<div class="blog-listing__byline"><?php echo rp3_byline(); ?></div>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="blog__thumbnail">

							<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

						</div>

					<?php endif; ?>

					<div class="blog-listing__excerpt equal-heights">

						<?php the_excerpt(); ?>

					</div>

					<p class="link continue">Continue reading</p>

				</a>

			</div>


		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

	<?php endif; wp_reset_query(); ?>


	<div class="all-news-link">
		<a href="<?php echo esc_url( home_url( 'blog' ) ); ?>">View All Blog Posts</a>
	</div>



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
