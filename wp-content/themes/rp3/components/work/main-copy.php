<?php
// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<section class="work-content">

	<div class="work-content__container">

		<div class="work-content__container--left">

			<?php the_field( 'main_copy' ); ?>

			<?php if ( count( $work_tags ) > 0 ) : ?>

				<h2 class="work-content__subheader">Related Tags:</h2>

				<?php echo join( ', ', $work_tags ); ?>

			<?php endif; ?>

		</div>
		<!-- // .work-content container left -->

	</div>
	<!-- // .work-content container -->

	<?php if ( '' != get_field( 'main_copy_counter_image' ) ) : ?>

	<div class="work__main-counter-image work-main-copy__main-counter-image">

		<img src="<?php echo esc_url( wp_get_attachment_url( get_field( 'main_copy_counter_image' ) ) ); ?>">

	</div>

	<?php endif; ?>

</section>
<!-- // work-content -->
