<?php
/**
 * Page content panel.
 *
 * @package RP3
 */
?>

<!-- Page Content Panel -->

<?php if ( '' != get_sub_field( 'content' ) ) : ?>

	<section class="work-single__content">

		<div class="work-single__content__container">

			<div class="work-single__content__inner">

				<?php the_sub_field( 'content' ); ?>

			</div>

		</div>

	</section>

<?php endif; ?>
