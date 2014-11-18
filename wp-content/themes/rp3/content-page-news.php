<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

$news = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'news',
	'posts_per_page'	=> 6
) );
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




	<!-- News Articles -->

	<?php if ( $news->have_posts() ) : ?>

	<section id="news-listing" class="news-listing">

		<?php while ( $news->have_posts() ) : $news->the_post(); ?>

			<div class="news-listing__article">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

					<h1 class="news-listing__headline"><?php the_title(); ?></h1>

					<div class="news-listing__date"><?php echo get_the_date(); ?></div>

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="blog__thumbnail">

							<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

						</div>

					<?php endif; ?>

					<div class="news-listing__excerpt equal-heights">

						<?php the_excerpt(); ?>

					</div>

					<p class="link continue">Continue reading</p>

				</a>

			</div>

		<?php endwhile; ?>

	</section>
	<!-- // #news-listing -->

	<?php endif; wp_reset_query(); ?>


	<div class="all-news-link">
		<a href="<?php echo esc_url( home_url( 'category/news' ) ); ?>">View All News</a>
	</div>

</article>
<!-- #post-## -->
