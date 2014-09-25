<?php $posts = get_field( 'home_page_hero' ); ?>

<?php if ( $posts ) : ?>

	<?php foreach ( $posts as $post ) : ?>

	<?php setup_postdata( $post ); ?>

	<?php echo rp3_full_bleed_hero_image( get_post_thumbnail_id( get_the_ID() ), 'home-hero', get_the_permalink(), 'home-page-hero', get_the_title(), get_field( 'headline' ) ); ?>

	<?php endforeach; wp_reset_postdata(); ?>

<?php endif; ?>
