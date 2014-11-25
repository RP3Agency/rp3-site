<?php if ( '' != get_field( 'build_copy' ) ) : ?>

	<section class="case-study-content">

		<div class="case-study-content__container">

			<div class="case-study-content__container--left">

				<h2 class="case-study-content__subheader">Build:</h2>

				<?php the_field( 'build_copy' ); ?>

			</div>
			<!-- // .case-study-content container left -->

		</div>
		<!-- // case-study-content container -->

		<?php rp3_case_study_hero_images( 'build_images', 'build_image' ); ?>

	</section>
	<!-- // .case-study-content -->

<?php endif; ?>
