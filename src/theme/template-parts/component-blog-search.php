<!-- Full-page Blog Search Takeover -->

<div id="blog-search" class="blog-search">

	<div class="blog-search__wrapper">

		<div class="blog-search__container">

			<?php get_search_form( true ); ?>

			<div id="blog-search__results" class="blog-search__results">

				<h2 class="blog-search__header">Found Opportunities:</h2>

			</div>

			<div id="blog-search__no-results" class="blog-search__no-results">

				<h2 class="blog-search__header">Sorry, no posts matched your search.</h2>

			</div>

			<button id="blog-search__close" class="blog-search__close">Close</button>

		</div>
		<!-- // container -->

	</div>
	<!-- // wrapper -->

</div>

<script type="text/template" id="blog-search__results__template">

	<ul class="blog-search__list">

		<% _.each( posts, function( post ) { %>

			<li>

				<a href="<%= post.link %>" class="block">

					<div class="blog-search__photo">
						<img src="<%= post.four_three_thumb %>">
					</div>

					<div class="blog-search__details">
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
					</div>

				</a>

			</li>

		<% } ); %>

	</ul>

</script>

<!-- // Blog Search -->
