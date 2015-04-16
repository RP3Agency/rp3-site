<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
$blog = new WP_Query( array(
	'post_type'			=> 'post',
	'category_name'		=> 'blog',
	'posts_per_page'	=> -1,
	'tag'				=> 'sxsw'
) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<div class="entry-content__container">

			<?php the_content(); ?>

		</div>

	</div>
	<!-- .entry-content -->


	<!-- Blog Posts -->

	<?php if ( $blog->have_posts() ) : ?>

	<section id="blog-listing" class="listing component component--padded" data-paged="<?php echo esc_attr( $paged ); ?>">

		<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block listing__article">

				<?php if ( '' != get_the_post_thumbnail() ) : ?>

					<div class="listing__thumbnail">

						<?php echo get_the_post_thumbnail( get_the_ID(), 'news-blog-thumbnail' ); ?>

					</div>

				<?php endif; ?>

				<h1 class="listing__headline"><?php the_title(); ?></h1>

				<div class="listing__byline"><?php echo rp3_byline(); ?></div>

				<div class="listing__excerpt">

					<?php echo the_excerpt(); ?>

				</div>

			</a>

		<?php endwhile; ?>

	</section>
	<!-- // #blog-listing -->

	<?php endif; wp_reset_query(); ?>


	<!-- Hero Image -->
	<?php if ( '' != get_field( 'hero_image_2' ) ) :
		echo rp3_full_bleed_hero_image( get_field( 'hero_image_2' ), array(
			'image_size'	=> 'sub-page-hero',
		) );
	endif; ?>


</article>
<!-- #post-## -->
