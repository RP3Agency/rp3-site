<?php
/**
 * @package RP3
 */

// Is this a case study?
if ( true === get_field( 'case_study' ) ) {
	$class = 'case-study';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

	<div class="<?php echo esc_attr( $class ); ?>__entry-content">

		<header class="<?php echo esc_attr( $class ); ?>__entry-header">

			<h1><?php the_title(); ?></h1>

			<div class="<?php echo esc_attr( $class ); ?>__tagline"><?php the_field( 'tagline' ); ?></div>

		</header>
		<!-- // .<?php echo esc_attr( $class ); ?>__entry-header -->


		<?php
		$image = get_field( 'image_1' );
		if ( is_int( $image ) && ( $image > 0 ) ) {
			echo rp3_picture_element( $image, 'case-study', '' );
		}
		?>

		<section class="<?php echo esc_attr( $class ); ?>__section">

			<h2 class="<?php echo esc_attr( $class ); ?>__subhead">Think:</h2>

			<div class="<?php echo esc_attr( $class ); ?>__content">

				<?php the_field( 'think' ); ?>

			</div>

		</section>
		<!-- // .<?php echo esc_attr( $class ); ?>__section -->


		<?php
		$image = get_field( 'image_2' );
		if ( is_int( $image ) && ( $image > 0 ) ) {
			echo rp3_picture_element( $image, 'case-study', '' );
		}
		?>


		<section class="<?php echo esc_attr( $class ); ?>__section">

			<h2 class="<?php echo esc_attr( $class ); ?>__subhead">Feel:</h2>

			<div class="<?php echo esc_attr( $class ); ?>__content">

				<?php the_field( 'feel' ); ?>

			</div>

		</section>
		<!-- // .<?php echo esc_attr( $class ); ?>__section -->


		<?php
		$image = get_field( 'image_3' );
		if ( ( is_array( $image ) && ( count( $image ) > 0 ) ) ) :
		?>

		<img src="<?php echo esc_url( $image['url'] ); ?>">

		<?php endif; ?>


		<section class="<?php echo esc_attr( $class ); ?>__section">

			<h2 class="<?php echo esc_attr( $class ); ?>__subhead">Build:</h2>

			<div class="<?php echo esc_attr( $class ); ?>__content">

				<?php the_field( 'build' ); ?>

			</div>

		</section>
		<!-- // .<?php echo esc_attr( $class ); ?>__section -->


		<?php
		$image = get_field( 'image_4' );
		if ( ( is_array( $image ) && ( count( $image ) > 0 ) ) ) :
		?>

		<img src="<?php echo esc_url( $image['url'] ); ?>">

		<?php endif; ?>


	</div>
	<!-- .<?php echo esc_attr( $class ); ?>__entry-content -->

	</footer>
	<!-- .entry-footer -->

</article>
<!-- #post-## -->
