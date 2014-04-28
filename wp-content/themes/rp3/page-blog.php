<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RP3
 */

get_header(); ?>

	<header class="page-header">
		<h1 class="page-title">Blog</h1>
	</header><!-- .page-header -->

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page-blog' ); ?>

			<?php endwhile; ?>

			<?php rp3_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php // get_sidebar( 'news' ); ?>
<?php get_footer(); ?>
