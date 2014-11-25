<?php
// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<?php if ( ( '' != get_field( 'results_copy' ) ) && ( have_rows( 'results_images' ) ) ) : ?>

	<section class="case-study-content">

		<div class="case-study-content__container">

			<div class="case-study-content__container--left">

				<h2 class="case-study-content__subheader">Results:</h2>

				<?php the_field( 'results_copy' ); ?>

			</div>
			<!-- // case-study-content container left -->

			<div class="case-study-content__container--right">

				<h2 class="case-study-content__subheader">Related Tags:</h2>

				<?php echo join( ', ', $work_tags ); ?>

			</div>
			<!-- // case-study-content container right -->

		</div>
		<!-- // case-study-content container -->

		<?php if ( have_rows( 'results_images' ) ) : ?>

			<?php rp3_case_study_hero_images( 'results_images', 'results_image' ); ?>

		<?php endif; ?>

	</section>
	<!-- case-study-content -->

<?php endif; ?>
