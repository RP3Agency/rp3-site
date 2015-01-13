<?php $posts = get_field( 'home_page_work' ); ?>

<?php if ( $posts ) : ?>

	<section id="home-work" class="home-work">

		<?php $i = 1; foreach ( $posts as $post ) : ?>

			<div class="home-work-trigger home-work-trigger-<?php echo esc_attr( $i ); ?>"></div>

			<?php setup_postdata( $post ); ?>

			<?php if ( get_field( 'hero_image' ) != '' ) : ?>

				<?php echo rp3_full_bleed_hero_image( get_field( 'hero_image' ), array(
					'id'			=> '',
					'classes'		=> 'hero-' . $i,
					'permalink'		=> get_the_permalink(),
					'image_size'	=> 'home-page-other-work',
					'title'			=> get_the_title(),
					'client'		=> get_field( 'client' )
				) );
				?>

			<?php endif; ?>

		<?php $i++; endforeach; wp_reset_postdata(); ?>

	</section>

<?php endif; ?>
