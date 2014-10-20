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


<?php if ( ( 'true' == get_field( 'case_study' ) ) && ( '' != get_field( 'video' ) ) ) : ?>

	<div class="video__trigger">

		<a href="#!" id="video__trigger" class="block">

			<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>

		</a>

		<div class="video__modal" id="video__modal">

			<a href="#!" id="modal-close" class="modal-close">Close Video</a>

			<?php echo wp_oembed_get( get_field( 'video' ) ); ?>

		</div>

	</div>

<?php else : ?>

		<?php rp3_case_study_hero_images( 'think_images', 'think_image' ); ?>

<?php endif; ?>


</section>
<!-- case-study think -->
