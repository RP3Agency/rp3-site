<?php
/**
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

				<header class="entry-content__header">

					<h1 class="entry-content__archive-title"><?php the_title(); ?></h1>

					<?php if ( has_category( 'news' ) ) : ?>

					<div class="entry-content__meta"><?php echo get_the_date(); ?></div>

					<?php elseif ( has_category( 'blog' ) ) : ?>

					<div class="entry-content__meta"><?php echo rp3_byline(); ?></div>

					<?php endif; ?>

				</header>

				<?php the_excerpt(); ?>

			</a>

		</div>
		<!-- // .wrapper -->

	</div>
	<!-- // .entry-content -->

</article>
<!-- #post-## -->
