<!-- Underscore Template -->

<script type="text/template" id="blog-template">
<% _.each( posts, function( post ) { %>

	<article class="single-blog">

		<div class="single-blog__wrapper">

			<header class="single-blog__header">

				<h1 class="single-blog__title"><%= post.get( 'title' ) %></h1>

				<div class="single-blog__date"><%= post.get( 'date' ) %></div>

			</header>

			<section class="single-blog__featured-image">

				<picture>
					<source srcset="<%= post.get( 'eight_three_large' ) %>, <%= post.get( 'eight_three_large_2x' ) %> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<%= post.get( 'four_three_medium' ) %>, <%= post.get( 'four_three_medium_2x' ) %> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<%= post.get( 'four_three_small' ) %>, <%= post.get( 'four_three_small_2x' ) %> 2x" />
					<img srcset="<%= post.get( 'four_three_small' ) %>, <%= post.get( 'four_three_small_2x' ) %> 2x" />
				</picture>

			</section>

			<section class="single-blog__content">

				<%= post.get( 'content' ) %>

			</section>

		</div>

	</article>

<% }) %>
</script>
