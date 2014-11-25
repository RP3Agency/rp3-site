<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package RP3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'work' ); ?>>

	<!-- Row 1 -->


	<!-- NS365 -->
	<div id="ns365" class="work__full-width">
		<a href="<?php echo esc_url( get_permalink( 8362 ) ); ?>" class="block">
			<?php echo rp3_picture_element( 8636, 'work-full-width', 'NS365' ); ?>

			<div class="work__headline">
				<h1>NS365</h1>
				for <strong>Norfolk Southern</strong>
			</div>
		</a>
	</div>


	<!-- Row 2 -->

	<div class="work__container">

		<!-- Giftacular -->
		<div id="giftacular" class="work__half">
			<a href="#!" class="block">
				<?php echo rp3_picture_element( 8632, 'work-half-width', "Ripley's Giftacular" ); ?>

				<div class="work__headline">
					<h1>Giftacular</h1>
					for <strong>Ripley's Believe It or Not! Times Square</strong>
				</div>
			</a>
		</div>

		<div class="work__container--half">

			<div class="work__container--half--inner">

				<div class="work__blank">
				</div>

				<!-- Norfolk Southern -->
				<div id="norfolk-southern" class="work__quarter">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8635 ) ); ?>" width="250" height="200">
					</a>
				</div>

			</div>

			<div class="work__container--half--inner">

				<div class="work__gray">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8635 ) ); ?>" width="250" height="200">
					</a>
				</div>

				<div class="work__blank"></div>

			</div>

		</div>
		<!-- // .container -->

	</div>
	<!-- // .container -->


	<!-- Row 3 -->

	<!-- Wolf Trap -->
	<div id="wolf-trap" class="work__full-width">
		<a href="#!" class="block">
			<?php echo rp3_picture_element( 8639, 'work-full-width', 'Wolf Trap' ); ?>

			<div class="work__headline">
				<h1>Summer 2014</h1>
				for <strong>Wolf Trap</strong>
			</div>
		</a>
	</div>


	<!-- Row 4 -->

	<div class="work__container">

		<div class="work__container--half">

			<div class="work__container--half--inner">

				<!-- WIT -->
				<div id="wit" class="work__quarter">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8638 ) ); ?>" width="250" height="200">
					</a>
				</div>

				<div class="work__blank">
				</div>

			</div>
			<!-- // .work__container- -half- -inner -->

			<div class="work__container--half--inner">

				<div class="work__blank">
				</div>

				<!-- United Way -->
				<div id="united-way" class="work__quarter">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8637 ) ); ?>" width="250" height="200">
					</a>
				</div>

			</div>
			<!-- // .work__container- -half- -inner -->

		</div>
		<!-- // .work_container -->

		<!-- Woolly Mammoth -->
		<div id="woolly" class="work__half">
			<a href="#!" class="block">
				<?php echo rp3_picture_element( 8640, 'work-half-width', "Woolly Mammoth" ); ?>

				<div class="work__headline">
					<h1>Rebrand</h1>
					for <strong>Woolly Mammoth</strong>
				</div>
			</a>
		</div>

	</div>


	<!-- Row 5 -->

	<!-- Infinite Possibilities -->
	<div id="infinite-possibilities" class="work__full-width">
		<a href="#!" class="block">
			<?php echo rp3_picture_element( 8633, 'work-full-width', 'Infinite Possibilities' ); ?>

			<div class="work__headline">
				<h1>Infinite Possibilities</h1>
				for <strong>Norfolk Southern</strong>
			</div>
		</a>
	</div>


	<!-- Row 6 -->

	<div class="work__container">

		<!-- WAWF -->
		<div id="be-that-woman" class="work__half">
			<a href="#!" class="block">
				<?php echo rp3_picture_element( 8631, 'work-half-width', "Be That Woman" ); ?>

				<div class="work__headline">
					<h1>Be That Woman</h1>
					for <strong>Washington Area Women's Foundation</strong>
				</div>
			</a>
		</div>

		<div class="work__container--half">

			<div class="work__container--half--inner">

				<!-- Norfolk Southern -->
				<div id="norfolk-southern-2" class="work__quarter">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8634 ) ); ?>" width="250" height="200">
					</a>
				</div>

				<div class="work__blank">
				</div>

			</div>
			<!-- // .work__container- -half- -inner -->

			<div class="work__container--half--inner">

				<div class="work__blank">
				</div>

				<div class="work__gray">
					<a href="#!" class="block">
						<img src="<?php echo esc_url( wp_get_attachment_url( 8634 ) ); ?>" width="250" height="200">
					</a>
				</div>

			</div>
			<!-- // .work__container- -half- -inner -->

		</div>
		<!-- // .work__container- -half -->

	</div>

</article><!-- #post-## -->
