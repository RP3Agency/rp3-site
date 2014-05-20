<?php
/**
 * @package RP3
 */

$careers = new WP_Query( array(
	'category_name'			=> 'careers',
	'posts_per_page'		=> 1
));
?>

<?php if ( $careers->have_posts() ): while ( $careers->have_posts() ): $careers->the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php the_permalink(); ?>" rel="bookmark">

		<div class="entry-wrapper">

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer class="entry-footer">
				<?php if ( ! is_archive() ) : ?>
	
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'rp3' ) );
						if ( $categories_list && rp3_categorized_blog() ) :
					?>
					<span class="cat-links">
						<?php printf( __( 'Posted in %1$s', 'rp3' ), $categories_list ); ?>
					</span>
					<?php endif; // End if categories ?>

					<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', __( ', ', 'rp3' ) );
						if ( $tags_list ) :
					?>
					<span class="tags-links">
						<?php printf( __( 'Tagged %1$s', 'rp3' ), $tags_list ); ?>
					</span>
					<?php endif; // End if $tags_list ?>
				<?php endif; // End if 'post' == get_post_type() ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && ( ! has_category('news') ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rp3' ), __( '1 Comment', 'rp3' ), __( '% Comments', 'rp3' ) ); ?></span>
				<?php endif; ?>

				<?php edit_post_link( __( 'Edit', 'rp3' ), '<span class="edit-link">', '</span>' ); ?>

				<?php else: ?>
				<p><i>Continue reading &rarr;</i></p>
				<?php endif; // ! is_archive() ?>

			</footer><!-- .entry-footer -->

		</div>
		<!-- // .entry-wrapper -->

	</a>

</article><!-- #post-## -->

<?php endwhile; endif; ?>
