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

					<div class="news-listing__excerpt">

						<?php the_excerpt(); ?>

					</div>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

					<?php endif; ?>

					<p class="link continue">Continue reading</p>

				</a>

			</div>

		<?php endwhile; ?>

	</section>
	<!-- // #news-listing -->

	<?php endif; wp_reset_query(); ?>



	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_1' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_1' ), '', '', 'sub-page-hero' );
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

						<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

					<?php endif; ?>

					<div class="blog-listing__excerpt">

						<?php the_excerpt(); ?>

					</div>

					<p class="link continue">Continue reading</p>

				</a>

			</div>


		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

	<?php endif; wp_reset_query(); ?>


	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_2' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_2' ), '', '', 'sub-page-hero' );
	endif; ?>



	<!-- Related Content -->

	<?php if ( is_active_sidebar( 'blog-archive' ) ) : ?>

	<div id="blog-archive-widget-area" class="widget-area blog-archive-widget-area" role="complementary">

		<?php dynamic_sidebar( 'blog-archive' ); ?>

	</div>

	<?php endif; ?>

</article>
<!-- #post-## -->





<?php /*

	<section class="row articles">

		<div class="blog-column">

			<?php $counter = 0; if ( $blog->have_posts() ) : while ( $blog->have_posts() ) : $blog->the_post(); ?>

			<?php if ( $counter !== 3 ) : ?>

			<div class="row">

			<?php endif; ?>

				<article class="blog">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>">

						<header class="entry-meta">
							<div class="entry-category">Blog</div>

							<?php if ( $counter < 2 ) : ?>
								<div class="entry-featured-image"><?php the_post_thumbnail('thumb'); ?></div>
							<?php endif; ?>

							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header>

						<?php the_excerpt(); ?>

						<footer class="entry-meta">
							<div><?php echo rp3_byline( 'blog', 'archive' ); ?></div>
						</footer>

					</a>

				</article>
				<!-- // .blog -->

			<?php if ( $counter !== 2 ) : ?>

			</div>
			<!-- // .row -->

			<?php endif; ?>
		
			<?php $counter++; endwhile; endif; wp_reset_query(); ?>

		</div>
		<!-- // .blog -->

		<div class="news-twitter-column">

			<?php $counter = 0; if ( $news->have_posts() ) : while ( $news->have_posts() ) : $news->the_post(); ?>

			<article class="news">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>">

					<header class="entry-meta">
						<div class="entry-category">News</div>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>

					<?php if ( $counter < 2 ) : ?>

					<?php the_excerpt(); ?>

					<?php endif; ?>

					<footer class="entry-meta">
						<div><?php echo get_the_date(); ?></div>
					</footer>

				</a>

			</article>

			<?php $counter++; endwhile; endif; wp_reset_query(); ?>

		</div>
		<!-- // .news -->

	</section>
	<!-- // .articles -->
*/ ?>
