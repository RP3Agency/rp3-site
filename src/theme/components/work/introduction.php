<?php
if ( 'true' == get_field( 'case_study' ) ) {
	$class = esc_attr( 'case-study-introduction' );
} else {
	$class = esc_attr( 'work-introduction' );
}
?>

<div class="<?php echo $class; ?>__entry-content entry-content">

	<header class="<?php echo $class; ?>__header">
		<h1 class="<?php echo $class; ?>__title"><?php the_title(); ?></h1>

		<?php // if the client field has content AND if that content doesn't exactly match the post title... ?>
		<?php if ( ( '' != get_field( 'client' ) ) && ( get_the_title() != get_field( 'client' ) ) ) : ?>

			<div class="<?php echo $class; ?>__client">for <strong><?php the_field( 'client' ); ?></strong></div>

		<?php endif; ?>

		<?php // if the tagline field has content ?>
		<?php if ( '' != get_field( 'tagline' ) ) : ?>

			<div class="<?php echo $class; ?>__tagline"><?php the_field( 'tagline' ); ?></div>

		<?php endif; ?>

	</header>
	<!-- // .<?php echo $class; ?>__header -->

</div>
