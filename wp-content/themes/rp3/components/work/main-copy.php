<section class="work work-main-copy">

	<div class="work__entry-content work-main-copy__entry-content entry-content">

		<div class="wrapper">

			<?php the_field( 'main_copy' ); ?>

		</div>

	</div>

	<div class="work__main-counter-image work-main-copy__main-counter-image">

		<img src="<?php echo esc_url( wp_get_attachment_url( get_field( 'main_copy_counter_image' ) ) ); ?>">

	</div>

</section>
<!-- work main copy -->