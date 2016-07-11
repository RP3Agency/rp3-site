<?php
/**
 * Social media panel.
 *
 * @package RP3
 */
?>

<!-- Social Media Panel -->

<div class="page__panel__social-media">

	<div class="page__panel__social-media__inner">

		<div class="contact__info__social">

			<h2 class="contact__header">Social</h2>

			<?php wp_nav_menu( array(
				'theme_location'	=> 'contact-social',
				'menu_class'		=> 'social'
			) ); ?>

		</div>
		<!-- // .contact__info__social -->

	</div>

</div>
