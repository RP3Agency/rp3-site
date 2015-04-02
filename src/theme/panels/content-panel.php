<?php
/**
 * Content Panel.
 *
 * @package RP3
 */

/** If we're on the results content block, check for tags */
// if ( 'results' == get_sub_field( 'label' ) ) {
// 	$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
// 	foreach ( $terms as $term ) {
// 		$work_tags[] = $term->name;
// 	}
// }
?>

<!-- Content Panel -->

<section class="content-panel panel">

	<div class="content-panel__content">

		<?php if ( '' != get_sub_field( 'content' ) ) : ?>

			<div class="content-panel__content__inner">

				<?php the_sub_field( 'content' ); ?>

			</div>
			<!-- content-panel content inner -->

		<?php endif; ?>

	</div>
	<!-- content-panel content -->

	<div class="content-panel__image">

		<div class="content-panel__image__content">

			<?php if ( '' != get_sub_field( 'image' ) ) : ?>

				<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'image' ) ), 'content' ); ?>

			<?php endif; ?>

		</div>
		<!-- content-panel image content -->

	</div>
	<!-- content-panel image -->

</section>
<!-- content-panel -->

<?php /*
<section class="case-study-content">

	<div class="case-study-content__container">

		<div class="case-study-content__container--left">

			<?php if ( '' != get_sub_field( 'label' ) ) : ?>

				<h2 class="case-study-content__subheader"><?php the_sub_field( 'label' ); ?>:</h2>

			<?php endif; ?>

			<?php the_sub_field( 'content' ); ?>

		</div>
		<!-- // .case-study-content container left -->

		<?php if ( ( isset( $work_tags ) ) && ( count( $work_tags ) > 0 ) ) : ?>

			<div class="case-study-content__container--right">

				<h2 class="case-study-content__subheader related-tags">&nbsp;</h2>

				<?php echo join( ', ', $work_tags ); ?>

			</div>
			<!-- // case-study-content container right -->

		<?php elseif ( '' != get_sub_field( 'image' ) ) : ?>

			<div class="work-main-content__image work-main-copy__main-counter-image">

				<div class="work-main-content__image__container">

					<div class="work-main-content__image__container__inner">

						<?php echo rp3_picture_element( get_sub_field( 'image' ), 'main-copy-counter-image' ); ?>

					</div>
					<!-- // work main content image container inner -->

				</div>
				<!-- // work main content image container -->

			</div>
			<!-- // work main content image -->

		<?php endif; ?>

	</div>
	<!-- // .case-study-content container -->

</section>
<!-- // .case-study-content -->
*/ ?>
