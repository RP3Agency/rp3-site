<!-- Underscore Templates -->

<script type="text/template" id="listing-template">
<% _.each( posts, function( post ) { %>

	<a href="<%= post.get( 'link' ) %>" class="block listing__article">

		<% if ( post.get( 'four_three_small' ) ) { %>

			<div class="blog-listing__thumbnail listing__thumbnail">
				<picture>

					<% if ( post.get( 'four_three_medium' ) ) { %>
					<source srcset="<%= post.get( 'four_three_medium' ) %>, <%= post.get( 'four_three_medium_2x' ) %> 2x" media="( min-width: 20.0625em )">
					<% } %>

					<% if ( post.get( 'four_three_small' ) ) { %>
					<source srcset="<%= post.get( 'four_three_small' ) %>, <%= post.get( 'four_three_small_2x' ) %> 2x">
					<% } %>

					<% if ( post.get( 'four_three_small' ) ) { %>
					<img srcset="<%= post.get( 'four_three_small' ) %>, <%= post.get( 'four_three_small_2x' ) %> 2x" class="attachment-post-thumbnail wp-post-image">
					<% } %>

				</picture>
			</div>

		<% } %>
	
		<header class="listing__header">

			<h1 class="listing__headline"><%= post.get( 'title' ) %></h1>

			<div class="listing__byline"><%= post.get( 'date' ) %></div>

		</header>

		<div class="listing__excerpt">

			<%= post.get( 'excerpt' ) %>

		</div>

	</a>

<% }) %>
</script>
