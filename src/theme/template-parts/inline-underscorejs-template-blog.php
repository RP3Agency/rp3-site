<!-- Underscore Templates -->

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

					<p><a href="#!"><%= post.get( 'author' ).name %></a> <%= post.get( 'author' ).description %></p>

				</div>

			</section>

		</div>

	</article>

<% }) %>
</script>


<?php /*
<script type="text/template" id="blog-template-author">
<% _.each( authors, function( author ) { %>

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

			<p><a href="#!"><%= author.name %></a></p>

		</div>

	</section>

<% }) %>
</script>
*/ ?>


<script type="text/template" id="blog-template-interstitial">
<section id="site-blog__interstitial" class="site-blog__interstitial">

	<div class="site-blog__interstitial__container">

		<div class="site-blog__interstitial__wrapper">

			<div class="site-blog__interstitial__content">

				<p>RP3's <strong>Building Opportunity</strong> blog showcases our ongoing exploration of new ideas, new technologies and new experiences that propel businesses forward. If you like what you see, we invite you to learn more about <a href="<?php echo esc_url( home_url( '/agency/' ) ); ?>">RP3</a>, the DC-based creative agency behind all the thinking.</p>

			</div>

			<?php echo do_shortcode( '[mc4wp_form]' ); ?>

		</div>

	</div>

</section>
</script>
