<?php

/** TEMPORARY!!! */
/** Just get the next 3 posts for layout purposes */

$args = array(
	'posts_per_page'		=> 3,
	'offset'				=> 1,
	'post_type'				=> 'post',
	'post_status'			=> 'publish'
);

$related = new WP_Query( $args );

if ( function_exists( 'related_posts' ) ) :

	// related_posts();

	if ( $related->have_posts() ) :
?>

	<section class="single-blog__related">

		<?php while ( $related->have_posts() ) : $related->the_post(); ?>

			<aside class="single-blog__related__post">

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="block">

					<?php
					$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
					$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );

					$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium' );
					$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium_2x' );

					$image['large'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
					$image['large_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );
					?>

					<picture>
						<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
						<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
						<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
					</picture>


					<div class="single-blog__related__post__label">

						<div class="single-blog__related__post__label__content">

							<h3 class="single-blog__related__post__label__title"><?php the_title(); ?></h3>

						</div>

					</div>

				</a>

			</aside>

		<?php endwhile; ?>

	</section>

	<?php endif; ?>

<?php endif; ?>
