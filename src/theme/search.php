<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package RP3
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="entry-content">

		<h1 class="entry-content__title">Search results for:
			<strong><?php echo get_search_query(); ?></strong></h1>

	</div>

	<section class="search-form">

		<?php get_search_form( true ); ?>

	</section>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'archive' ); ?>

	<?php endwhile; ?>

	<?php rp3_paging_nav(); ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
