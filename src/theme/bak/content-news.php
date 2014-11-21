<?php
/**
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<a href="<?php the_permalink(); ?>" rel="bookmark">

		<?php if ( is_search() || is_archive() ) : ?>
			<?php if ( get_the_post_thumbnail() != '' ) : ?>
			<div class="entry-featured-image"><?php the_post_thumbnail(); ?></div>
			<?php endif; // get_the_post_thumbnail() != '' ?>
		<?php endif; ?>

		<div class="entry-wrapper">

			<header class="entry-header">
				<div class="entry-date"><?php rp3_output_the_date(); ?></div>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<?php if ( is_search() || is_archive() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'rp3' ) ); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'rp3' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php endif; ?>

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
