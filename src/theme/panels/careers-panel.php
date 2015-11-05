<section class="page__panel__careers careers">

	<?php if ( '' !== get_sub_field( 'section_title' ) ) : ?>

		<header class="careers__header page__panel__header">

			<h2><?php echo esc_html( get_sub_field( 'section_title' ) ); ?></h2>

		</header>

		<div class="careers__inner">

			<ul>

				<?php

				$posts = get_sub_field( 'positions' );

				if ( $posts ) :

					foreach ( $posts as $post ) : setup_postdata( $post );
				?>

						<li id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class('careers__article'); ?>>

							<button class="careers__trigger" data-id="<?php echo esc_attr( get_the_ID() ); ?>">

								<header class="careers__header--article">
									<h2 class="careers__title"><?php the_title(); ?></h2>
								</header>
								<!-- // .careers__header—article -->

							</button>

							<div id="post-<?php echo esc_attr( get_the_ID() ); ?>-content" class="careers__content">

								<?php the_content(); ?>

								<?php if ( '' !== get_field( 'responsibilities' ) ) : ?>

									<h3>Responsibilities</h3>

									<?php the_field( 'responsibilities' ); ?>

								<?php endif; ?>

								<?php if ( '' !== get_field( 'skills' ) ) : ?>

									<h3>Skills</h3>

									<?php the_field( 'skills' ); ?>

								<?php endif; ?>

							</div>

						</li>
						<!-- #post-## -->

				<?php
					endforeach;

					wp_reset_postdata();

				endif;

				?>

			</ul>

			<div id="careers__inner__content" class="careers__inner__content"></div>

		</div>
		<!-- // inner -->

		<?php if ( '' !== get_sub_field( 'boilerplate' ) ) : ?>

			<footer class="careers__boilerplate">

				<?php the_sub_field( 'boilerplate' ); ?>

			</footer>

		<?php endif; ?>

	<?php endif; ?>

</section>
<!-- // careers -->
