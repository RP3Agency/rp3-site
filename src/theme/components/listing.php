<?php
if ( $paged == 0 ) {
	$paged = 1;
}

$posts_per_page = 6 * $paged;

$alt_query = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> $post->post_name,
	'posts_per_page'	=> $posts_per_page
) );
?>

<!-- Post Listing -->

<?php if ( $alt_query->have_posts() ) : ?>

	<section id="blog-listing" class="blog-listing listing" data-paged="<?php echo esc_attr( $paged ); ?>">

		<?php $counter = 0; while ( $alt_query->have_posts() ) : $alt_query->the_post(); ?>

			<?php $article_class = 'block blog-listing__article listing__article';?>

			<?php if ( 0 == $counter ) : ?>

				<?php $article_class .= ' first'; ?>

			<?php endif; ?>

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="<?php echo esc_attr( $article_class ); ?>">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<div class="blog-listing__thumbnail listing__thumbnail">

						<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

					</div>

				<?php endif; ?>

				<h1 class="blog-listing__headline listing__headline"><?php the_title(); ?></h1>

				<div class="blog-listing__byline listing__byline"><?php echo rp3_byline(); ?></div>

				<div class="blog-listing__excerpt listing__excerpt">

					<?php echo the_excerpt(); ?>

				</div>

			</a>

		<?php $counter++; endwhile; ?>

	</section>
	<!-- // #blog-listing -->

<?php endif; wp_reset_query(); ?>


<div class="all-news-link">
	<a href="<?php echo esc_url( home_url( 'category/blog' ) ); ?>" id="view-more">View More Posts</a>
</div>


<!-- Underscore Templates -->

<script type="text/template" id="blog-template">
<% _.each( posts, function( post ) { %>
	<div class="blog-listing__article listing__article">
		<a href="<%= post.get( 'link' ) %>" class="block">

			<% if ( ( null !== post.get( 'featured_image' ) ) && ( post.get( 'featured_image' ).constructor !== Array ) && ( '' !== post.get( 'featured_image' ).source ) ) { %>
				<div class="blog-listing__thumbnail listing__thumbnail">
					<img src="<%= post.get( 'featured_image' ).source %>" class="attachment-post-thumbnail wp-post-image">
				</div>
			<% } %>

			<h1 class="blog-listing__headline listing__headline"><%= post.get( 'title' ) %></h1>

			<div class="blog-listing__byline listing__byline"><%= post.get( 'date' ) %>.</div>

			<div class="blog-listing__excerpt listing__excerpt">
				<%= post.get( 'excerpt' ) %>
			</div>

		</a>
	</div>
<% }) %>
</script>

<script type="text/template" id="news-template">
<% _.each( posts, function( post ) { %>
	<div class="news-listing__article listing__article">
		<a href="<%= post.get( 'link' ) %>" class="block">

			<% if ( ( null !== post.get( 'featured_image' ) ) && ( post.get( 'featured_image' ).length > 0 ) ) { %>
				<div class="blog-listing__thumbnail">
					<img src="<%= post.get( 'featured_image' ).source %>" class="attachment-post-thumbnail wp-post-image">
				</div>
			<% } %>

			<h1 class="news-listing__headline listing__headline"><%= post.get( 'title' ) %></h1>

			<div class="news-listing__date listing__date"><%= post.get( 'date' ) %></div>

			<div class="news-listing__excerpt listing__excerpt">
				<%= post.get( 'excerpt' ) %>
			</div>

		</a>
	</div>
<% }) %>
</script>
