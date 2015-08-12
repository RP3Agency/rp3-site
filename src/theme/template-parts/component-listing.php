<?php

$page_type = $post->post_name;

$recent_post = false;
$offset = 0;

/**
 * Check to see if we're going to feature the most recent post
 */
if ( get_field( 'display-featured-post' ) ) {

	/**
	 * Check to see if our most recent post is < 2wks old.
	 * If so, we'll have a "featured" post and then go from there.
	 */
	$recent = new WP_Query( array(
		'date_query'     => array(
			array(
				'after'         => '52 weeks ago'
			)
		),
		'posts_per_page' => 1,
		'category_name'  => $page_type,
		'post_type'      => 'post',
		'post_status'    => 'publish'
	) );

	if ( $recent->have_posts() ) {
		$offset = 1;
	}
}

if ( $paged == 0 ) {
	$paged = 1;
}

$posts_per_page = 6 * $paged;

$alt_query = new WP_Query( array(
	'post_type'         => 'post',
	'category_name'     => $post->post_name,
	'posts_per_page'    => $posts_per_page,
	'offset'            => $offset
) );
?>

<!-- Post Listing -->

<script>
var queryOffset = <?php echo $offset; ?>;
</script>

<?php if ( get_field( 'display-featured-post' ) ) : ?>

	<?php if ( $recent->have_posts() ) : while ( $recent->have_posts() ) : $recent->the_post(); ?>

		<section class="listing listing--recent">

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<div class="listing__thumbnail">

						<?php
						$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_small' );
						$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_small_2x' );

						$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_medium' );
						$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_medium_2x' );
						?>

						<picture>
							<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
							<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						</picture>

					</div>

				<?php endif; ?>

				<div class="listing__content">

					<h1 class="listing__headline"><?php the_title(); ?></h1>

					<?php if ( 'news' == $page_type ) : ?>

						<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

					<?php else: ?>

						<div class="listing__byline"><?php echo rp3_byline(); ?></div>

					<?php endif; ?>

					<div class="listing__excerpt">

						<?php echo the_excerpt(); ?>

					</div>

				</div>

			</a>

		</section>

	<?php endwhile; endif; wp_reset_query(); ?>

<?php endif; ?>

<?php if ( $alt_query->have_posts() ) : ?>

	<section id="listing" class="listing" data-paged="<?php echo esc_attr( $paged ); ?>">

		<?php while ( $alt_query->have_posts() ) : $alt_query->the_post(); ?>

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<div class="listing__thumbnail">

						<?php
						$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_small' );
						$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_small_2x' );

						$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_medium' );
						$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'four_three_medium_2x' );
						?>

						<picture>
							<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
							<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						</picture>

					</div>

				<?php endif; ?>

				<h1 class="listing__headline"><?php the_title(); ?></h1>

				<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

				<div class="listing__excerpt">

					<?php echo the_excerpt(); ?>

				</div>

			</a>

		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

<?php endif; wp_reset_query(); ?>


<div class="all-news-link">
	<a href="<?php echo esc_url( home_url( 'category/blog' ) ); ?>" id="view-more">View More Posts</a>
</div>


<!-- Underscore Templates -->

<script type="text/template" id="news-template">
<% _.each( posts, function( post ) { %>
	<div class="news-listing__article listing__article">
		<a href="<%= post.get( 'link' ) %>" class="block">

			<% if ( ( null !== post.get( 'featured_image' ) ) && ( post.get( 'featured_image' ).constructor !== Array ) && ( '' !== post.get( 'featured_image' ).source ) ) { %>
				<div class="blog-listing__thumbnail listing__thumbnail">
					<picture>
						<source srcset="<%= post.get( 'img_medium' ) %>, <%= post.get( 'img_medium_2x' ) %> 2x" media="( min-width: 20.0625em )">
						<source srcset="<%= post.get( 'img_small' ) %>, <%= post.get( 'img_small_2x' ) %> 2x">
						<img srcset="<%= post.get( 'img_small' ) %>, <%= post.get( 'img_small_2x' ) %> 2x" class="attachment-post-thumbnail wp-post-image">
					</picture>
				</div>
			<% } %>

			<h1 class="news-listing__headline listing__headline"><%= post.get( 'title' ) %></h1>

			<div class="news-listing__date listing__byline"><%= post.get( 'date' ) %></div>

			<div class="news-listing__excerpt listing__excerpt">
				<%= post.get( 'excerpt' ) %>
			</div>

		</a>
	</div>
<% }) %>
</script>
