<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package RP3
 */
?>

<article <?php post_class( '404 page__generic' ); ?>>

	<div class="entry-content">

		<section class="error-404 not-found">

			<header class="page-header">
				<h1 class="page-title">Oh, snap!</h1>
			</header>
			<!-- .page-header -->

			<div class="page-content">

				<p><?php get_template_part( 'template-parts/inline', 'rp404.svg' ); ?></p>

				<p>The page you were trying to find doesn't seem to exist or perhaps we simply misplaced it.</p>

				<p>Either way, use the handy menu above to get back to the goodness.</p>

			</div>
			<!-- .page-content -->

		</section>
		<!-- .error-404 -->

	</div>
	<!-- // .entry-content -->

</article>
