<?php
/**
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'careers--single' ); ?>>

	<div class="careers--single__entry-content entry-content component component--padded">

		<header class="careers__header">
			<h1 class="careers__title"><?php the_title(); ?></h1>
			<p class="careers__tagline"><?php the_field( 'tagline' ); ?></p>
		</header>
		<!-- // .careers__header -->

		<div class="careers__primary">

			<div class="entry-content__container">

				<?php the_content(); ?>

			</div>
			<!-- // .entry-content__container -->

			<div class="careers__details">


				<?php // Responsibilities ?>

				<?php if ( '' !== get_field( 'responsibilities' ) ) : ?>

				<header class="careers__header--section no-bottom-margin">
					<h2>Responsibilities</h2>
				</header>
				<!-- // .careers__header -->

				<?php the_field( 'responsibilities' ); ?>

				<?php endif; ?>



				<?php // Skills ?>

				<?php if ( '' !== get_field( 'skills' ) ) : ?>

				<header class="careers__header--section no-bottom-margin">
					<h2>Skills</h2>
				</header>
				<!-- // .careers__header -->

				<?php the_field( 'skills' ); ?>

				<?php endif; ?>

			</div>
			<!-- // .careers__details -->

		</div>
		<!-- // .careers primary -->

		<div class="careers__secondary">

			<?php // Sidebar ?>

			<?php get_sidebar( 'careers' ); ?>

		</div>
		<!-- // .careers secondary -->

	</div>
	<!-- // .entry-content -->

</article>
<!-- // #post-## -->
