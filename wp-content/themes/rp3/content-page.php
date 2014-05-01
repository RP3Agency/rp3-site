<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rp3' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php wp_nav_menu( array(
		'theme_location'	=> 'about-page',
		'menu_class'		=> 'menu page-about'
	) ); ?>

</article><!-- #post-## -->
