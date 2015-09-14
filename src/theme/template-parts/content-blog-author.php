<?php
/**
 * Author(s) via Co-authors Plus Plugin
 */

if ( function_exists( 'get_coauthors' ) ) {

	$coauthors = get_coauthors();

	wp_die( var_dump( get_post_meta( $coauthor->ID, 'rp3_alumni', true ) ) );

	foreach( $coauthors as $coauthor ) :

		/** Get appropriate photo (if any) based on author type */

		if ( 'guest-author' == $coauthor->type ) {

			$coauthor_photo = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'four_three_small' );
			$coauthor_photo_url = $coauthor_photo[0];

			$coauthor_photo_2x = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'four_three_small_2x' );
			$coauthor_photo_url_2x = $coauthor_photo_2x[0];

		} else {

			$coauthor_photo = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'four_three_small' );
			$coauthor_photo_url = $coauthor_photo[0];

			$coauthor_photo_2x = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'four_three_small_2x' );
			$coauthor_photo_url_2x = $coauthor_photo_2x[0];

		}
?>

<?php /** Only show author information if they are current RP3ers. */ ?>

<?php if ( ! get_the_author_meta( 'rp3_alumni' ) ) : ?>

	<?php /** If this is an author archive page, only show the author requested */ ?>

	<?php // if ( ( is_singular() ) || ( ( is_author() ) && ( get_query_var( 'author_name' ) == $coauthor->user_nicename ) ) ) : ?>

		<section class="blog__author">

			<header class="blog__author__header">

				<div class="blog__author__meta">

					<div class="blog__author__image">

						<img srcset="<?php echo $coauthor_photo_url; ?>, <?php echo $coauthor_photo_url_2x; ?> 2x">

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

	<?php // endif; ?>

<?php endif; ?>

<?php
	endforeach;
} else {
	// TK
}
