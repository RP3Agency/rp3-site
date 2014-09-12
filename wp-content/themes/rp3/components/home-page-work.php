<?php $posts = get_field( 'home_page_work' ); ?>

<?php if ( $posts ) : ?>

	<section id="home-work" class="home-work">

		<?php foreach ( $posts as $post ) : ?>

		<?php setup_postdata( $post ); ?>

			<a href="<?php echo esc_url( get_the_permalink() ); ?>">

				<?php if ( get_the_post_thumbnail( get_the_ID() ) != '' ) : ?>

				<?php
				$thumbnail_small		= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-small' );
				$thumbnail_small_2x		= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-small-2x' );
				$thumbnail_medium		= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-medium' );
				$thumbnail_medium_2x	= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-medium-2x' );
				$thumbnail_large		= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-large' );
				$thumbnail_large_2x		= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero-large-2x' );
				?>

				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="<?php echo esc_url( $thumbnail_large[0] ); ?>, <?php echo esc_url( $thumbnail_large_2x[0] ); ?> 2x" media="(min-width: 37.5em)">
					<source srcset="<?php echo esc_url( $thumbnail_medium[0] ); ?>, <?php echo esc_url( $thumbnail_medium_2x[0] ); ?> 2x" media="(min-width: 20.0625em)">
					<source srcset="<?php echo esc_url( $thumbnail_small[0] ); ?>, <?php echo esc_url( $thumbnail_small_2x[0] ); ?> 2x">
					<!--[if IE 9]></video><![endif]-->
					<img srcset="<?php echo esc_url( $thumbnail_small[0] ); ?>, <?php echo esc_url( $thumbnail_small_2x[0] ); ?> 2x" alt="<?php esc_attr( get_the_title() ); ?>">
				</picture>

				<?php endif; ?>

				<div class="wrapper">

					<div class="headline">
						<?php the_field( 'headline' ); ?>
					</div>

				</div>
				<!-- // .wrapper -->

			</a>

		<?php endforeach; wp_reset_postdata(); ?>

	</section>

<?php endif; ?>
