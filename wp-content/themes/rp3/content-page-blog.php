<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
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
