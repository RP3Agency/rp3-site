<!-- Underscore Templates -->

<script type="text/template" id="blog-template">
<% _.each( posts, function( post ) { %>

	<article class="single-post-content single-post-content--blog">

		<div class="single-post-content__wrapper">

			<header class="single-post-content__header">

				<h1 class="single-post-content__title"><%= post.title %></h1>

				<div class="single-post-content__date"><%= post.longDate %></div>

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

			<section class="blog__author">

				<header class="blog__author__header">

					<div class="blog__author__meta">

						<div class="blog__author__image">

							<img srcset="">

						</div>
						<!-- // blog author image -->

					</div>
					<!-- // blog author meta -->

				</header>
				<!-- // blog author header -->

				<div class="blog__author__bio">

					<p><a href="#!"><%= post.author.name %></a> <%= post.author.description %></p>

				</div>

			</section>

		</div>

	</article>

<% }) %>
</script>

<script type="text/template" id="blog-template-interstitial">

<?php get_template_part( 'template-parts/component', 'blog-interstitial' ); ?>

</script>
