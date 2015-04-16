<?php
/**
 * @package RP3
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog' ); ?>>

	<!-- Article Header -->

	<header class="single-blog__entry-header entry-header">

		<h1 class="single-blog__entry-title entry-title"><?php the_title(); ?></h1>

		<div class="single-blog__entry-meta entry-meta">

			<?php echo get_the_date(); ?>

		</div>
		<!-- // .entry-meta -->

		<?php if ( '' != get_the_post_thumbnail() ) : ?>

			<div class="single-blog__thumbnail">

				<?php the_post_thumbnail(); ?>

			</div>

		<?php endif; ?>

	</header>
	<!-- .entry-header -->


	<div class="single-blog__container">

		<!-- Primary: Main content -->

		<div id="primary" class="single-blog__primary">

			<article>

				<div class="single-blog__entry-content entry-content">

					<?php the_content(); ?>

				</div>
				<!-- .entry-content -->

			</article>

			<?php if ( function_exists( 'sharing_display' ) ) : ?>

				<!-- Sharing -->

				<div class="single-blog__sharing">

					<?php sharing_display( '', true ); ?>

				</div>

			<?php endif; ?>

		</div>
		<!-- // primary -->

	</div>
	<!-- // container -->

</div>
