<section class="case-study case-study__think">

	<?php if ( '' != get_field( 'think_copy' ) ) : ?>

		<div class="case-study__entry-content case-study__think__entry-content entry-content">

			<div class="wrapper">

				<h2 class="case-study__subheader">Think:</h2>

				<?php the_field( 'think_copy' ); ?>

			</div>
			<!-- // .wrapper -->

		</div>
		<!-- // case-study entry-content -->

	<?php endif; ?>

	<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>

</section>
<!-- case-study think -->
