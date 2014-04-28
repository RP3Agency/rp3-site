<?php
/**
 * Widget container for the blog archive page
 *
 * @package RP3
 */
?>
<section id="secondary" class="widget-area blog-archive-widget-area" role="complementary">

	<?php for ( $i = 1; $i < 4; $i++ ) : ?>

		<?php dynamic_sidebar( 'blog-archive-' . $i ); ?>

	<?php endfor; ?>

</section>
<!-- #secondary -->
