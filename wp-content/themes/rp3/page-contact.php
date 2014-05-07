<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package RP3
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="contact-wrapper">

					<div id="contact-form" class="contact-form">

						<h2>Say Hello!</h2>

						<?php the_content(); ?>

					</div>
					<!-- // #contact-form -->

					<div id="contact-info" class="contact-info">

						<div id="tel" class="telephone">
							<span class="blue">t.</span><span class="gray"> 301.718.0333</span><br />
							<span class="blue">f.</span><span class="gray"> 301.718.9333</span>
						</div>
						<!-- // #tel -->


						<div id="inquiries" class="inquiries">

							<div id="business" class="business">
								NEW BUSINESS<br />
								<a href="mailto:bjohnson@rp3agency.com">bjohnson@rp3agency.com</a>
							</div>
							<!-- // #business -->


							<div id="general" class="general">
								GENERAL INQUIRIES<br />
								<a href="mailto:info@rp3agency.com">info@rp3agency.com</a>
							</div>
							<!-- // #general -->

						</div>
						<!-- // #inquiries -->


						<div id="factsheet" class="contactfactsheet">
							<h2>Just the facts, ma'am</h2>
							<?php dynamic_sidebar( 'fact-sheet' ); ?>
						</div>
						<!-- // #factsheet -->

					</div>
					<!-- // #contact-info -->

				</div>
				<!-- // .contact-wrapper -->

				<div id="location">

					<h2>Location</h2>

					<p>RP3 Agency is located in downtown Bethesda, MD on the outskirts of Washington, DC.
					Technically, that makes us “beltway insiders.” But please don’t hold it against us.</p>

					<iframe width="960" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=RP3+Agency,+7316+Wisconsin+Ave+%23450,+Bethesda,+MD+20814&amp;hl=en&amp;ie=UTF8&amp;view=map&amp;cid=9706010344331859619&amp;t=m&amp;vpsrc=6&amp;ll=38.98535,-77.093575&amp;spn=0.005671,0.020578&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>

					<p class="address">7316 Wisconsin Avenue | Suite 450 | Bethesda, MD 20814</p>

	            </div>
	            <!-- // #location -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
