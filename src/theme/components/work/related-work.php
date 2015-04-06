<?php $related_work = get_field( 'related_work' ); ?>

<?php if ( $related_work ) : ?>

	<aside class="related-work">

		<div class="related-work__container">

			<header class="related-work__header">

				<h2>Related<br>Work</h2>

			</header>

			<div class="related-work__list">

				<?php foreach ( $related_work as $post ) : ?>

					<?php setup_postdata( $post ); ?>

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block related-work__item">

						<?php if ( '' != get_post_thumbnail_id() ) : ?>

							<?php echo rp3_picture_element_v2( esc_attr( get_post_thumbnail_id() ), 'related-work' ); ?>

						<?php endif; ?>

						<div class="related-work__label">

							<h3 class="related-work__title"><?php the_title(); ?></h3>

							<?php if ( ( get_field( 'client' ) != get_the_title() ) && ( '' != get_field( 'client' ) ) ) : ?>

								<div class="related-work__client">for <strong><?php the_field( 'client' ); ?></strong></div>

							<?php endif; ?>

						</div>

					</a>

				<?php endforeach; wp_reset_postdata(); ?>

			</div>

		</div>
		<!-- // related-work container -->

	</aside>
	<!-- // .related-work -->

<?php endif; ?>
