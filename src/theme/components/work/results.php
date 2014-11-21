<?php
// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<?php if ( ( '' != get_field( 'results_copy' ) ) && ( have_rows( 'results_images' ) ) ) : ?>

	<section class="work-content">

		<div class="work-content__container">

			<div class="work-content__container--left">

				<h2 class="work-content__subheader">Results:</h2>

				<?php the_field( 'results_copy' ); ?>

			</div>
			<!-- // work-content container left -->

			<div class="work-content__container--right">

				<h2 class="work-content__subheader">Related Tags:</h2>

				<?php echo join( ', ', $work_tags ); ?>

			</div>
			<!-- // work-content container right -->

		</div>
		<!-- // work-content container -->

		<?php if ( have_rows( 'results_images' ) ) : ?>

			<?php rp3_case_study_hero_images( 'results_images', 'results_image' ); ?>

		<?php endif; ?>

	</section>
	<!-- work-content -->

<?php endif; ?>
