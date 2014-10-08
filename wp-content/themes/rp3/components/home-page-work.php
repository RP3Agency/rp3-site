<?php $posts = get_field( 'home_page_work' ); ?>

<?php if ( $posts ) : ?>

	<section id="home-work" class="home-work">

		<?php foreach ( $posts as $post ) : ?>

			<?php setup_postdata( $post ); ?>

			<?php if ( get_the_post_thumbnail( get_the_ID() ) != '' ) : ?>

				<?php echo rp3_full_bleed_hero_image( get_post_thumbnail_id( get_the_ID() ), array(
					'id'			=> '',
					'classes'		=> '',
					'permalink'		=> get_the_permalink(),
					'image_size'	=> 'home-page-other-work',
					'title'			=> get_the_title(),
					'headline'		=> get_field( 'headline' )
				) );
				?>

			<?php endif; ?>

		<?php endforeach; wp_reset_postdata(); ?>

	</section>

<?php endif; ?>
