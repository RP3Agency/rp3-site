<!-- Quarter Width 1 -->

<?php
$post = get_sub_field( 'quarter_width_1' );
setup_postdata( $post );
?>

<?php if ( '' != get_field( 'work_landing_image_quarter' ) ) : ?>

	<div class="work__quarter">

		<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

			<?php echo rp3_picture_element( get_field( 'work_landing_image_quarter' ), 'work-quarter-width' ); ?>

		</a>

	</div>
	<!-- work quarter -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>

<!-- End Quarter Width 1 -->
