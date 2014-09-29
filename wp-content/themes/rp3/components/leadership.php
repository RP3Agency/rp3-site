<?php
$leadership = new WP_Query( array(
	'post_type'			=> 'rp3_cpt_leadership',
	'order'				=> 'ASC',
	'orderby'			=> 'menu_order',
	'posts_per_page'	=> -1
) );
?>

<?php if ( $leadership->have_posts() ) : ?>

<section class="leadership entry-content">

	<h1>Leadership</h1>

	<div class="leadership__container">

		<?php while ( $leadership->have_posts() ) : $leadership->the_post(); ?>

		<div class="leadership__person">

			<div class="leadership__photo">

				<img src="http://placekitten.com/g/150/150">

			</div>
			<!-- // .leadership__photo -->

			<div class="leadership__content">

				<h2 class="leadership__name"><?php the_title(); ?></h2>

				<div class="leadership__title"><?php the_field( 'position' ); ?></div>

				<div class="leadership__biography--wide"><?php the_field( 'biography' ); ?></div>

				<ul class="leadership__social social">

					<?php if ( '' != get_field( 'email' ) ) : ?>
					<li class="email"><a href="<?php echo esc_url( 'mailto:' . get_field( 'email' ) ); ?>">Email</a></li>
					<?php endif; ?>

					<?php if ( '' != get_field( 'linkedin' ) ) : ?>
					<li class="linkedin"><a href="<?php echo esc_url( get_field( 'linkedin' ) ); ?>">LinkedIn</a></li>
					<?php endif; ?>

					<?php if ( '' != get_field( 'twitter' ) ) : ?>
					<li class="twitter"><a href="<?php echo esc_url( get_field( 'twitter' ) ); ?>">Twitter</a></li>
					<?php endif; ?>

				</ul>

			</div>
			<!-- // .leadership__content -->

			<div class="leadership__biography--narrow"><?php the_field( 'biography' ); ?></div>

		</div>
		<!-- // .leadership__person -->

		<?php endwhile; ?>

	</div>
	<!-- // .leadership__content -->

</section>
<!-- // .leadership.entry-content -->

<?php endif; wp_reset_query(); ?>
