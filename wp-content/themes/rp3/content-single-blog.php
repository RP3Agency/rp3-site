<?php
/**
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Article Header -->

	<header class="entry-header">

		<a href="<?php echo esc_url( home_url( '/news-views/' ) ); ?>" class="entry-back">Back to Articles</a>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php echo rp3_byline( 'blog', 'single' ); ?>
		</div>
		<!-- // .entry-meta -->

	</header>
	<!-- .entry-header -->

	<?php the_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rp3' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">


		<!--BEGIN .author-bio-->
		<div class="author-bio">

			<!-- BEGIN .author-inner -->
			<div class="author-inner clearfix">

				<?php
					if ( class_exists( CoAuthorsIterator ) ) {
						$links = get_the_coauthor_meta('user_url');
						$desc = get_the_coauthor_meta('description');
						$i = new CoAuthorsIterator();
						$authors = $i->get_all();
						foreach($authors as $author){
							print '<div class="author-wrap clearfix">';
							//print_r($author);
							echo get_avatar( $author->user_email, '70' );
							print '<div class="author-info"><div class="author-title">';
							// echo '<a href="' . get_author_posts_url( $author->ID ) . '">' . get_the_author_meta( 'display_name', $author->ID ) . '</a>';
							echo get_the_author_meta( 'display_name', $author->ID );
							print '</div><div class="author-description">'.$desc[$author->ID].'</div>';
							print '</div>';
							print '</div>';
						}
					}
				?>

			<!-- END .author-inner -->
			</div>

		<!--END .author-bio-->
		</div>

		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'rp3' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ' ', 'rp3' ) );

			if ( ! rp3_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'rp3' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'rp3' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="entry-categories">Tagged:</span> %2$s', 'rp3' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'rp3' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

	</footer>
	<!-- .entry-footer -->

</article>
<!-- #post-## -->
