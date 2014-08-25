<?php
/**
 * @package RP3
 */

$careers = new WP_Query( array(
	'category_name'			=> 'careers'
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
				<?php // We don't want sharing links here, exactly. ?>
				<?php remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer class="entry-footer">
				<p><i>Learn more &rarr;</i></p>
			</footer><!-- .entry-footer -->

		</div>
		<!-- // .entry-wrapper -->

	</a>

</article><!-- #post-## -->

<?php endwhile; endif; ?>
