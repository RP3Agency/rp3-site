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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'contact' ); ?>>

	<div class="contact__wrapper">

		<section class="contact__content">

			<div class="entry-content">

				<?php the_content(); ?>

			</div>

			<section class="contact__info">

				<?php // Work With Us ?>

				<?php get_template_part( 'panels/contact-groupings-panel' ); ?>

			</section>
			<!-- // .contact__info -->

			<section class="contact__social">

				<?php get_template_part( 'panels/social-media-panel' ); ?>

			</section>
			<!-- // .contact__social -->

			<section class="contact__form" id="contact__form">

				<?php echo do_shortcode( '[contact-form-7 id="8285" title="Contact Form"]' ); ?>

			</section>
			<!-- // .contact__form -->

		</section>
		<!-- // .contact__content -->

	</div>
	<!-- // .contact__wrapper -->


	<section id="map" class="contact__map">

		<div id="contact__map" class="contact__map__container"></div>

	</section>
	<!-- // .contact__map -->

</article>
