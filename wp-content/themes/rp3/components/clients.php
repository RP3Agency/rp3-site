<?php if ( '' != get_field( 'clients_introduction' ) ) : ?>

<section class="clients">

	<div class="clients__entry-content entry-content">

		<?php the_field( 'clients_introduction' ); ?>

	</div>

	<?php if ( have_rows( 'clients' ) ) : ?>

		<div class="clients__content">

			<?php while ( have_rows( 'clients' ) ) : the_row() ?>

			<article class="clients__client">

				<div class="clients__logo" style="background-image: url(<?php echo esc_url( get_sub_field( 'client_logo' ) ); ?>)">

					<?php the_sub_field( 'client_name' ); ?>

				</div>
				<!-- // .clients__logo -->

			</article>
			<!-- // .clients_client -->

			<?php endwhile; ?>

		</div>
		<!-- // .clients__content -->

	<?php endif; ?>

</section>
<!-- // .clients.entry-content -->

<?php endif; ?>
