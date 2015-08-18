<!-- Underscore Templates -->

<script type="text/template" id="listing-template">
<% _.each( posts, function( post ) { %>

	<a href="<%= post.get( 'link' ) %>" class="block listing__article">

		<?php /*
		<% if ( ( null !== post.get( 'featured_image' ) ) && ( post.get( 'featured_image' ).constructor !== Array ) && ( '' !== post.get( 'featured_image' ).source ) ) { %>
			<div class="blog-listing__thumbnail listing__thumbnail">
				<picture>
					<source srcset="<%= post.get( 'img_medium' ) %>, <%= post.get( 'img_medium_2x' ) %> 2x" media="( min-width: 20.0625em )">
					<source srcset="<%= post.get( 'img_small' ) %>, <%= post.get( 'img_small_2x' ) %> 2x">
					<img srcset="<%= post.get( 'img_small' ) %>, <%= post.get( 'img_small_2x' ) %> 2x" class="attachment-post-thumbnail wp-post-image">
				</picture>
			</div>
		<% } %>
		*/ ?>
	
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
