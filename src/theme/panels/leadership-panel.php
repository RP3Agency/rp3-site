<?php $posts = get_sub_field( 'leaders' ); ?>

<?php if ( $posts ) : ?>

<section class="page__panel page__panel--leadership leadership">

	<header class="leadership__header page__panel__header">

		<h1>Leadership</h1>

	</header>

	<div class="leadership__container">

		<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

		<div class="leadership__person">

			<div class="leadership__photo">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<?php
					$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
					$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );

					$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
					$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );

					$image['large'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium' );
					$image['large_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium_2x' );
					?>

					<picture>
						<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
						<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
						<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
					</picture>


				<?php endif; ?>

			</div>
			<!-- // .leadership__photo -->

			<div class="leadership__content">

				<h2 class="leadership__name"><?php the_title(); ?></h2>

				<div class="leadership__title"><?php the_field( 'position' ); ?></div>

				<div class="leadership__biography leadership__biography--wide"><?php the_field( 'biography' ); ?></div>

				<ul class="leadership__social social">

					<?php if ( '' != get_field( 'email' ) ) : ?>
					<li class="email"><a href="<?php echo esc_url( 'mailto:' . get_field( 'email' ) ); ?>">Email</a></li>
					<?php endif; ?>

					<?php if ( '' != get_field( 'linkedin' ) ) : ?>
					<li class="linkedin"><a href="<?php echo esc_url( get_field( 'linkedin' ) ); ?>">LinkedIn</a></li>
					<?php endif; ?>

					<?php if ( '' != get_field( 'twitter' ) ) : ?>
					<li class="twitter"><a href="<?php echo esc_url( get_field( 'twitter' ) ); ?>">Twitter</a></li>
					<?php endif; ?>

					<?php if ( '' != get_field( 'github' ) ) : ?>
					<li class="github"><a href="<?php echo esc_url( get_field( 'github' ) ); ?>">GitHub</a></li>
					<?php endif; ?>

				</ul>

			</div>
			<!-- // .leadership__content -->

			<div class="leadership__biography leadership__biography--narrow"><?php the_field( 'biography' ); ?></div>

		</div>
		<!-- // .leadership__person -->

		<?php endforeach; ?>

	</div>
	<!-- // .leadership__content -->

</section>
<!-- // .leadership.entry-content -->

<?php endif; wp_reset_postdata(); ?>
