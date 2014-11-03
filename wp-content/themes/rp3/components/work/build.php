<?php if ( '' != get_field( 'build_copy' ) ) : ?>

	<section class="work-content">

		<div class="work-content__container">

			<div class="work-content__container--left">

				<h2 class="work-content__subheader">Build:</h2>

				<?php the_field( 'build_copy' ); ?>

			</div>
			<!-- // .work-content container left -->

		</div>
		<!-- // work-content container -->

		<?php rp3_case_study_hero_images( 'build_images', 'build_image' ); ?>

	</section>
	<!-- // .work-content -->

<?php endif; ?>
