<section id="home-splash" class="home-splash home-hero hero hero-image infinite-possibilities-hero component">

	<a href="<?php echo esc_url( home_url( '/work/infinite-possibilities' ) ); ?>" class="hero__container">

		<div class="hero__image">

			<div class="home-splash__inner">

				<video autoplay loop muted controls class="home-splash__video" poster="<?php echo esc_url( get_template_directory_uri() . '/images/infinite-possibilities/poster.jpg' ); ?>">
					<source src="<?php echo esc_url( get_template_directory_uri() . '/videos/city-of-possibilities.mp4' ) ?>" />
				</video>

			</div>
			<!-- // home-splash__inner -->

		</div>
		<!-- // hero__image -->

		<div id="infinite-possibilities-headline" class="hero__headline visible">
			<h1>Infinite Possibilities</h1>

			for <strong>Norfolk Southern</strong>
		</div>

	</a>

</section>

<?php wp_reset_postdata(); ?>
