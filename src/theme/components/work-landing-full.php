<!-- Full Width -->

<?php
$post = get_sub_field( 'full_width' );
setup_postdata( $post );
?>

<?php if ( '' != get_field( 'work_landing_image_full' ) ) : ?>

	<div class="work__full-width">

		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

			<?php echo rp3_picture_element( get_field( 'work_landing_image_full' ), 'work-full-width' ); ?>

			<div class="work__headline">

				<h1><?php the_title(); ?></h1>
				for <strong><?php the_field( 'client' ); ?></strong>

			</div>

		</a>

	</div>
	<!-- work full-width -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<!-- End Full Width -->
