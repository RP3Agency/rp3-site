<?php
/**
 * Content Panel.
 *
 * @package RP3
 */

/** If we're on the results content block, check for tags */
// if ( get_sub_field( 'display-tags' ) ) {
// 	$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
// 	foreach ( $terms as $term ) {
// 		$work_tags[] = $term->name;
// 	}
// }
?>

<!-- Content Panel -->

<?php if ( '' != get_sub_field( 'content' ) ) : ?>

	<section class="work__copy">

		<div class="work__copy__container">

			<?php if ( '' !== get_sub_field( 'headline' ) ) : ?>

				<h2 class="work__copy__headline"><?php the_sub_field( 'headline' ); ?>:</h2>

			<?php endif; ?>

			<?php the_sub_field( 'content' ); ?>

		</div>

	</section>

<?php endif; ?>























<?php /*
	<!-- Content -->

	<div class="content-panel__content">

			<div class="content-panel__content__inner">

				<?php the_sub_field( 'content' ); ?>

			</div>
			<!-- content-panel content inner -->

		<?php endif; ?>

	</div>
	<!-- content-panel content -->


	<!-- Tags -->

	<?php if ( ( get_sub_field( 'display-tags' ) ) && ( isset( $work_tags ) ) && ( 0 < count( $work_tags ) ) ) : ?>

<?php /*
		<div class="content-panel__tags">

			<div class="content-panel__tags__inner">

				<?php echo join( ', ', $work_tags ); ?>

			</div>
			<!-- content-panel tags inner -->

		</div>
		<!-- content-panel tags -->
*/ ?>


<?php /*
	<!-- Image -->

	<?php elseif ( '' != get_sub_field( 'image' ) ) : ?>

		<div class="content-panel__image">

			<div class="content-panel__image__content">

				<?php echo rp3_picture_element_v2( esc_attr( get_sub_field( 'image' ) ), 'content' ); ?>

			</div>
			<!-- content-panel image content -->

		</div>
		<!-- content-panel image -->

	<?php endif; ?>

</section>
<!-- content-panel -->
*/ ?>
