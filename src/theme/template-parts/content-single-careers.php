<?php
/**
 * @package RP3
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-content' ); ?>>

	<div class="single-post-content__wrapper">

		<!-- Article Header -->

		<header class="single-post-content__header single-post-content__content">

			<h1 class="single-post-content__title"><?php the_title(); ?></h1>

		</header>
		<!-- .entry-header -->

		<section class="single-post-content__content single-post-content--careers__subsection">

			<?php the_content(); ?>

		</section>

		<section class="single-post-content--careers">

			<?php if ( '' !== get_field( 'responsibilities' ) ) : ?>

				<div class="single-post-content--careers__subsection">

					<h2 class="single-post-content--careers__subhead">Responsibilities</h2>

					<?php the_field( 'responsibilities' ); ?>

				</div>

			<?php endif; ?>

			<?php if ( '' !== get_field( 'skills' ) ) : ?>

				<div class="single-post-content--careers__subsection">

					<h2 class="single-post-content--careers__subhead">Skills</h2>

					<?php the_field( 'skills' ); ?>

				</div>

			<?php endif; ?>

		</section>

		<?php if ( has_term( 'internship', 'rp3_tax_departments' ) ) : ?>

			<?php get_template_part( 'template-parts/content', 'careers-boilerplate-internship' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'careers-boilerplate' ); ?>

		<?php endif; ?>

		<?php if ( function_exists( 'sharing_display' ) ) : ?>

			<!-- Sharing -->

			<section class="single-post-content__sharing">

				<?php sharing_display( '', true ); ?>

			</section>

			<li class="share-link" id="share-link-<?php echo esc_attr( get_the_ID() ); ?>" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>">
				<a rel="nofollow" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>" data-shared="sharing-link-<?php echo esc_attr( get_the_ID() ); ?>" data-clipboard-text="<?php echo esc_url( get_permalink() ); ?>" class="share-link sd-button share-icon no-text" href="#!" title="Click to copy permalink.">
					<span></span>
					<span class="sharing-screen-reader-text">Click to copy permalink to clipboard</span>
				</a>
			</li>

		<?php endif; ?>

	</div>
	<!-- // wrapper -->

</article>
