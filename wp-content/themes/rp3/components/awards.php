<?php if ( '' != get_field( 'awards' ) ) : ?>

<section class="awards">

	<div class="awards__content">

		<div class="entry-content">

			<?php the_field( 'awards' ); ?>

		</div>
		<!-- // .entry-content -->

	</div>
	<!-- // .awards__content -->

</section>
<!-- // .awards -->

<?php endif; ?>
