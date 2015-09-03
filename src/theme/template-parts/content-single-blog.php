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

		<?php if ( '' !== get_the_post_thumbnail() ) : ?>

			<div class="single-post-content__featured-image">

				<?php
				$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
				$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );

				$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium' );
				$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium_2x' );

				$image['large'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'eight_three_large' );
				$image['large_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'eight_three_large_2x' );
				?>

				<picture>
					<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
					<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				</picture>


			</div>

		<?php endif; ?>

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

<?php get_template_part( 'template-parts/inline', 'underscorejs-template-blog' ); ?>
