<?php if ( have_rows( 'front_page_work' ) ) : ?>

	<section id="front-page__work" class="front-page__work">

		<?php while ( have_rows( 'front_page_work' ) ) : the_row(); ?>

			<?php $post = get_sub_field( 'front_page_work_item' ); setup_postdata( $post ); ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="block front-page__work__item">

				<?php
				/** Determine whether to use the primary or alternate featured image */
				$alt_featured_image = rp3_use_alternate_featured_image( 'featured_image_alt' );

				if ( $alt_featured_image ) {
					$featured_image_id = $alt_featured_image;
				} else {
					$featured_image_id = get_post_thumbnail_id();
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

			</a>

		<?php wp_reset_postdata(); endwhile; ?>

	</section>

<?php endif; ?>
