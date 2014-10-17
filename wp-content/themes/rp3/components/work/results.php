<section class="case-study case-study__results">

	<?php if ( '' != get_field( 'results_copy' ) ) : ?>

		<div class="case-study__entry-content case-study__results__entry-content entry-content">

			<div class="wrapper">

				<h2 class="case-study__subheader">Results:</h2>

				<?php the_field( 'results_copy' ); ?>

			</div>
			<!-- // .wrapper -->

		</div>
		<!-- // case-study entry-content -->

	<?php endif; ?>


	<?php rp3_case_study_hero_images( 'results_images', 'results_image' ); ?>

</section>
<!-- case-study results -->
