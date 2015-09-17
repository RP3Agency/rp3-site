<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RP3
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<article <?php post_class( 'page-listing' ); ?>>

		<div class="entry-content">

			<h1 class="entry-content__title">Posts by <span class="vcard"><?php echo get_the_author(); ?></span></h1>

			<?php get_template_part( 'template-parts/content', 'blog-author-archive' ); ?>

		</div>

	</article>

	<section class="listing">

		<div id="listing" class="listing__wrapper listing__contents" data-paged="<?php echo esc_attr( $paged ); ?>">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

					<?php

					if ( '' !== get_the_post_thumbnail() ) {
						$image_id = get_post_thumbnail_id( get_the_ID() );
					} else {
						$image_id = 10850;
					}

					?>

					<div class="listing__thumbnail">

						<?php
						$image['small'] = wp_get_attachment_image_src( $image_id, 'four_three_small' );
						$image['small_2x'] = wp_get_attachment_image_src( $image_id, 'four_three_small_2x' );

						$image['medium'] = wp_get_attachment_image_src( $image_id, 'four_three_medium' );
						$image['medium_2x'] = wp_get_attachment_image_src( $image_id, 'four_three_medium_2x' );
						?>

						<picture>
							<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
							<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						</picture>

					</div>

					<div class="listing__content">

						<header class="listing__header">

							<h1 class="listing__headline"><?php the_title(); ?></h1>

							<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

						</header>

						<div class="listing__excerpt">

							<?php echo the_excerpt(); ?>

						</div>

					</div>
					<!-- // listing content -->

				</a>

			<?php endwhile; ?>

		</div>
		<!-- // #listing -->

	</section>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
