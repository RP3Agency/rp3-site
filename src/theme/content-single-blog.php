<?php
/**
 * @package RP3
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog' ); ?>>

	<!-- Article Header -->

	<header class="single-blog__entry-header entry-header">

		<h1 class="single-blog__entry-title entry-title"><?php the_title(); ?></h1>

		<div class="single-blog__entry-meta entry-meta">

			<?php echo rp3_byline(); ?>

		</div>
		<!-- // .entry-meta -->

		<?php if ( '' != get_the_post_thumbnail() ) : ?>

			<div class="single-blog__thumbnail">

				<?php

				$image['small']    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-small' );
				$image['small2x']  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-small-2x' );
				$image['medium']   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-medium' );
				$image['medium2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-medium-2x' );
				$image['large']    = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-large' );
				$image['large2x']  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-large-2x' );
				$image['xlarge']   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-xlarge' );
				$image['xlarge2x'] = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-blog-xlarge-2x' );

				?>

				<picture>
					<!--[if IE 9]><video style="display: none;"><![endif]-->
					<source srcset="<?php echo esc_url( $image['xlarge'][0] ); ?>, <?php echo esc_url( $image['xlarge2x'][0] ); ?> 2x" media="(min-width: 1000px)"></source>
					<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large2x'][0] ); ?> 2x" media="(min-width: 600px)"></source>
					<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium2x'][0] ); ?> 2x" media="(min-width: 321px)"></source>
					<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small2x'][0] ); ?> 2x"></source>
					<!--[if IE 9]></video><![endif]-->
					<img src="<?php echo esc_url( $image['small'][0] ); ?>" srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small2x'][0] ); ?> 2x" alt="">
				</picture>

			</div>

		<?php endif; ?>

	</header>
	<!-- .entry-header -->


	<div class="single-blog__container">

		<!-- Primary: Main content -->

		<div id="primary" class="single-blog__primary">

			<article>

				<div class="single-blog__entry-content entry-content">

					<?php the_content(); ?>

				</div>
				<!-- // entry-content -->

			</article>

			<?php if ( function_exists( 'sharing_display' ) ) : ?>

				<!-- Sharing -->

				<div class="single-blog__sharing">

					<?php sharing_display( '', true ); ?>

				</div>

			<?php endif; ?>

			<!-- Related Content -->

			<?php if ( is_active_sidebar( 'blog-single-post' ) ) : ?>

			<div id="blog-single-post-widget-area" class="widget-area blog-single-post-widget-area blog-archive-widget-area" role="complementary">

				<?php dynamic_sidebar( 'blog-single-post' ); ?>

			</div>

			<?php endif; ?>


			<?php /** If comments are open or we have at least one comment, load up the comment template */ ?>

			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

				<!-- Comments -->

				<div class="single-blog__comments">

					<?php comments_template(); ?>

				</div>

			<?php endif; ?>

		</div>
		<!-- // primary -->

		<!-- Secondary: Sidebar (Author information) -->

		<div id="secondary" class="single-blog__secondary">

			<?php get_template_part( 'components/blog', 'author' ); ?>

		</div>
		<!-- // .blog author wide -->

	</div>
	<!-- // container -->

</div>
