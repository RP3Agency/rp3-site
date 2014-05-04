<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */

$people = rp3_get_people();

// Initialize a counter.
$counter = 0;

// and another counter for our spacer images
$spacer_counter = 0;
?>


<section id="people" class="people">

	<?php foreach ( $people as $person ): ?>

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

		<?php if ( ! is_array( $person ) ): $spacer_counter++; // This is actually a spacer entry ?>

		<div class="spacer space-<?php echo $spacer_counter; ?>"></div>

		<?php else: ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( $person['user_login'] ); ?> style="background-image:url(<?php echo $background_image; ?>)">
			<div class="caption">
				<h1 class="name"><?php echo $person['first_name'] . ' ' . $person['last_name']; ?></h1>
				<h2 class="title"><?php echo $person['title']; ?></h2>

				<div class="subcontent">
					<p><?php echo $person['biography']; ?></p>

					<ul class="social">
						<?php if ( $person['facebook'] != '' ): ?><li class="facebook"><a href="<?php echo $person['facebook']; ?>">Facebook</a></li><?php endif; ?>
						<?php if ( $person['twitter'] != '' ): ?><li class="twitter"><a href="<?php echo $person['twitter']; ?>">Twitter</a></li><?php endif; ?>
						<?php if ( $person['linkedin'] != '' ): ?><li class="linkedin"><a href="<?php echo $person['linkedin']; ?>">LinkedIn</a></li><?php endif; ?>
						<?php if ( $person['github'] != '' ): ?><li class="github"><a href="<?php echo $person['github']; ?>">Github</a></li><?php endif; ?>
						<?php if ( $person['dribbble'] != '' ): ?><li class="dribbble"><a href="<?php echo $person['dribbble']; ?>">Dribbble</a></li><?php endif; ?>
						<?php if ( $person['instagram'] != '' ): ?><li class="instagram"><a href="<?php echo $person['instagram']; ?>">Instagram</a></li><?php endif; ?>
						<?php if ( $person['pinterest'] != '' ): ?><li class="pinterest"><a href="<?php echo $person['pinterest']; ?>">Pinterest</a></li><?php endif; ?>
						<li class="email"><a href="mailto:<?php echo $person['email']; ?>">Email</a></li>
					</ul>

					<?php // Latest blog posts, if any; commented out for now because of space issues

						/*
						if ( $person['blogs']->post_count > 0 ) {
							echo '<h2>Latest blog posts:</h2>';

							echo '<ul>';

							while ( $person['blogs']->have_posts() ) {
								$person['blogs']->the_post();

								echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
							}

							echo '</ul>';
						}
						*/

					?>
				</div>
				<!-- // .subcontent -->

			</div>
		</article>

		<?php endif; ?>

	<?php if ( ( $counter == 1 ) || ( ( $counter % 3 ) == 1 ) ) echo '</div><!-- // .row -->'; ?>

	<?php $counter++; endforeach; ?>

</section>
