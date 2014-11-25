<?php if ( '' != get_field( 'feel_copy' ) ) : ?>

	<section class="case-study-content">

		<div class="case-study-content__container">

			<div class="case-study-content__container--left">

				<h2 class="case-study-content__subheader">Feel:</h2>

				<?php the_field( 'feel_copy' ); ?>

			</div>
			<!-- // .case-study-content container left -->

		</div>
		<!-- // .case-study-content container -->

		<?php rp3_case_study_hero_images( 'feel_images', 'feel_image', true ); ?>

	</section>
	<!-- case study feel -->

<?php endif; ?>
