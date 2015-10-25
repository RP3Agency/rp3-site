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

		<aside id="blog-search__suggestions" class="blog-search__suggestions">

			<h2 class="blog-search__header">Lorem ipsum dolor sit amet:</h2>

			<?php if ( $search_suggestions->have_posts() ) : ?>

				<ul class="blog-search__list">

					<?php while ( $search_suggestions->have_posts() ) : $search_suggestions->the_post(); ?>

						<li class="blog-search__suggestions__title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; wp_reset_query(); ?>

		</aside>

		<div id="blog-search__results" class="blog-search__results">

			<h2 class="blog-search__header">Search results:</h2>

		</div>

	</div>

</div>

<script type="text/template" id="blog-search__results__template">

<ul class="blog-search__list">

<% _.each( posts, function( post ) { %>

	<li><a href="<%= post.permalink %>" class="block">
		<span class="link"><%= post.title %></span><br/>
		By

		<% if ( 1 === post.authors.length ) { %>

			<%= post.authors[0].display_name %>

		<% } else { %>

			<% var names = _.pluck( post.authors, 'display_name' ); %>

			<% var andName = names.pop(); %>

			<%= names.join(', ') %> and <%= andName %>

		<% } %>

		on <%= post.longDate %>
	</a></li>

<% }) %>

</ul>

</script>

<!-- // Blog Search -->

<?php wp_footer(); ?>

</body>
</html>
