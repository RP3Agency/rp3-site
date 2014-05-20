<?php
/**
 * @package RP3
 */

$careers = new WP_Query( array(
	'category_name'			=> 'careers',
	'posts_per_page'		=> 1
));
?>

<?php if ( $careers->have_posts() ): while ( $careers->have_posts() ): $careers->the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php the_permalink(); ?>" rel="bookmark">

		<div class="entry-wrapper">

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		</div>
		<!-- // .entry-wrapper -->

	</a>

</article><!-- #post-## -->

<?php endwhile; endif; ?>
