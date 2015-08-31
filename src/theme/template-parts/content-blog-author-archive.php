<?php
/**
 * Author information for his/her archive page
 */

if ( function_exists( 'get_coauthors' ) ) {

	$coauthors = get_coauthors();

	foreach( $coauthors as $coauthor ) :

		/** Get appropriate photo (if any) based on author type */

		if ( 'guest-author' == $coauthor->type ) {

			$image['small'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_medium' );
			$image['small_2x'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_medium_2x' );

			$image['medium'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_large' );
			$image['medium_2x'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_large_2x' );

			$image['large'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_medium' );
			$image['large_2x'] = wp_get_attachment_image_src( $coauthor->ID, 'three_four_medium_2x' );

		} else {

			$image['small'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_medium' );
			$image['small_2x'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_medium_2x' );

			$image['medium'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_large' );
			$image['medium_2x'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_large_2x' );

			$image['large'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_medium' );
			$image['large_2x'] = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'three_four_medium_2x' );
		}
?>

<?php /** Only show author information if we have an image. Otherwise, it just looks stupid. */ ?>

<?php if ( ! empty( $image ) ) : ?>

	<?php /** If this is an author archive page, only show the author requested */ ?>

	<?php if ( ( is_author() ) && ( get_query_var( 'author_name' ) == $coauthor->user_nicename ) ) : ?>

		<section class="blog__author">

			<header class="blog__author__header">

				<div class="blog__author__meta">

					<div class="blog__author__image">

						<picture>
							<source srcset="<?php echo esc_url( $image['large'][0] ); ?>, <?php echo esc_url( $image['large_2x'][0] ); ?> 2x" media="(min-width: 37.5rem)" />
							<source srcset="<?php echo esc_url( $image['medium'][0] ); ?>, <?php echo esc_url( $image['medium_2x'][0] ); ?> 2x" media="(min-width: 20.0625rem)" />
							<source srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
							<img srcset="<?php echo esc_url( $image['small'][0] ); ?>, <?php echo esc_url( $image['small_2x'][0] ); ?> 2x" />
						</picture>

					</div>
					<!-- // blog author image -->

				</div>
				<!-- // blog author meta -->

			</header>
			<!-- blog author header -->

			<div class="blog__author__bio">

				<?php /** All other biographical information limited to current RP3ers */ ?>

				<?php if ( 'guest-author' != $coauthor->type ) : ?>

					<p>
						<a href="<?php echo esc_url( get_author_posts_url( $coauthor->ID ) ); ?>"><?php echo $coauthor->display_name; ?></a>
						<?php echo get_the_author_meta( 'description', $coauthor->ID ); ?>
					</p>

					<!-- Social media presence -->

					<ul class="blog__author__social social">

						<?php if ( '' != get_the_author_meta( 'user_email', $coauthor->ID ) ) : ?>
						<li class="email"><a href="<?php echo esc_url( 'mailto:' . get_the_author_meta( 'user_email', $coauthor->ID ) ); ?>">Email</a></li>
						<?php endif; ?>

						<?php if ( '' != get_the_author_meta( 'facebook', $coauthor->ID ) ) : ?>
						<li class="facebook"><a href="<?php echo esc_url( get_the_author_meta( 'facebook', $coauthor->ID ) ); ?>">Facebook</a></li>
						<?php endif; ?>

						<?php if ( '' != get_the_author_meta( 'twitter', $coauthor->ID ) ) : ?>
						<li class="twitter"><a href="<?php echo esc_url( get_the_author_meta( 'twitter', $coauthor->ID ) ); ?>">Twitter</a></li>
						<?php endif; ?>

						<?php if ( '' != get_the_author_meta( 'linkedin', $coauthor->ID ) ) : ?>
						<li class="linkedin"><a href="<?php echo esc_url( get_the_author_meta( 'linkedin', $coauthor->ID ) ); ?>">LinkedIn</a></li>
						<?php endif; ?>

						<?php if ( '' != get_the_author_meta( 'instagram', $coauthor->ID ) ) : ?>
						<li class="instagram"><a href="<?php echo esc_url( get_the_author_meta( 'instagram', $coauthor->ID ) ); ?>">Instagram</a></li>
						<?php endif; ?>

					</ul>

				<?php endif; ?>

			</div>
			<!-- // blog author bio -->

		</section>
		<!-- // blog__author -->

	<?php endif; ?>

<?php endif; ?>

<?php
	endforeach;
} else {
	// TK
}
