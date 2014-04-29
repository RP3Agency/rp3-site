<?php
/**
 * Widget container for the blog archive page
 *
 * @package RP3
 */
?>

<section id="#secondary" class="blog-archive-widget-area" role="complementary">

<?php for ( $i = 1; $i < 4; $i++ ) : ?>

	<div class="widget-area">

		<?php dynamic_sidebar( 'blog-archive-' . $i ); ?>

	</div>

<?php endfor; ?>

</section>
<!-- #secondary -->
