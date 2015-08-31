<!-- Underscore Templates -->

<script type="text/template" id="blog-template">
<% _.each( posts, function( post ) { %>

	<article class="single-post-content single-post-content--blog">

		<div class="single-post-content__wrapper">

			<header class="single-post-content__header">

				<h1 class="single-post-content__title"><%= post.title %></h1>

				<div class="single-post-content__date">By

					<% if ( 1 === post.authors.length ) { %>

						<%= post.authors[0].display_name %>

					<% } else { %>

						<% var names = _.pluck( post.authors, 'display_name' ); %>

						<% var andName = names.pop(); %>

						<%= names.join(', ') %> and <%= andName %>

					<% } %>

					on <%= post.longDate %></div>

			</header>

			<div class="single-post-content__featured-image">

				<picture>
					<source srcset="<%= post.eight_three_large %>, <%= post.eight_three_large_2x %> 2x" media="(min-width: 37.5rem)" />
					<source srcset="<%= post.four_three_medium %>, <%= post.four_three_medium_2x %> 2x" media="(min-width: 20.0625rem)" />
					<source srcset="<%= post.four_three_small %>, <%= post.four_three_small_2x %> 2x" />
					<img srcset="<%= post.four_three_small %>, <%= post.four_three_small_2x %> 2x" />
				</picture>

			</div>

			<section class="single-post-content__content">

				<%= post.content %>

			</section>

			<% _.each( post.authors, function( author ) { %>
				<% if( author.photo_url ) { %>

			<section class="blog__author">

				<header class="blog__author__header">

					<div class="blog__author__meta">

						<div class="blog__author__image">

							<img srcset="<%= author.photo_url %>, <%= author.photo_url_2x %> 2x">

						</div>
						<!-- // blog author image -->

					</div>
					<!-- // blog author meta -->

				</header>
				<!-- // blog author header -->

				<% if( 'guest-author' !== author.type ) { %>
				<div class="blog__author__bio">

					<p><a href="<%= author.posts_url %>"><%= author.display_name %></a> <%= author.description %></p>

					<!-- Social media presence -->

					<ul class="blog__author__social social">

						<% if( author.email ) { %>
						<li class="email"><a href="<%= author.email %>">Email</a></li>
						<% } %>

						<% if( author.facebook ) { %>
						<li class="facebook"><a href="<%= author.facebook %>">Facebook</a></li>
						<% } %>

						<% if( author.twitter ) { %>
						<li class="twitter"><a href="<%= author.twitter %>">Twitter</a></li>
						<% } %>

						<% if( author.linkedin ) { %>
						<li class="linkedin"><a href="<%= author.linkedin %>">LinkedIn</a></li>
						<% } %>

						<% if( author.instagram ) { %>
						<li class="instagram"><a href="<%= author.instagram %>">Instagram</a></li>
						<% } %>

					</ul>

				</div>
				<% } %>

			</section>

				<% } %>
			<% }) %>

		</div>

	</article>

<% }) %>
</script>

<script type="text/template" id="blog-template-interstitial">

<?php get_template_part( 'template-parts/component', 'blog-interstitial' ); ?>

</script>
