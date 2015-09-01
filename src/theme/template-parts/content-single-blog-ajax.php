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
