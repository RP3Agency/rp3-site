<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RP3
 */
?>

<section class="no-results not-found">

	<div class="entry-content">

		<div class="entry-content__container">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', 'rp3' ); ?></h1>
			</header><!-- .page-header -->

			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rp3' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rp3' ); ?></p>

				<section class="search-form">

					<?php get_search_form(); ?>

				</section>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rp3' ); ?></p>

				<section class="search-form">

					<?php get_search_form(); ?>

				</section>

			<?php endif; ?>

		</div>
		<!-- .entry-content__container -->

	</div>
	<!-- // .entry-content -->

</section>
<!-- .no-results -->
