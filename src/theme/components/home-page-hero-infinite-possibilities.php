<?php /*
<?php $post = get_field( 'home_page_hero' ); ?>

<?php if ( $post ) : ?>

	<?php setup_postdata( $post ); ?>

	<?php echo rp3_full_bleed_hero_image( get_post_thumbnail_id( get_the_ID() ), array(
		'id'			=> 'home-hero',
		'permalink'		=> get_the_permalink(),
		'title'			=> get_the_title(),
		'client'		=> get_field( 'client' )
	) ); ?>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>
*/ ?>


<section id="home-splash" class="home-splash home-hero hero hero-image infinite-possibilities-hero component">

	<a href="<?php echo esc_url( home_url( '/work/infinite-possibilities' ) ); ?>" class="hero__container">

		<div class="hero__image">

			<div class="home-splash__inner">

				<video autoplay loop muted class="home-splash__video">
					<source src="<?php echo esc_url( get_template_directory_uri() . '/videos/city-of-possibilities.mp4' ) ?>" />
				</video>

			</div>
			<!-- // home-splash__inner -->

		</div>
		<!-- // hero__image -->

		<div class="hero__headline">
			<h1>Infinite Possibilities</h1>

			for <strong>Norfolk Southern</strong>
		</div>

	</a>

</section>

<?php wp_reset_postdata(); ?>
