<?php
/**
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rp3' ) ); ?>

		</div>
		<!-- // .wrapper -->

	</div>
	<!-- // .entry-content -->

</article>
<!-- #post-## -->
