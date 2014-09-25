<?php if ( '' != get_field( 'clients_introduction' ) ) : ?>

<section class="clients">

	<div class="wrapper">

		<?php the_field( 'clients_introduction' ); ?>

		<?php if ( have_rows( 'clients' ) ) : ?>

			<div class="clients__content">

				<?php while ( have_rows( 'clients' ) ) : the_row() ?>

				<article class="clients__client">

					<div class="clients__logo">

						<?php the_sub_field( 'client_name' ); ?>

					</div>
					<!-- // .clients__logo -->

				</article>
				<!-- // .clients_client -->

				<?php endwhile; ?>

			</div>
			<!-- // .clients__content -->

		<?php endif; ?>

	</div>
	<!-- // .wrapper -->

</section>
<!-- // .clients -->

<?php endif; ?>
