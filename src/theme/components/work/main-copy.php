<?php
// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<section class="work-main-content">

	<div class="work-main-content__container work-content__container">

		<div class="work-main-content__container__inner work-content__container--left">

			<?php the_field( 'main_copy' ); ?>

			<?php if ( count( $work_tags ) > 0 ) : ?>

				<h2 class="work-content__subheader related-tags">&nbsp;</h2>

				<?php echo join( ', ', $work_tags ); ?>

			<?php endif; ?>

		</div>
		<!-- // .work-content container left -->

	</div>
	<!-- // .work-content container -->

	<?php if ( '' != get_field( 'main_copy_counter_image' ) ) : ?>

	<div class="work-main-content__image work-main-copy__main-counter-image">

		<div class="work-main-content__image__container">

			<div class="work-main-content__image__container__inner">

				<?php echo rp3_picture_element( get_field( 'main_copy_counter_image' ), 'main-copy-counter-image' ); ?>

			</div>
			<!-- // work main content image container inner -->

		</div>
		<!-- // work main content image container -->

	</div>
	<!-- // work main content image -->

	<?php endif; ?>

</section>
<!-- // work-content -->
