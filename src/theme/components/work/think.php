<?php if ( '' != get_field( 'think_copy' ) ) : ?>

	<section class="case-study-content">

		<div class="case-study-content__container">

			<div class="case-study-content__container--left">

				<h2 class="case-study-content__subheader">Think:</h2>

				<?php the_field( 'think_copy' ); ?>

			</div>
			<!-- // .case-study-content container left -->

		</div>
		<!-- // .case-study-content container -->

		<?php if ( ( 'true' == get_field( 'case_study' ) ) && ( '' != get_field( 'video' ) ) ) : ?>

			<div class="video__trigger">

				<a href="#!" id="video__trigger" class="block">

					<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>

				</a>

				<div class="video__modal" id="video__modal">

					<?php echo wp_oembed_get( get_field( 'video' ) ); ?>

				</div>

			</div>

		<?php else : ?>

			<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>

		<?php endif; ?>

	</section>
	<!-- // .case-study-content -->

<?php endif; ?>
