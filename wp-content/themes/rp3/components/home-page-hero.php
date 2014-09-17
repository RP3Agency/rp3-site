<?php $posts = get_field( 'home_page_hero' ); ?>

<?php if ( $posts ) : ?>

	<?php foreach ( $posts as $post ) : ?>

	<?php setup_postdata( $post ); ?>

		<section id="home-hero" class="home-hero">

			<a href="<?php echo esc_url( get_the_permalink() ); ?>">

				<?php if ( get_the_post_thumbnail( get_the_ID() ) != '' ) : ?>

				<div class="hero-image">

					<?php echo rp3_picture_element( get_post_thumbnail_id( get_the_ID() ), 'home-page-hero', get_the_title() ); ?>

				</div>
				<!-- // .hero-image -->

				<?php endif; ?>

				<div class="wrapper">

					<div class="headline">
						<?php the_field( 'headline' ); ?>
					</div>

				</div>
				<!-- // .wrapper -->

			</a>

		</section>

	<?php endforeach; wp_reset_postdata(); ?>

<?php endif; ?>
