<?php
/**
 * Author information for his/her archive page
 */

if ( function_exists( 'get_coauthors' ) ) {

	$coauthors = get_coauthors();

	foreach( $coauthors as $coauthor ) :

		$coauthor_photo = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'four_three_small' );
		$coauthor_photo_url = $coauthor_photo[0];

		$coauthor_photo_2x = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'four_three_small_2x' );
		$coauthor_photo_url_2x = $coauthor_photo_2x[0];
?>

<?php /** Only show author information if they are current RP3ers. */ ?>

<?php if ( ! get_post_meta( $coauthor->ID, 'rp3_alumni', true ) ) : ?>

	<?php /** If this is an author archive page, only show the author requested */ ?>

	<?php if ( ( is_author() ) && ( get_query_var( 'author_name' ) == $coauthor->user_nicename ) ) : ?>

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

				<p>
					<?php echo $coauthor->display_name; ?>
					<?php echo $coauthor->description; ?>
				</p>

				<!-- Social media presence -->

				<ul class="blog__author__social social">

					<?php if ( '' != $coauthor->user_email ) : ?>
					<li class="email"><a href="<?php echo esc_url( 'mailto:' . $coauthor->user_email ); ?>">Email</a></li>
					<?php endif; ?>

					<?php if ( '' != get_post_meta( $coauthor->ID, 'facebook', true ) ) : ?>
					<li class="facebook"><a href="<?php echo esc_url( get_post_meta( $coauthor->ID, 'facebook', true ) ); ?>">Facebook</a></li>
					<?php endif; ?>

					<?php if ( '' != get_post_meta( $coauthor->ID, 'twitter', true ) ) : ?>
					<li class="twitter"><a href="<?php echo esc_url( get_post_meta( $coauthor->ID, 'twitter', true ) ); ?>">Twitter</a></li>
					<?php endif; ?>

					<?php if ( '' != get_post_meta( $coauthor->ID, 'linkedin', true ) ) : ?>
					<li class="linkedin"><a href="<?php echo esc_url( get_post_meta( $coauthor->ID, 'linkedin', true ) ); ?>">LinkedIn</a></li>
					<?php endif; ?>

					<?php if ( '' != get_post_meta( $coauthor->ID, 'instagram', true ) ) : ?>
					<li class="instagram"><a href="<?php echo esc_url( get_post_meta( $coauthor->ID, 'instagram', true ) ); ?>">Instagram</a></li>
					<?php endif; ?>

					<?php if ( '' != get_post_meta( $coauthor->ID, 'github', true ) ) : ?>
					<li class="github"><a href="<?php echo esc_url( get_post_meta( $coauthor->ID, 'github', true ) ); ?>">GitHub</a></li>
					<?php endif; ?>

				</ul>

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
