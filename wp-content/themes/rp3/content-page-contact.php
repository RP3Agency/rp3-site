
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

		<section class="contact__entry-content entry-content wrapper">

			<div class="entry-content__container">

				<?php the_content(); ?>

			</div>
			<!-- // .entry-content__container -->

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
				<h2>General Inquiries</h2>
				<p class="contact__info__email"><a href="mailto:<?php echo esc_url( get_field( 'general_inquiries_email' ) ); ?>"><?php echo esc_html( get_field( 'general_inquiries_email' ) ); ?></a></p>
			</div>

			<?php endif; ?>



			<?php // Careers ?>

			<?php if ( '' != get_field( 'careers_email' ) ) : ?>

			<div class="contact__info__careers">
				<h2>Careers</h2>
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
		<div id="contact__map" class="contact__map__container"></div>
		<div class="contact__map__inset">
			<h1>RP3 Agency</h1>
			7316 Wisconsin Avenue<br>
			Suite 450<br>
			Bethesda, Maryland 20814
		</div>
	</section>
	<!-- // .contact__map -->

	<?php /*
	<section class="contact__form wrapper entry-content">

	    <?php echo do_shortcode( '[contact-form-7 id="8285" title="Contact form 1"]' ); ?>

	</section>
	<!-- // .contact__form -->
	*/ ?>

</article>
