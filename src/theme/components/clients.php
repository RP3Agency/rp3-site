<?php if ( '' != get_field( 'clients_introduction' ) ) : ?>

<section class="clients component component--padded">

	<div class="clients__entry-content entry-content">

		<?php the_field( 'clients_introduction' ); ?>

	</div>

	<?php if ( have_rows( 'clients' ) ) : ?>

		<ul class="clients__content">

			<?php while ( have_rows( 'clients' ) ) : the_row() ?>

				<li class="clients__client">

					<?php echo wp_remote_retrieve_body( wp_remote_get( get_sub_field( 'client_logo' ), array( 'sslverify' => false ) ) ); ?>

				</li>
				<!-- // .clients_client -->

			<?php endwhile; ?>

		</ul>
		<!-- // .clients__content -->

	<?php endif; ?>

</section>
<!-- // .clients.entry-content -->

<?php endif; ?>
