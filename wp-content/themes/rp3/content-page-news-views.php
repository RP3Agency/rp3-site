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
	'posts_per_page'	=> 4
) );

$blog = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'blog',
	'posts_per_page'	=> 5
) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

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

</article>
<!-- #post-## -->
