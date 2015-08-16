<section class="page__panel__careers careers">

	<?php if ( '' !== get_sub_field( 'section_title' ) ) : ?>

		<header class="careers__header page__panel__header">

			<h2><?php echo esc_html( get_sub_field( 'section_title' ) ); ?></h2>

		</header>

		<div class="careers__content">

			<?php

			$posts = get_sub_field( 'positions' );

			if ( $posts ) :

				foreach ( $posts as $post ) : setup_postdata( $post );
			?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('careers__article'); ?>>

						<a href="<?php the_permalink(); ?>" rel="bookmark" class="block">

							<header class="careers__header--article">
								<h2 class="careers__title"><?php the_title(); ?></h2>
							</header>
							<!-- // .careers__header—article -->

							<div class="careers__summary">
								<?php // We don't want sharing links here, exactly. ?>
								<?php remove_filter( 'the_excerpt', 'sharing_display', 19 ); ?>
								<?php the_excerpt(); ?>
							</div>
							<!-- // .careers__summary -->

						</a>

					</div>
					<!-- #post-## -->

			<?php
				endforeach;

				wp_reset_postdata();

			endif;

			?>

	<?php endif; ?>

</section>
<!-- // careers -->
