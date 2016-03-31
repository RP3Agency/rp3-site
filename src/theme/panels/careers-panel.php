<?php
/**
 * Careers panel.
 *
 * @package RP3
 */
?>

<!-- Careers Panel -->

<div class="page__panel__careers careers">

	<?php if ( '' !== get_sub_field( 'section_title' ) ) : ?>

		<header class="careers__header page__panel__header">

			<h2><?php echo esc_html( get_sub_field( 'section_title' ) ); ?></h2>

		</header>

		<div class="careers__inner">

			<div class="careers__inner__left">

				<ul>

					<?php

					$posts = get_sub_field( 'positions' );

					if ( $posts ) :

						foreach ( $posts as $post ) : setup_postdata( $post );
					?>

							<li id="post-<?php echo esc_attr( get_the_ID() ); ?>" <?php post_class('careers__article'); ?>>

								<button class="careers__trigger" data-id="<?php echo esc_attr( get_the_ID() ); ?>">

									<header class="careers__header--article">

										<h2 class="careers__title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h2>

									</header>
									<!-- // .careers__header—article -->

								</button>

								<div id="post-<?php echo esc_attr( get_the_ID() ); ?>-content" class="careers__content">

									<h2><?php the_title(); ?></h2>

									<?php the_content(); ?>

									<?php if ( '' !== get_field( 'responsibilities' ) ) : ?>

										<h3>Responsibilities</h3>

										<?php the_field( 'responsibilities' ); ?>

									<?php endif; ?>

									<?php if ( '' !== get_field( 'skills' ) ) : ?>

										<h3>Skills</h3>

										<?php the_field( 'skills' ); ?>

									<?php endif; ?>

									<?php

									$boilerplate = (object) get_field( 'boilerplate' );

									if ( ! empty( $boilerplate ) ) : ?>

										<footer class="careers__boilerplate">

											<?php

											$boilerplate = get_field( 'boilerplate' );

											echo apply_filters( 'the_content', $boilerplate->post_content );

											?>

										</footer>

									<?php endif; ?>

									<?php /** Jetpack Sharing Module */ ?>

									<?php if ( function_exists( 'sharing_display' ) ) : ?>

										<!-- Sharing -->

										<section class="single-post-content__sharing">

											<?php sharing_display( '', true ); ?>

										</section>

									<?php endif; ?>

								</div>

<?php if ( function_exists( 'sharing_display' ) ) : ?>

	<li class="share-link" id="share-link-<?php echo esc_attr( get_the_ID() ); ?>" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>">
		<a rel="nofollow" data-post-id="<?php echo esc_attr( get_the_ID() ); ?>" data-shared="sharing-link-<?php echo esc_attr( get_the_ID() ); ?>" data-clipboard-text="<?php echo esc_url( get_permalink() ); ?>" class="share-link sd-button share-icon no-text" href="#!" title="Click to copy permalink.">
			<span></span>
			<span class="sharing-screen-reader-text">Click to copy permalink to clipboard</span>
		</a>
	</li>

<?php endif; ?>

							</li>
							<!-- #post-## -->

					<?php
						endforeach;

						wp_reset_postdata();

					endif;

					?>

				</ul>

			</div>

			<div class="careers__inner__right careers__content"></div>

		</div>
		<!-- // inner -->

	<?php endif; ?>

</div>
<!-- // careers -->
