<?php if ( '' != get_field( 'awards' ) ) : ?>

<section class="awards">

	<div class="wrapper">

		<div class="awards__content">

			<?php the_field( 'awards' ); ?>

		</div>

	</div>

</section>

<?php endif; ?>
