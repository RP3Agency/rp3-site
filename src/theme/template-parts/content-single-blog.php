<?php
/**
 * @package RP3
 */
?>
<?php

	$post_id = $post->ID;

	// fetch industry taxonomy for single post
	$industries = array();
	if( is_single() ) {
		foreach ( wp_get_post_terms( $post->ID, 'rp3_tax_industries' ) as $industry ) {
			$industries[] = $industry->term_id;
		}
	}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-content single-post-content--blog' ); ?>>

	<div class="single-post-content__wrapper">

		<!-- Article Header -->

		<header class="single-post-content__header">

			<h1 class="single-post-content__title"><?php the_title(); ?></h1>

			<div class="single-post-content__date"><?php echo rp3_byline(); ?></div>

		</header>
		<!-- .entry-header -->

		<?php

		$post_image_id = 10850;

		if ( '' !== get_the_post_thumbnail() ) {

			$post_image_id = get_post_thumbnail_id();
		}

		?>

		<div class="single-post-content__featured-image">

			<?php
			$image['small'] = wp_get_attachment_image_src( $post_image_id, 'four_three_small' );
			$image['small_2x'] = wp_get_attachment_image_src( $post_image_id, 'four_three_small_2x' );

			$image['medium'] = wp_get_attachment_image_src( $post_image_id, 'four_three_medium' );
			$image['medium_2x'] = wp_get_attachment_image_src( $post_image_id, 'four_three_medium_2x' );

			$image['large'] = wp_get_attachment_image_src( $post_image_id, 'eight_three_large' );
			$image['large_2x'] = wp_get_attachment_image_src( $post_image_id, 'eight_three_large_2x' );
			?>

			<picture>
				<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
				<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
				<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
			</picture>

		</div>

		<section class="single-post-content__content">

			<?php the_content(); ?>

		</section>

		<?php if ( function_exists( 'sharing_display' ) ) : ?>

			<!-- Sharing -->

			<section class="single-post-content__sharing">

				<?php sharing_display( '', true ); ?>

			</section>

		<?php endif; ?>

		<?php /** If comments are open or we have at least one comment, load up the comment template */ ?>

		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

			<!-- Comments -->

			<?php comments_template( '/template-parts/content-blog-comments.php' ); ?>

		<?php endif; ?>

		<!-- Blog Author -->

		<?php get_template_part( 'template-parts/content', 'blog-author' ); ?>

		<!-- Related Posts -->

		<?php get_template_part( 'template-parts/content', 'blog-related' ); ?>

	</div>
	<!-- // wrapper -->

</article>

<?php get_template_part( 'template-parts/component', 'blog-interstitial' ); ?>

<?php
	// Create settings collection to pass to Backbone
	$settings = array(
		'exclude'			=> array( $post_id ),
		'industries'		=> $industries,
	);
?>

<div id="blog__backbone" data-backbone='<?php echo json_encode( $settings ); ?>'></div>

<div id="blog__loading-indicator" class="blog__loading-indicator">

	<img src="<?php echo esc_url( get_template_directory_uri() . '/images/loading-indicator.gif' ); ?>" />

</div>

<?php get_template_part( 'template-parts/inline', 'underscorejs-template-blog' ); ?>

<?php if ( function_exists( 'sharing_display' ) ) : ?>

	<li class="share-link" id="share-link-<?php echo esc_attr( get_the_ID() ); ?>" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>">
		<a rel="nofollow" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>" data-shared="sharing-link-<?php echo esc_attr( get_the_ID() ); ?>" data-clipboard-text="<?php echo esc_url( get_permalink() ); ?>" class="share-link sd-button share-icon no-text" href="#!" title="Click to copy permalink.">
			<span></span>
			<span class="sharing-screen-reader-text">Click to copy permalink to clipboard</span>
		</a>
	</li>

<?php endif; ?>
