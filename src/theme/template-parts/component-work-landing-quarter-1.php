<!-- Quarter Width 1 -->

<?php
$post = get_sub_field( 'quarter_width_1' );
setup_postdata( $post );
?>

<?php if ( '' != get_field( 'work_landing_image_quarter' ) ) : ?>

	<div class="work__quarter">

		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="work__link block">

			<div class="work__image work__image--quarter">

				<?php
				$image['small'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_small' );
				$image['small_2x'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_small_2x' );

				$image['medium'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_medium' );
				$image['medium_2x'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_medium_2x' );

				$image['large'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_large' );
				$image['large_2x'] = wp_get_attachment_image_src( get_field( 'work_landing_image_quarter' ), 'four_three_large_2x' );
				?>

				<picture>
					<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
					<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
				</picture>

			</div>
			<!-- work image quarter -->

		</a>

	</div>
	<!-- work quarter -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<!-- End Quarter Width 1 -->
