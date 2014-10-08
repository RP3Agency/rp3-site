<?php
/**
 * The template used for displaying content for a single case study
 *
 * @package RP3
 */

// Get the list of related tags in an array
$terms = get_the_terms( get_the_ID(), 'rp3_tax_work_tags' );
foreach ( $terms as $term ) {
	$work_tags[] = $term->name;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study' ); ?>>

	<div class="case-study--single__entry-content entry-content">

		<header class="case-study__header">
			<h1 class="case-study__title"><?php the_title(); ?></h1>
			<p class="case-study__tagline"><?php the_field( 'tagline' ); ?></p>
		</header>
		<!-- // .case-study__header -->

	</div>

	<?php if ( '' != get_field( 'intro_image' ) ) : ?>

	<?php echo rp3_full_bleed_hero_image( get_field( 'intro_image' ), array(
		'image_size'	=> 'case-study',
		'classes'		=> 'hero-image case-study-hero-image'
	) ); ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Think:</h2>

		<?php the_field( 'think' ); ?>

	</div>


	<?php if ( '' != get_field( 'think_image' ) ) : ?>

	<?php echo rp3_full_bleed_hero_image( get_field( 'think_image' ), array(
		'image_size'	=> 'case-study',
		'classes'		=> 'hero-image case-study-hero-image'
	) ); ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Feel:</h2>

		<?php the_field( 'feel' ); ?>

	</div>


	<?php if ( '' != get_field( 'feel_image' ) ) : ?>

	<?php echo rp3_full_bleed_hero_image( get_field( 'feel_image' ), array(
		'image_size'	=> 'case-study-tall',
		'classes'		=> 'hero-image case-study-hero-image-tall'
	) ); ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Build:</h2>

		<?php the_field( 'build' ); ?>

	</div>


	<?php if ( have_rows( 'build_images' ) ) : ?>

		<?php while ( have_rows( 'build_images' ) ) : the_row(); ?>

			<?php echo rp3_full_bleed_hero_image( get_sub_field( 'build_image' ), array(
			'image_size'	=> 'case-study',
				'classes'	=> 'hero-image case-study-hero-image'
			) ); ?>

		<?php endwhile; ?>

	<?php endif; ?>


	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Results:</h2>

		<?php the_field( 'results' ); ?>

	</div>


	<?php if ( '' != get_field( 'results_image' ) ) : ?>

	<?php echo rp3_full_bleed_hero_image( get_field( 'results_image' ), array(
		'image_size'	=> 'case-study',
		'classes'		=> 'hero-image case-study-hero-image'
	) ); ?>

	<?php endif; ?>


	<?php /*
	<div class="case-study--single__entry-content--indented entry-content">

		<h2>Related Tags:</h2>

		<?php echo join( ', ', $work_tags ); ?>

	</div>
	*/ ?>


	<?php /*
	<?php $related_work = get_field( 'related_work_items' ); ?>

	<?php if ( $related_work ) : ?>

		<div class="case-study--single__entry-content--indented--full-width entry-content">

			<h2>Related Work:</h2>

			<ul class="case-study__related-work">

				<?php foreach ( $related_work as $post ) : ?>

					<?php setup_postdata( $post ); ?>

					<li class="case-study__related-work-item">
						<?php if ( '' != get_the_post_thumbnail() ) :
							echo get_the_post_thumbnail();
						endif; ?>
						<h2><?php the_title(); ?></h2>
					</li>

				<?php endforeach; ?>
				
			</ul>

		</div>

	<?php endif; wp_reset_postdata(); ?>
	*/ ?>

</article>
<!-- #post-## -->
