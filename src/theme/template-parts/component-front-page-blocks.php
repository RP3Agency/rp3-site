<?php
/**
 * Get latest blog post
 */
$args = array(
	'posts_per_page'	=> 1,
	'orderby'			=> 'date',
	'order'				=> 'DESC'
);

$blog = new WP_Query( array_merge( $args, array( 'post_type' => 'post' ) ) );

/**
 * Get latest news post
 */

$news = new WP_Query( array_merge( $args, array( 'post_type' => 'rp3_cpt_news' ) ) );
?>

<div id="front-page__blocks" class="front-page__blocks">

	<div class="front-page__blocks__row front-page__blocks__row--1 scroll-effect effect-fade-in">

		<!-- General Information Tile -->

		<?php if ( '' != get_field( 'general_info_tile_link' ) ) : ?>

			<a href="<?php echo esc_url( get_field( 'general_info_tile_link' ) ); ?>" class="front-page__blocks__general-widget front-page__blocks__block block scroll-effect-target">

		<?php else: ?>

			<div class="front-page__blocks__general-widget front-page__blocks__block block scroll-effect-target">

		<?php endif; ?>

				<div class="front-page__blocks__subhead"><?php the_field( 'general_info_tile_label' ); ?></div>

				<?php echo get_field( 'general_info_tile_content' ); ?>

				<?php if ( '' != get_field( 'general_info_tile_date' ) ) : ?>

					<div class="front-page__blocks__date">

						<?php the_field( 'general_info_tile_date' ); ?>

					</div>

				<?php endif; ?>

		<?php if ( '' != get_field( 'general_info_tile_link' ) ) : ?>

			</a>
			<!-- // .home-blocks__general-widget -->

		<?php else: ?>

			</div>
			<!-- // .home-blocks__general-widget -->

		<?php endif; ?>

		<!-- Latest Blog Post -->

		<?php if ( $blog->have_posts() ) : ?>

			<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="front-page__blocks__blog front-page__blocks__block block scroll-effect-target">

					<div class="front-page__blocks__subhead">Blog</div>

					<h1 class="front-page__blocks__header"><?php the_title(); ?></h1>

					<div class="front-page__blocks__date"><?php echo get_the_date(); ?></div>

				</a>

			<?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>

	</div>

	<div class="front-page__blocks__row front-page__blocks__row--2 scroll-effect effect-fade-in">

		<!-- Latest Tweet -->

		<div class="front-page__blocks__twitter front-page__blocks__block scroll-effect-target">

			<div class="front-page__blocks__subhead"><a href="https://twitter.com/RP3Agency">@RP3Agency</a></div>

			<?php dynamic_sidebar( 'home-errata__twitter-widget' ); ?>

		</div>
		<!-- // .home-blocks__twitter -->

		<!-- Latest News Post -->

		<?php if ( $news->have_posts() ) : ?>

			<?php while ( $news->have_posts() ) : $news->the_post(); ?>

				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="front-page__blocks__news front-page__blocks__block block scroll-effect-target">

					<div class="front-page__blocks__subhead">News</div>

					<h1 class="front-page__blocks__header"><?php the_title(); ?></h1>

					<div class="front-page__blocks__date"><?php echo get_the_date(); ?></div>

				</a>

			<?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>

	</div>

</div>
