<?php
/**
 * The template used for displaying content for a single case study
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>

	<div class="case-study--single__entry-content entry-content">

		<header class="case-study__header">
			<h1 class="case-study__title"><?php the_title(); ?></h1>
			<p class="case-study__tagline"><?php the_field( 'tagline' ); ?></p>
		</header>
		<!-- // .case-study__header -->

	</div>


	<?php echo rp3_full_bleed_hero_image( get_field( 'image_1' ) ); ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Think:</h2>

		<?php the_field( 'think' ); ?>

	</div>


	<?php echo rp3_full_bleed_hero_image( get_field( 'image_2' ) ); ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Feel:</h2>

		<?php the_field( 'feel' ); ?>

	</div>


	<?php echo rp3_full_bleed_hero_image( get_field( 'image_3' ) ); ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Build:</h2>

		<?php the_field( 'build' ); ?>

	</div>


	<?php if ( have_rows( 'image_4' ) ) : ?>

		<?php while ( have_rows( 'image_4' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'image' ) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Results:</h2>

		<?php the_field( 'results' ); ?>

	</div>


	<?php echo rp3_full_bleed_hero_image( get_field( 'image_5' ) ); ?>


</article>
<!-- #post-## -->
