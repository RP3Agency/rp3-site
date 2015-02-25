<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

if ( $paged == 0 ) {
	$paged = 1;
}

$posts_per_page = 6 * $paged;

$news = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'news',
	'posts_per_page'	=> $posts_per_page
) );


?>

<script type="text/template" id="news-template">
<% _.each( posts, function( post ) { %>
	<div class="news-listing__article">
		<a href="<%= post.get( 'link' ) %>" class="block">
			<h1 class="news-listing__headline"><%= post.get( 'title' ) %></h1>
			<div class="news-listing__date"><%= post.get( 'date' ) %></div>

			<% if ( post.get( 'featured_image' ) ) { %>
				<div class="blog__thumbnail">
					<img src="<%= post.get( 'featured_image' ).source %>" class="attachment-post-thumbnail wp-post-image">
				</div>
			<% } %>

			<div class="news-listing__excerpt equal-heights">
				<%= post.get( 'excerpt' ) %>
			</div>

			<p class="link continue">Continue reading</p>

		</a>
	</div>
<% }) %>
</script>

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

	<section id="news-listing" class="news-listing" data-paged="<?php echo esc_attr( $paged ); ?>">

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
		<a href="<?php echo esc_url( home_url( 'category/news' ) ); ?>" id="view-more">View More News</a>
	</div>

</article>
<!-- #post-## -->
