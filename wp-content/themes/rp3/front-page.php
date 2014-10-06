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

<?php get_template_part( 'components/home-page', 'hero' ); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- .entry-content -->

</article>
<!-- #post-## -->

<?php get_template_part( 'components/home-page', 'work' ); ?>

<div class="home-errata">

	<div class="home-errata__row">

		<div class="home-errata__event">

			<div class="home-errata__subhead">Event</div>

			<h1 class="home-errata__header">UX Design Expo:</h1>

			<p>We’ve got back to the moon. But we don’t want to stay long... The ultimate goal is mars.</p>

			<div class="home-errata__date">August 14, 2014</div>

		</div>


		<div class="home-errata__twitter">

			<div class="home-errata__subhead">Twitter</div>

			<p>What happens if you actually ’like’ everything... http://ow.ly/Acy7d via @WIRED</p>

			<div class="home-errata__date">August 14, 2014</div>

		</div>


	</div>
	<!-- // .home-errata__row -->


	<div class="home-errata__row">

		<div class="home-errata__sandbox">
			Sandbox
		</div>

		<div class="home-errata__blog--gray">

			<div class="home-errata__subhead">Blog</div>

			<h1 class="home-errata__header">Lorem ipsum dolar sit title theater.</h1>

			<div class="home-errata__date">August 14, 2014</div>

		</div>

	</div>
	<!-- // .home-errata__row -->


	<div class="home-errata__row">

		<div class="home-errata__blog--green">

			<div class="home-errata__subhead">Blog</div>

			<h1 class="home-errata__header">You're Doing It Wrong.</h1>

			<div class="home-errata__date">August 14, 2014</div>

		</div>


		<div class="home-errata__news">

			<div class="home-errata__subhead">News</div>

			<h1 class="home-errata__header">RP3 Gains Four</h1>

			<div class="home-errata__date">August 14, 2014</div>

		</div>

	</div>
	<!-- // .home-errata__row -->


</div>
<!-- // .home-errata -->

<?php get_footer(); ?>
