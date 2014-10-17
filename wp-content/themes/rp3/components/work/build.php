<section class="case-study case-study__build">

	<?php if ( '' != get_field( 'build_copy' ) ) : ?>

		<div class="case-study__entry-content case-study__build__entry-content entry-content">

			<div class="wrapper">

				<h2 class="case-study__subheader">Build:</h2>

				<?php the_field( 'build_copy' ); ?>

			</div>
			<!-- // .wrapper -->

		</div>
		<!-- case-study entry-content -->

	<?php endif; ?>


	<?php rp3_case_study_hero_images( 'build_images', 'build_image' ); ?>

</section>
<!-- case-study build -->
