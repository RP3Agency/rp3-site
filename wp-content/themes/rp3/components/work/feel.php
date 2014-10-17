<section class="case-study case-study__feel">

	<?php if ( '' != get_field( 'feel_copy' ) ) : ?>

		<div class="case-study__entry-content case-study__feel__entry-content entry-content">

			<div class="wrapper">

				<h2 class="case-study__subheader">Feel:</h2>

				<?php the_field( 'feel_copy' ); ?>

			</div>
			<!-- // .wrapper -->

		</div>
		<!-- // case-study entry-content -->

	<?php endif; ?>

	<?php rp3_case_study_hero_images( 'feel_images', 'feel_image', true ); ?>

</section>
<!-- case study feel -->
