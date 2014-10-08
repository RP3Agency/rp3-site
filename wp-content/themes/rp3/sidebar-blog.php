<div id="secondary" class="blog__secondary">

	<!-- Author(s) -->

	<section class="blog__author">

		<?php
		if ( class_exists( 'CoAuthorsIterator' ) ) :
			$links = get_the_coauthor_meta('user_url');
			$desc = get_the_coauthor_meta('description');
			$i = new CoAuthorsIterator();
			$authors = $i->get_all();
			foreach($authors as $author) :
		?>


		<header class="blog__author__header">

			<div class="blog__author__meta">

				<h1 class="blog__author__name"><?php echo get_the_author_meta( 'display_name', $author->ID ); ?></h1>

				<ul class="blog__author__social social">

					<?php if ( '' != get_the_author_meta( 'user_email', $author->ID ) ) : ?>
					<li class="email"><a href="<?php echo esc_url( 'mailto:' . get_the_author_meta( 'user_email', $author->ID ) ); ?>">Email</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'facebook', $author->ID ) ) : ?>
					<li class="facebook"><a href="<?php echo esc_url( get_the_author_meta( 'facebook', $author->ID ) ); ?>">Facebook</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'twitter', $author->ID ) ) : ?>
					<li class="twitter"><a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author->ID ) ); ?>">Twitter</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'linkedin', $author->ID ) ) : ?>
					<li class="linkedin"><a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author->ID ) ); ?>">LinkedIn</a></li>
					<?php endif; ?>

				</ul>

			</div>
			<!-- // .author__meta -->

		</header>
		<!-- // .author__header -->

		<div class="blog__author__bio">

			<?php echo wpautop( get_the_author_meta( 'description', $author->ID ) ); ?>

		</div>
		<!-- // .author__bio -->

		<?php
		// Get other blog posts by this author, if any

		$user_info = get_userdata( $author->ID );

		$other_posts = new WP_Query( array(
			// 'author__in'		=> array( $author->ID ),
			'post_type'			=> 'post',
			'category_name'		=> 'blog',
			'post__not_in'		=> array( get_the_ID() ),
			'posts_per_page'	=> 5,
			'author_name'		=> $user_info->user_login
		) );
		?>

		<?php if ( $other_posts->have_posts() ) : ?>

		<div class="blog__author__posts">

			<h2>Recent Posts by <?php echo get_the_author_meta( 'display_name', $author->ID ); ?>:</h2>

			<ul>

				<?php while ( $other_posts->have_posts() ) : $other_posts->the_post(); ?>

				<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

			</ul>

		</div>

		<?php endif; wp_reset_query(); ?>

		<?php endforeach;

		else :
		?>

		<header class="blog__author__header">

			<div class="blog__author__image">

				<img src="http://placekitten.com/g/150/150">

			</div>
			<!-- // .author__image -->

			<div class="blog__author__meta">

				<h1 class="blog__author__name"><?php echo get_the_author_meta( 'display_name', $author->ID ); ?></h1>

				<ul class="blog__author__social social">

					<?php if ( '' != get_the_author_meta( 'user_email', $author->ID ) ) : ?>
					<li class="email"><a href="<?php echo esc_url( 'mailto:' . get_the_author_meta( 'user_email', $author->ID ) ); ?>">Email</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'facebook', $author->ID ) ) : ?>
					<li class="facebook"><a href="<?php echo esc_url( get_the_author_meta( 'facebook', $author->ID ) ); ?>">Facebook</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'twitter', $author->ID ) ) : ?>
					<li class="twitter"><a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author->ID ) ); ?>">Twitter</a></li>
					<?php endif; ?>

					<?php if ( '' != get_the_author_meta( 'linkedin', $author->ID ) ) : ?>
					<li class="linkedin"><a href="<?php echo esc_url( get_the_author_meta( 'twitter', $author->ID ) ); ?>">LinkedIn</a></li>
					<?php endif; ?>

				</ul>

			</div>
			<!-- // .author__meta -->

		</header>
		<!-- // .author__header -->

		<div class="blog__author__bio">

			<?php echo wpautop( get_the_author_meta( 'description', $author->ID ) ); ?>

		</div>
		<!-- // .author__bio -->

		<?php
		// Get other blog posts by this author, if any

		$user_info = get_userdata( $author->ID );

		$other_posts = new WP_Query( array(
			// 'author__in'		=> array( $author->ID ),
			'post_type'			=> 'post',
			'category_name'		=> 'blog',
			'post__not_in'		=> array( get_the_ID() ),
			'posts_per_page'	=> 5,
			'author_name'		=> $user_info->user_login
		) );
		?>

		<?php if ( $other_posts->have_posts() ) : ?>

		<div class="blog__author__posts">

			<h2>Recent Posts by <?php echo get_the_author_meta( 'display_name', $author->ID ); ?>:</h2>

			<ul>

				<?php while ( $other_posts->have_posts() ) : $other_posts->the_post(); ?>

				<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

			</ul>

		</div>

		<?php endif; wp_reset_query(); ?>

		<?php endif; ?>

	</div>
	<!--// .blog__author -->

</div>
<!-- // #secondary -->
