<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RP3
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="entry-content">

		<h1 class="entry-content__title">Posts by <span class="vcard"><?php echo get_the_author(); ?></span></h1>

		<?php get_template_part( 'components/blog-author' ); ?>

	</div>

	<section id="listing" class="listing" data-paged="<?php echo esc_attr( $paged ); ?>">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<div class="listing__thumbnail">

						<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

					</div>

				<?php endif; ?>

				<h1 class="listing__headline"><?php the_title(); ?></h1>

				<?php if ( 'news' == $page_type ) : ?>

					<div class="listing__byline"><?php echo get_the_date(); ?>.</div>

				<?php else: ?>

					<div class="listing__byline"><?php echo rp3_byline(); ?></div>

				<?php endif; ?>

				<div class="listing__excerpt">

					<?php echo the_excerpt(); ?>

				</div>

			</a>

		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
