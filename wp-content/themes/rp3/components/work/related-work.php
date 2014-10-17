<?php /* apparently we're not doing tags at the moment */

/*
<div class="case-study--single__entry-content--indented entry-content">

	<h2>Related Tags:</h2>

	<?php echo join( ', ', $work_tags ); ?>

</div>
*/ ?>


<aside class="related-work">

	<?php $related_work = get_field( 'related_work' ); ?>

	<?php if ( $related_work ) : ?>

		<header>
			<h2 class="related-work__header">More<br>Projects</h2>
		</header>

		<ul class="related-work__list">

			<?php foreach ( $related_work as $post ) : ?>

				<?php setup_postdata( $post ); ?>

				<li class="related-work__item">

					<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

						<?php if ( '' != get_field( 'hero_image' ) ) : ?>

							<?php
							$thumbnail = wp_get_attachment_image_src( get_field( 'hero_image' ), 'related-work-thumbnail' );
							$thumbnail_2x = wp_get_attachment_image_src( get_field( 'hero_image' ), 'related-work-thumbnail-2x' );
							?>
							<img src="<?php echo esc_url( $thumbnail[0] ); ?>" srcset="<?php echo esc_url( $thumbnail[0] ); ?>, <?php echo esc_url( $thumbnail_2x[0] ); ?> 2x">

						<?php endif; ?>

						<div class="related-work__label">
							<h3 class="related-work__title"><?php the_title(); ?></h3>
							<div class="related-work__client">for <strong><?php the_field( 'client' ); ?></strong></div>
						</div>

					</a>

				</li>

			<?php endforeach; ?>
			
		</ul>

	<?php endif; wp_reset_postdata(); ?>

</aside>
<!-- // .related-work -->