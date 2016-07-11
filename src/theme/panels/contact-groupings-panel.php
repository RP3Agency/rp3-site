<?php
/**
 * Contact groupings panel.
 *
 * @package RP3
 */
?>

<!-- Contact Groupings Panel -->

<div class="page__panel__contact-groupings">

	<ul>

		<li class="contact__info__email">
			<h2 class="contact__header">Work With Us</h2>
			Jim Lansbury<br/>
			<a href="mailto:jlansbury@rp3agency.com">jlansbury@rp3agency.com</a>
		</li>

		<li class="contact__info__email">
			Beth Johnson<br/>
			<a href="mailto:bjohnson@rp3agency.com">bjohnson@rp3agency.com</a>
		</li>

		<li class="contact__info__email">
			Kurt Roberts<br/>
			<a href="mailto:kroberts@rp3agency.com">kroberts@rp3agency.com</a>
		</li>

	</ul>

	<ul>

		<li class="contact__info__email">
			<h2 class="contact__header">Media Inquiries</h2>
			Chris Finnegan<br/>
			<a href="mailto:cfinnegan@rp3agency.com">cfinnegan@rp3agency.com</a>
		</li>

		<li class="contact__info__email">
			<h2 class="contact__header">General Inquiries</h2>
			<a href="mailto:info@rp3agency.com">info@rp3agency.com</a>
		</li>

		<li class="contact__info__email">
			<h2 class="contact__header">Careeers</h2>
			<a href="mailto:jobs@rp3agency.com">jobs@rp3agency.com</a>
		</li>

	</ul>

	<ul>

		<li>
			<address>
				7316 Wisconsin Avenue<br/>
				Suite 450<br/>
				Bethesda, Maryland 20814
			</address>
		</li>

		<li>
			t. (301) 718-0333<br/>
			f. (301) 718-9333
		</li>

		<?php // Fact Sheet ?>

		<?php if ( '' != get_field( 'fact_sheet' ) ) : ?>

			<li class="contact__info__fact-sheet">

				<h2 class="contact__header">Fact Sheet</h2>

				<p class="contact__info__fact-sheet-link"><a href="<?php echo esc_url( get_field( 'fact_sheet' ) ); ?>">Download our fact sheet.</a></p>

			</li>

		<?php endif; ?>

	</ul>

</div>
