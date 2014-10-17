<div class="work-images--grid">

	<?php while ( have_rows( 'mini_study_images' ) ) : the_row(); ?>

		<div class="work-images--grid__image">

			<img src="<?php echo esc_url( wp_get_attachment_url( get_sub_field( 'mini_study_image' ) ) ); ?>">

		</div>

	<?php endwhile; ?>

</div>
<!-- work-images grid -->
