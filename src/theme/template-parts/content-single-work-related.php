<?php $related_work = get_field( 'related_work' ); ?>

<?php if ( $related_work ) : ?>

	<aside class="work-single__related">

		<div class="work-single__related__container">

			<div class="work-single__related__container__inner">

				<header class="work-single__related__header">

					<h2>Related<br>Work</h2>

				</header>

				<div class="work-single__related__content">

					<?php foreach ( $related_work as $post ) : ?>

						<?php setup_postdata( $post ); ?>

						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block work-single__related__item">

							<?php if ( '' != get_post_thumbnail_id() ) : ?>

								<?php
								$image['small'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small' );
								$image['small_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_small_2x' );

								$image['medium'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium' );
								$image['medium_2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'four_three_medium_2x' );
								?>

								<picture>
									<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
									<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
									<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
									<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
								</picture>

							<?php endif; ?>

							<div class="work-single__related__label">

								<div class="work-single__related__label__content">

									<h3 class="work-single__related__title"><?php the_title(); ?></h3>

									<?php if ( ( get_field( 'client' ) != get_the_title() ) && ( '' != get_field( 'client' ) ) ) : ?>

										<div class="work-single__related__client">for <strong><?php the_field( 'client' ); ?></strong></div>

									<?php endif; ?>

								</div>

							</div>

						</a>

					<?php endforeach; wp_reset_postdata(); ?>

				</div>

			</div>
			<!-- related container inner -->

		</div>
		<!-- // related-work container -->

	</aside>
	<!-- // .related-work -->

<?php endif; ?>
