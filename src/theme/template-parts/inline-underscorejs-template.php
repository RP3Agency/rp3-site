<!-- Underscore Templates -->

<script type="text/template" id="listing-template">
<% _.each( posts, function( post ) { %>

	<div class="news-listing__article listing__article">

		<a href="<%= post.get( 'link' ) %>" class="block">

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

			<h1 class="news-listing__headline listing__headline"><%= post.get( 'title' ) %></h1>

			<?php /*
			<div class="news-listing__date listing__byline"><%= post.get( 'date' ) %></div>

			<div class="news-listing__excerpt listing__excerpt">
				<%= post.get( 'excerpt' ) %>
			</div>
			*/ ?>

		</a>

	</div>

<% }) %>
</script>
