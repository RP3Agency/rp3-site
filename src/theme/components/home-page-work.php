<?php $posts = get_field( 'home_page_work' ); ?>

<?php if ( $posts ) : ?>

	<section id="home-work" class="home-work component component--padded">

		<?php $i = 1; foreach ( $posts as $post ) : setup_postdata( $post ); ?>

			<div class="full-width-image-panel panel full-width-image-panel--<?php echo esc_attr( $i ); ?>">

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

					<div class="full-width-image-panel__image">

						<div class="full-width-image-panel__image__content">

							<?php echo rp3_picture_element_v2( get_field( 'home_page_hero_image' ), 'full-width' ); ?>

						</div>

					</div>

					<div class="hero__headline">
						<h1><?php the_title(); ?></h1>

						for <strong><?php the_field( 'client' ); ?></strong>
					</div>

				</a>

			</div>

		<?php $i++; endforeach; wp_reset_postdata(); ?>

	</section>

<?php endif; ?>
