<div class="work-images--grid">

	<?php while ( have_rows( 'mini_study_images' ) ) : the_row(); ?>

		<img src="<?php echo esc_url( wp_get_attachment_url( get_sub_field( 'mini_study_image' ) ) ); ?>">

	<?php endwhile; ?>

</div>
<!-- work-images grid -->
