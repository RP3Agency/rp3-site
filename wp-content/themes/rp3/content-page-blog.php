<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

/**
 * Pull 3 most recent blog posts
 */
$blog = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'blog',
	'posts_per_page'	=> 3
) );

global $more;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php /*
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	*/ ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<div class="magnetisms"></div>

</article><!-- #post-## -->

<!-- Blog archive -->

<div class="blog-archive">

	<?php if ( $blog->have_posts() ) : ?>

	<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

	<?php $more = 0; // Sets the posts to appear as they would on an "archive" page ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink(); ?>" rel="bookmark">

			<?php the_post_thumbnail( 'full' ); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<span class="entry-meta-date"><?php echo get_the_date(); ?></span>
					<span class="entry-meta-author">By <?php coauthors(); ?></span>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php // echo apply_filters( 'rp3_strip_anchor_filter', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rp3' ) ) ); ?>
				<?php echo rp3_strip_anchor_filter( get_the_content( '' ) ); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'rp3' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

		</a>

	</article><!-- #post-## -->

	<?php endwhile; endif; ?>

</div>
<!-- // .blog-archive -->
