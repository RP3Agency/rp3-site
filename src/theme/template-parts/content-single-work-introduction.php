<div class="work-single__introduction">

	<header class="work-single__header">

		<h1 class="work-single__title"><?php the_title(); ?></h1>

		<?php // if the client field has content AND if that content doesn't exactly match the post title... ?>
		<?php if ( ( '' != get_field( 'client' ) ) && ( get_the_title() != get_field( 'client' ) ) ) : ?>

			<div class="work-single__client">for <strong><?php the_field( 'client' ); ?></strong></div>

		<?php endif; ?>

		<?php // if the tagline field has content ?>
		<?php if ( '' != get_field( 'tagline' ) ) : ?>

			<div class="work-single__tagline"><?php the_field( 'tagline' ); ?></div>

		<?php endif; ?>

	</header>
	<!-- // .work-single__header -->

</div>
