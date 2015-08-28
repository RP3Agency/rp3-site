<!-- Underscore Templates -->

<script type="text/template" id="listing-template">
<% _.each( posts, function( post ) { %>

	<a href="<%= post.link %>" class="block listing__article">

		<% if ( post.four_three_small ) { %>

			<div class="blog-listing__thumbnail listing__thumbnail">
				<picture>

					<% if ( post.four_three_medium ) { %>
					<source srcset="<%= post.four_three_medium %>, <%= post.four_three_medium_2x %> 2x" media="( min-width: 20.0625em )">
					<% } %>

					<% if ( post.four_three_small ) { %>
					<source srcset="<%= post.four_three_small %>, <%= post.four_three_small_2x %> 2x">
					<% } %>

					<% if ( post.four_three_small ) { %>
					<img srcset="<%= post.four_three_small %>, <%= post.four_three_small_2x %> 2x" class="attachment-post-thumbnail wp-post-image">
					<% } %>

				</picture>
			</div>

		<% } %>

		<header class="listing__header">

			<h1 class="listing__headline"><%= post.title %></h1>

			<div class="listing__byline"><%= post.longDate %></div>

		</header>

		<div class="listing__excerpt">

			<%= post.excerpt %>

		</div>

	</a>

<% }) %>
</script>
