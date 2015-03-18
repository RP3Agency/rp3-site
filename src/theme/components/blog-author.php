<?php
/**
 * Author(s) via Co-authors Plus Plugin
 */

if ( function_exists( 'get_coauthors' ) ) {

	$coauthors = get_coauthors();

	foreach( $coauthors as $coauthor ) :

		/** Get appropriate photo (if any) based on author type */

		if ( 'guest-author' == $coauthor->type ) {

			$coauthor_photo = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'blog-author' );
			$coauthor_photo_url = $coauthor_photo[0];

			$coauthor_photo_2x = wp_get_attachment_image_src( get_post_thumbnail_id( $coauthor->ID ), 'blog-author-2x' );
			$coauthor_photo_url_2x = $coauthor_photo_2x[0];

		} else {

			$coauthor_photo = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'blog-author' );
			$coauthor_photo_url = $coauthor_photo[0];

			$coauthor_photo_2x = wp_get_attachment_image_src( get_the_author_meta( 'photo', $coauthor->ID ), 'blog-author-2x' );
			$coauthor_photo_url_2x = $coauthor_photo_2x[0];

		}
?>

<?php /** Only show author information if we have an image. Otherwise, it just looks stupid. */ ?>

<?php if ( '' != $coauthor_photo ) : ?>

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

		<h2 class="blog__author__name"><?php echo $coauthor->display_name; ?></h2>

		<?php /** All other biographical information limited to current RP3ers */ ?>

		<?php if ( 'guest-author' != $coauthor->type ) : ?>

			<?php echo wpautop( get_the_author_meta( 'description', $coauthor->ID ) ); ?>

		<?php /** List last three posts by the same coauthor */ ?>

		<?php
echo $coauthor->user_nicename;

		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> 3,
			'post_status'		=> 'publish',
			'author_name'		=> $coauthor->user_nicename,
			'post__not_in'		=> array( get_the_ID() ),
			'category_name'		=> 'blog',
			'order'				=> 'DESC',
			'orderby'			=> 'date'
		);

		if ( $author_query = new WP_Query( $args ) ) :
		?>

		<div class="blog__author__posts">

			<h2>Recent Posts by <?php echo $coauthor->display_name; ?>:</h2>

			<ul>

				<?php while ( $author_query->have_posts() ) : $author_query->the_post(); ?>

					<li><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

			</ul>

		</div>
		<!-- blog author posts -->
		
		<?php endif; wp_reset_query(); ?>

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

			</ul>

		<?php endif; ?>

	</div>
	<!-- // blog author bio -->

</section>
<!-- // blog__author -->

<?php endif; ?>

<?php
	endforeach;
} else {
	// TK
}
