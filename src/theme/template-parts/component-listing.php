<?php

/* ==========================================================================
   Get posts based on post type and taxonomy
   ========================================================================== */

if ( '' !== get_field( 'post_type' ) ) {

	$listing_args = array(
		'post_type'			=> get_field( 'post_type' ),
		'post_status'		=> 'publish',
	);

	// Figure out which taxonomies we're looking for

	$tax_query = array();

	// Tags

	$tags = get_field( 'tags' );

	if ( ! empty( $tags ) ) {
		$listing_args['tag__in'] = $tags;
	}

	// News Categories

	$news_categories = get_field( 'news_categories' );

	if ( ! empty( $news_categories ) ) {
		$tax_name = 'rp3_tax_news_categories';
		$tax_field = 'term_id';
		$tax_terms = $news_categories;

		$tax_query[] = array(
			'taxonomy'	=> $tax_name,
			'field'		=> $tax_field,
			'terms'		=> $tax_terms
		);
	}

	// Industries

	$industries = get_field( 'industries' );

	if ( ! empty( $industries ) ) {
		$tax_name = 'rp3_tax_industries';
		$tax_field = 'term_id';
		$tax_terms = $industries;

		$tax_query[] = array(
			'taxonomy'	=> $tax_name,
			'field'		=> $tax_field,
			'terms'		=> $tax_terms
		);
	}

	// Services

	$services = get_field( 'services' );

	if ( ! empty( $services ) ) {
		$tax_name = 'rp3_tax_services';
		$tax_field = 'term_id';
		$tax_terms = $services;

		$tax_query[] = array(
			'taxonomy'	=> $tax_name,
			'field'		=> $tax_field,
			'terms'		=> $tax_terms
		);
	}

	// Create the taxonomy query, if applicable

	if ( ! empty( $tax_query ) ) {
		$tax_query['relation'] = 'AND';
		$listing_args['tax_query'] = $tax_query;
	}

	// Figure out if we need to display a recent post as "featured"
	// (Only if the page is set to display a recent featured post
	// AND there is a post that is < 2 weeks old.)

	$recent_post = false;
	$page_size = 6;
	$current_page = $paged ?: 1;
	$listing_args['posts_per_page'] = ( $page_size * $current_page );

	if ( get_field( 'display-featured-post' ) ) {

		/**
		 * Check to see if our most recent post is < 2wks old.
		 * If so, we'll have a "featured" post and then go from there.
		 */
		$recent = new WP_Query( array(
			'date_query'     => array(
				array(
					'after'         => '2 weeks ago'
				)
			),
			'posts_per_page' => 1,
			'post_type'      => get_field( 'post_type' ),
			'post_status'    => 'publish'
		) );

		if ( $recent->have_posts() ) {
			$recent_post = true;
			$listing_args['post__not_in'] = array( $recent->posts[0]->ID );

			// echo "<pre>";
			// print_r($recent->posts);
			// die();
		}
	}

	// Modify our listing query, if needed, and run that

	$listing = new WP_Query( $listing_args );

	$post_ids = array();

	$post_type = get_field( 'post_type' );
}
?>

<!-- Post Listing -->

<section class="listing">

	<?php if ( get_field( 'display-featured-post' ) ) : ?>

		<?php if ( $recent->have_posts() ) : while ( $recent->have_posts() ) : $recent->the_post(); ?>

			<?php $post_ids[] = get_the_ID(); ?>

			<div class="listing__wrapper listing--recent">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="listing__thumbnail">

							<?php
							/** Use an alternate featured listing, if available */
							if ( ( get_field( 'secondary_featured_image' ) ) && ( NULL !== get_field( 'secondary_featured_image' ) ) ) {
								$featured_image_id = get_field( 'secondary_featured_image' );
							} else {
								$featured_image_id = get_post_thumbnail_id( get_the_ID() );
							}
							?>

							<?php
							$image['small'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small' );
							$image['small_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small_2x' );

							$image['medium'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium' );
							$image['medium_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium_2x' );
							?>

							<picture>
								<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
								<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
								<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							</picture>

						</div>

					<?php endif; ?>

					<div class="listing__content">

						<header class="listing__header">

							<h1 class="listing__headline"><?php the_title(); ?></h1>

							<?php if ( 'rp3_cpt_news' === $post_type ) : ?>

								<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

							<?php else: ?>

								<div class="listing__byline"><?php echo rp3_byline(); ?></div>

							<?php endif; ?>

						</header>

						<div class="listing__excerpt">

							<?php echo the_excerpt(); ?>

						</div>

					</div>

				</a>

			</div>

		<?php endwhile; endif; wp_reset_query(); ?>

	<?php endif; ?>

	<?php if ( $listing->have_posts() ) : ?>

		<div id="listing" class="listing__wrapper listing__contents">

			<?php while ( $listing->have_posts() ) : $listing->the_post(); ?>

				<?php $post_ids[] = get_the_ID(); ?>

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

					<?php if ( '' != get_the_post_thumbnail() ) : ?>

						<div class="listing__thumbnail">
							<?php
							/** Use an alternate featured listing, if available */
							if ( ( get_field( 'secondary_featured_image' ) ) && ( NULL !== get_field( 'secondary_featured_image' ) ) ) {
								$featured_image_id = get_field( 'secondary_featured_image' );
							} else {
								$featured_image_id = get_post_thumbnail_id( get_the_ID() );
							}

							$image['small'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small' );
							$image['small_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_small_2x' );

							$image['medium'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium' );
							$image['medium_2x'] = wp_get_attachment_image_src( $featured_image_id, 'four_three_medium_2x' );
							?>

							<picture>
								<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
								<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
								<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							</picture>

						</div>

					<?php endif; ?>

					<header class="listing__header">

						<h1 class="listing__headline"><?php the_title(); ?></h1>

						<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

					</header>

					<div class="listing__excerpt">

						<?php echo the_excerpt(); ?>

					</div>

				</a>

			<?php endwhile; ?>

		</div>
		<!-- // #blog-listing -->

	<?php endif; wp_reset_query(); ?>

	<?php if( $listing->found_posts > ( $page_size * $current_page ) ): ?>

		<?php
			// Create settings collection to pass to Backbone
			$settings = array(
				'exclude'			=> $post_ids,
				'current_page'		=> $current_page,
				'offset'			=> $page_size * $current_page,
				'post_type'			=> get_field( 'post_type' ),
				'tags'				=> $tags,
				'news_categories'	=> $news_categories,
				'industries'		=> $industries,
				'services'			=> $services,
				'recent_post'		=> $recent_post,
			);
		?>
		<!-- Container to put our backbone-generated content. -->
		<div id="listing__backbone" class="listing__wrapper" data-backbone='<?php echo json_encode( $settings ); ?>'></div>

		<div class="all-news-link">
			<a href="<?php echo esc_url( home_url( 'category/blog' ) ); ?>" id="listing__view-more">View More Posts</a>
		</div>

	<?php endif; ?>

</section>

<?php get_template_part( 'template-parts/inline', 'underscorejs-template' );
