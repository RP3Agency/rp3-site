<?php
/**
 * @package RP3
 */

// Query all of our "careers" post (by category name)
$careers = new WP_Query( array(
	'category_name'			=> 'careers',
	'posts_per_page'		=> -1
));

// Feed the results into two arrays, one for jobs and one for internships
if ( $careers->have_posts() ) {
	while ( $careers->have_posts() ) {
		$careers->the_post();

		if ( has_category( 'internships' ) ) {
			$internships[] = $post;
		} else {
			$jobs[] = $post;
		}
	}
}

// Reset the query before moving on.
wp_reset_query();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<!-- .entry-content -->

</article>
<!-- #post-## -->


<div class="page__hero-image hero-image">
<?php
if ( '' !== get_the_post_thumbnail() ) {
	echo rp3_picture_element( get_post_thumbnail_id(), 'home-page-hero', '' );
}
?>
</div>



<?php // Additional content about our awesome culture ?>

<?php if ( '' !== get_field( 'secondary_copy' ) ) : ?>

	<section class="careers__secondary-copy">

		<?php the_field( 'secondary_copy' ); ?>

	</section>

<?php endif; ?>



<?php
// Jobs
if ( is_array( $jobs ) && ( count( $jobs ) > 0 ) ) :
?>

<section class="careers">

	<header class="careers__header--section">
		<h1>Job Openings</h1>
	</header>
	<!-- // .careers__header—section -->

	<div class="careers__row">

<?php
	foreach ( $jobs as $post ) :
		setup_postdata( $post );
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('careers__article'); ?>>

			<a href="<?php the_permalink(); ?>" rel="bookmark" class="block">

				<header class="careers__header--article">
					<h2 class="careers__title"><?php the_title(); ?></h2>
				</header>
				<!-- // .careers__header—article -->

				<div class="careers__summary">
					<?php // We don't want sharing links here, exactly. ?>
					<?php remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
					<?php the_excerpt(); ?>
				</div>
				<!-- // .careers__summary -->

				<footer class="careers__footer">
					<p class="link">Learn more</p>
				</footer>
				<!-- // .careers__footer -->

			</a>

		</article>
		<!-- #post-## -->

<?php endforeach; ?>

	</div>
	<!-- // .careers__row -->

</section>
<!-- // .careers -->

<?php endif; wp_reset_postdata(); ?>



<?php
// Internships
if ( is_array( $internships ) && ( count( $internships ) > 0 ) ) :
?>

<section class="careers">

	<header class="careers__header--section">
		<h1>Internships</h1>
	</header>
	<!-- // .careers__header -->

	<div class="careers__row">

<?php
	foreach ( $internships as $post ) :
		setup_postdata( $post );
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('careers__article'); ?>>

			<a href="<?php the_permalink(); ?>" rel="bookmark" class="block">

				<header class="careers__header--article">
					<h2 class="careers__title"><?php the_title(); ?></h2>
				</header>
				<!-- // .careers__header—article -->

				<div class="careers__summary">
					<?php // We don't want sharing links here, exactly. ?>
					<?php remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
					<?php the_excerpt(); ?>
				</div>
				<!-- // .careers__summary -->

				<footer class="careers__footer">
					<p class="link">Learn more</p>
				</footer>
				<!-- // .careers__footer -->

			</a>

		</article>
		<!-- #post-## -->

<?php endforeach; ?>

	</div>
	<!-- // .careers__row -->

</section>
<!-- // .careers -->

<?php endif; wp_reset_postdata(); ?>
