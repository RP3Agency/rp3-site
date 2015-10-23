<?php
/**
 * The template for displaying the blog footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RP3
 */

/** Pull the (up to) 5 most recent curated search suggestions */
$args = array(
	'post_type'			=> 'post',
	'meta_key'			=> 'search_suggestion',
	'meta_value'		=> true,
	'posts_per_page'	=> 5,
	'orderby'			=> 'date',
	'order'				=> 'DESC'
);

$search_suggestions = new WP_Query( $args );
?>

	</main>
	<!-- // #content -->

</div>
<!-- // #page -->

<!-- Full-page Blog Search Takeover -->

<div id="blog-search" class="blog-search">

	<div class="blog-search__container">

		<button id="blog-search__close" class="blog-search__close">Close</button>

		<?php get_search_form( true ); ?>

		<aside class="blog-search__suggestions">

			<h2 class="blog-search__suggestions__header">Some recent articles:</h2>

			<?php if ( $search_suggestions->have_posts() ) : ?>

				<ul class="blog-search__suggestions__list">

					<?php while ( $search_suggestions->have_posts() ) : $search_suggestions->the_post(); ?>

						<li class="blog-search__suggestions__title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; wp_reset_query(); ?>

		</aside>

	</div>

</div>

<!-- // Blog Search -->

<?php wp_footer(); ?>

</body>
</html>
