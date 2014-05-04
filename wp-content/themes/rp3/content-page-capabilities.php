<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

/**
 * 1. Query capabilties.
 * 2. Loop through query results 3 times, displaying "Think", then "Make", then "Do".
 * 3. At the start of each loop, display taxonomy name and description.
 */

// Capability Types
$cap_types = array( 'think', 'make', 'do' );

// Query capabilities
$capabilities = new WP_Query( array(
	'post_type'			=> 'rp3_capabilities',
	'posts_per_page'	=> -1,
	'orderby'			=> 'menu_order',
	'order'				=> 'ASC'
) );
?>


<section id="capabilities" class="capabilities">

	<?php foreach ( $cap_types as $type ) : ?>

		<?php // Get our capability type information
		$term = get_term_by( 'slug', $type, 'rp3_capabilities_types' );
		?>

	<!-- <?php echo $term->name; ?> -->

	<div id="capabilities-<?php echo $term->slug; ?>" class="<?php echo $term->slug; ?>">

		<h1 class="taxonomy-title"><?php echo $term->name; ?></h1>

		<p class="taxonomy-description"><?php echo $term->description; ?></p>

		<ul class="taxonomy-listing">

		<?php if ( $capabilities->have_posts() ) : while ( $capabilities->have_posts() ) : $capabilities->the_post(); ?>

			<?php if ( has_term( $term->slug, 'rp3_capabilities_types' ) ) : ?>

				<li><?php the_title(); ?></li>

			<?php endif; ?>

		<?php endwhile; endif; wp_reset_query(); // Closing and resetting the loop ?>

		</ul>

	</div>
	<!-- #capabilities-<?php echo $term->slug; ?> -->

	<?php endforeach; ?>


	<?php /*
	<!-- Make -->

	<div id="capabilities-make" class="make">

		<h1 class="entry-title">Make</h1>

		<?php if ( $capabilities->have_posts() ) : while ( $capabilities->have_posts() ) : $capabilities->the_post(); ?>

			<?php if ( has_term( 'make', 'rp3_capabilities_types' ) ) : ?>

				<?php the_title(); ?>

			<?php endif; ?>

		<?php endwhile; endif; wp_reset_query(); // Closing and resetting the loop ?>

	</div>
	<!-- // #capabilities-make -->
	*/ ?>


	<?php /*
	<!-- Do -->

	<div id="capabilities-do" class="do">

		<h1 class="entry-title">Do</h1>

		<?php if ( $capabilities->have_posts() ) : while ( $capabilities->have_posts() ) : $capabilities->the_post(); ?>

			<?php if ( has_term( 'do', 'rp3_capabilities_types' ) ) : ?>

				<?php the_title(); ?>

			<?php endif; ?>

		<?php endwhile; endif; wp_reset_query(); // Closing and resetting the loop ?>

	</div>
	<!-- // #capabilities-do -->
	*/ ?>

</section>
