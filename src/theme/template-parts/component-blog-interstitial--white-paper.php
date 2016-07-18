<?php $slug = $post->post_name; ?>

<?php if ( file_exists( get_stylesheet_directory() . '/blog-white-paper-interstitials/' . $slug . '.php' ) ) : ?>

	<?php get_template_part( 'blog-white-paper-interstitials/' . $slug ); ?>

<?php else : ?>

	<div class="blog__white-paper single-blog__interstitial--white-paper">

		<div class="blog__white-paper__container">

			<div class="blog__white-paper__container__inner">

				<div class="blog__white-paper__title blog__white-paper__title--narrow">

					<h2><?php the_field( 'header' ); ?></h2>

				</div>
				<!-- // title narrow -->

				<div class="blog__white-paper__image">

					<?php echo wp_get_attachment_image( get_field( 'image' ), 'full' ); ?>

				</div>
				<!-- // image -->

				<div class="blog__white-paper__content">

					<div class="blog__white-paper__title blog__white-paper__title--wide">

						<h2><?php the_field( 'header' ); ?></h2>

					</div>
					<!-- // title wide -->

					<?php echo get_field( 'content' ); ?>

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
				<!-- // content -->

			</div>
			<!-- // inner -->

		</div>
		<!-- // container -->

	</div>
	<!-- // white-paper -->

<?php endif; ?>
