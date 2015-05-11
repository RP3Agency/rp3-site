<?php
/**
 * The template for displaying the home page.
 *
 * This is the template for displaying the home page. The
 * home page will consist of a curated hero image that links
 * to work or a case study, editable content, smaller links
 * to more work and case studies, followed by tweets, news
 * items, blog posts, etc.
 *
 * @package RP3
 */

get_header(); ?>

<?php // get_template_part( 'components/home-page', 'hero' ); ?>
<?php get_template_part( 'components/home-page', 'hero-infinite-possibilities' ); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'component component--padded' ); ?>>

	<div class="entry-content entry-content--home">
		<?php the_content(); ?>
	</div>
	<!-- .entry-content -->

</article>
<!-- #post-## -->

<?php get_template_part( 'components/home-page', 'work' ); ?>

<?php get_template_part( 'components/home-page', 'blocks' ); ?>

<?php get_footer(); ?>
