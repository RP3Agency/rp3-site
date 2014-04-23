<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

$people = rp3_get_people();

// echo '<pre>';

// foreach ( $people as $person ) {
// 	var_dump( $person );
// }
// exit();

// Initialize a counter.
$counter = 0;
?>


<section id="people" class="people">

	<?php foreach ( $people as $person ): ?>

	<?php echo "<!-- " . $counter . " ( " . $counter % 3 . " ) -->\n"; ?>

	<?php
	// For now, because we don't have photos of everyone appearing on the site,
	// test to see if our "photo" information is the ID of an object in the database,
	// or a straight-up <img> html tag
	if ( preg_match( '/^\d+$/', $person['photo'] ) ) {
		$image_array = wp_get_attachment_image_src( $person['photo'] );
		$background_image = $image_array[0];
	} else {
		preg_match( '/http:\/\/([^\'"]+)/', $person['photo'], $matches );
		$background_image = $matches[0];
	}
	?>

	<?php if ( ( $counter == 0 ) || ( ( $counter % 3 == 2 ) ) ) echo '<div class="row">'; ?>

		<?php if ( ! is_array( $person ) ): // This is actually a spacer entry ?>

		<div class="spacer"></div>

		<?php else: ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background-image:url(<?php echo $background_image; ?>)">
			<a href="#!">
				<div class="caption">
					<span class="name"><?php echo $person['first_name'] . ' ' . $person['last_name']; ?></span>
					<span class="title"><?php echo $person['title']; ?></span>
				</div>
			</a>
		</article>

		<?php endif; ?>

	<?php if ( ( $counter == 1 ) || ( ( $counter % 3 ) == 1 ) ) echo '</div><!-- // .row -->'; ?>

	<?php $counter++; endforeach; ?>

</section>
