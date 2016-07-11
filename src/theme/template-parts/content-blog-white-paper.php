<div class="blog__white-paper">

	<div class="blog__white-paper__container">

		<div class="blog__white-paper__container__inner">

			<div class="blog__white-paper__title">

				<h2><?php the_field( 'header' ); ?></h2>

			</div>

			<div class="blog__white-paper__image">

				<?php echo wp_get_attachment_image( get_field( 'image' ), 'full' ); ?>

			</div>

			<!-- // title -->

			<div class="blog__white-paper__content">

				<?php echo apply_filters( 'the_content', get_field( 'content' ) ); ?>

			</div>
			<!-- // content -->

			<!-- // image -->

			<div class="blog__white-paper__form">

				<?php
					// Build our EBD shortcode based on the parameters set in the post

					$form_id = get_field( 'form' );
					$download_item_id = get_field( 'download_item' );
					$ebd_shortcode = '[email-download download_id="' . esc_attr( $download_item_id ) . '" contact_form_id="' . esc_attr( $form_id ) . '"]';
				?>

				<?php echo do_shortcode( $ebd_shortcode ); ?>

			</div>

			<!-- // form -->

		</div>

	</div>

</div>
