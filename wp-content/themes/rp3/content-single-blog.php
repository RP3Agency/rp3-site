<?php
/**
 * @package RP3
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog' ); ?>>

	<a href="<?php echo esc_url( home_url( '/news-views/' ) ); ?>" class="blog__back">Back to Articles</a>

	<!-- Article Header -->

	<header class="blog__entry-header entry-header">

		<h1 class="blog__entry_title entry-title"><?php the_title(); ?></h1>

		<div class="blog__entry-meta entry-meta">
			<?php echo rp3_byline( 'blog', 'single' ); ?>
		</div>
		<!-- // .entry-meta -->

	</header>
	<!-- .entry-header -->

	<div id="primary" class="blog__primary">

		<article>

			<?php the_post_thumbnail(); ?>


			<div class="blog__entry-content entry-content">

				<div class="entry-content__container">

					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'rp3' ),
							'after'  => '</div>',
						) );
					?>

				</div>
				<!-- // .entry-content__container -->

			</div>
			<!-- .entry-content -->


			<aside class="blog__social-media">
				<?php sharing_display( '', true ); ?>
			</aside>

			<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;
			?>

		</article>
		<!-- #post-## -->

	</div>
	<!-- // #primary -->

	<?php get_sidebar( 'blog' ); ?>

</div>
