<?php
/**
 * @package RP3
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-content' ); ?>>

	<div class="single-post-content__wrapper">

		<!-- Article Header -->

		<header class="single-post-content__header">

			<h1 class="single-post-content__title"><?php the_title(); ?></h1>

			<div class="single-post-content__date"><?php echo esc_html( get_the_date() ); ?></div>

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

		<?php if ( is_singular( 'rp3_cpt_careers' ) ) : ?>

			<section class="single-post-content--careers">

				<?php if ( '' !== get_field( 'responsibilities' ) ) : ?>

					<div class="single-post-content--careers__subsection">

						<h2 class="single-post-content--careers__subhead">Responsibilities</h2>

						<?php the_field( 'responsibilities' ); ?>

					</div>

				<?php endif; ?>

				<?php if ( '' !== get_field( 'skills' ) ) : ?>

					<div class="single-post-content--careers__subsection">

						<h2 class="single-post-content--careers__subhead">Skills</h2>

						<?php the_field( 'skills' ); ?>

					</div>

				<?php endif; ?>

			</section>

		<?php endif; ?>

	</div>
	<!-- // wrapper -->

</article>
