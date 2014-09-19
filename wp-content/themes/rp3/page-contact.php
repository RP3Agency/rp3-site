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
		<main id="main" class="site-main contact" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="contact__wrapper">

					<section class="contact__content">

						<?php the_content(); ?>

					</section>
					<!-- // .contact__content -->

					<section class="contact__info">


						<?php // Work With Us ?>

						<?php if ( '' != get_field( 'new_business_email' ) ) : ?>

						<div class="contact__info__new-business">
							<h2>Work With Us</h2>
							<p class="contact__info__email"><a href="mailto:<?php echo esc_url( get_field( 'new_business_email' ) ); ?>"><?php echo esc_html( get_field( 'new_business_email' ) ); ?></a></p>
						</div>

						<?php endif; ?>



						<?php // General Inquiries ?>

						<?php if ( '' != get_field( 'general_inquiries_email' ) ) : ?>

						<div class="contact__info__general-inquiries">
							<h2>Work With Us</h2>
							<p class="contact__info__email"><a href="mailto:<?php echo esc_url( get_field( 'general_inquiries_email' ) ); ?>"><?php echo esc_html( get_field( 'general_inquiries_email' ) ); ?></a></p>
						</div>

						<?php endif; ?>



						<?php // Careers ?>

						<?php if ( '' != get_field( 'careers_email' ) ) : ?>

						<div class="contact__info__careers">
							<h2>Work With Us</h2>
							<p class="contact__info__email"><a href="mailto:<?php echo esc_url( get_field( 'careers_email' ) ); ?>"><?php echo esc_html( get_field( 'careers_email' ) ); ?></a></p>
						</div>

						<?php endif; ?>



						<?php // Social Media ?>

						<div class="contact__info__social">
							<h2>Social</h2>
							<?php wp_nav_menu( array(
								'theme_location'	=> 'contact-social',
								'menu_class'		=> 'social'
							) ); ?>
						</div>
						<!-- // .contact__info__social -->



						<?php // Telephone & Fax ?>

						<?php if ( ( '' != get_field( 'telephone' ) ) && ( '' != get_field( 'fax' ) ) ) : ?>

						<div class="contact__info__phone-fax">
							<h2>Phone & Fax</h2>
							<p class="contact__info__phone-fax-numbers">
								t. <?php echo esc_html( get_field( 'telephone' ) ); ?><br>
								f. <?php echo esc_html( get_field( 'fax' ) ); ?>
							</p>
						</div>

						<?php endif; ?>



						<?php // Fact Sheet ?>

						<?php if ( '' != get_field( 'fact_sheet' ) ) : ?>

						<div class="contact__info__fact-sheet">
							<h2>Fact Sheet</h2>
							<p class="contact__info__fact-sheet-link"><a href="<?php echo esc_url( get_field( 'fact_sheet' ) ); ?>">Download our fact sheet.</a></p>
						</div>

						<?php endif; ?>

					</section>
					<!-- // .contact__info -->

				</div>
				<!-- // .contact__wrapper -->


				<section class="contact__map">

					<iframe width="960" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=RP3+Agency,+7316+Wisconsin+Ave+%23450,+Bethesda,+MD+20814&amp;hl=en&amp;ie=UTF8&amp;view=map&amp;cid=9706010344331859619&amp;t=m&amp;vpsrc=6&amp;ll=38.98535,-77.093575&amp;spn=0.005671,0.020578&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>

	            </section>
	            <!-- // .contact__map -->

	            <?php // do_shortcode( '[contact-form-7 id="8285" title="Contact form 1"]' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main>
		<!-- // #main -->

	</div>
	<!-- // #primary -->

<?php get_footer(); ?>


<?php
/*
Want to learn more? Tell us what you need and we'll show you what you can do.
 */
?>
