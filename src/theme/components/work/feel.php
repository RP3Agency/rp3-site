<?php if ( '' != get_field( 'feel_copy' ) ) : ?>

	<section class="work-content">

		<div class="work-content__container">

			<div class="work-content__container--left">

				<h2 class="work-content__subheader">Feel:</h2>

				<?php the_field( 'feel_copy' ); ?>

			</div>
			<!-- // .work-content container left -->

		</div>
		<!-- // .work-content container -->

		<?php rp3_case_study_hero_images( 'feel_images', 'feel_image', true ); ?>

	</section>
	<!-- case study feel -->

<?php endif; ?>
