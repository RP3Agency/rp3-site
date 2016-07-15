<?php
/**
 * @package RP3
 */
?>

<?php /** If comments are open or we have at least one comment, load up the comment template */ ?>

<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

	<!-- Comments -->

	<?php comments_template( '/template-parts/content-blog-comments.php' ); ?>

<?php endif; ?>

<?php if ( get_field( 'link_white_paper' ) ) : ?>

	<?php get_template_part( 'template-parts/component', 'blog-interstitial--white-paper' ); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'blog-related' ); ?>

<?php endif; ?>
