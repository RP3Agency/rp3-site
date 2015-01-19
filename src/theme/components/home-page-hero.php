<?php $post = get_field( 'home_page_hero' ); ?>

<?php if ( $post ) : ?>

	<?php setup_postdata( $post ); ?>

	<?php if ( 8744 == get_the_ID() ) : ?>

		<?php echo rp3_full_bleed_hero_image( get_post_thumbnail_id( get_the_ID() ), array(
			'id'			=> 'home-hero',
			'permalink'		=> get_the_permalink(),
			'title'			=> get_the_title(),
			'client'		=> get_field( 'client' ),
			'classes'		=> 'hero-image woolly-hero',
			'image_size'	=> 'woolly-home-page-hero'
		) ); ?>

	<?php else: ?>

		<?php echo rp3_full_bleed_hero_image( get_post_thumbnail_id( get_the_ID() ), array(
			'id'			=> 'home-hero',
			'permalink'		=> get_the_permalink(),
			'title'			=> get_the_title(),
			'client'		=> get_field( 'client' )
		) ); ?>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>
