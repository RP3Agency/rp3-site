<section class="page__panel__clients clients">

	<header class="clients__header page__panel__header">

		<h1>Clients</h1>

	</header>

	<?php if ( '' !== get_sub_field( 'introduction' ) ) : ?>

		<div class="clients__entry-content">

			<?php the_sub_field( 'introduction' ); ?>

		</div>

	<?php endif; ?>

	<?php if ( have_rows( 'clients' ) ) : ?>

		<ul class="clients__content">

			<?php while ( have_rows( 'clients' ) ) : the_row(); ?>

				<li class="clients__client scroll-effect effect-fade-in">

					<div class="clients__client__inner scroll-effect-target">

						<?php echo wp_remote_retrieve_body( wp_remote_get( get_sub_field( 'client_logo' ), array( 'sslverify' => false ) ) ); ?>

					</div>

				</li>
				<!-- // .clients_client -->

			<?php endwhile; ?>

		</ul>
		<!-- // .clients__content -->

	<?php endif; ?>

</section>
<!-- // .clients.entry-content -->
