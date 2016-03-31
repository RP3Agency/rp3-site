<?php
/**
 * Iconified panel.
 *
 * @package RP3
 */
?>

<!-- Iconified Panel -->

<section class="page__panel__iconified iconified">

	<?php if ( have_rows( 'content_blocks' ) ) : ?>

		<ul class="iconified__content">

			<?php while ( have_rows( 'content_blocks' ) ) : the_row(); ?>

				<li class="iconified__content-block">

					<?php $icon = wp_get_attachment_image_src( get_sub_field( 'icon' ) ); ?>

					<img src="<?php echo esc_url( $icon[0] ); ?>" class="iconified__icon">

					<div class="iconified__text">

						<?php echo wpautop( get_sub_field( 'content' ) ); ?>

					</div>

				</li>
				<!-- // .iconified content block -->

			<?php endwhile; ?>

		</ul>
		<!-- // .iconified content -->

	<?php endif; ?>

</section>
<!-- // .iconified -->
