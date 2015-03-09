<?php
/**
 * Display the content block panel.
 *
 * @package RP3
 */
?>

<!-- Half-Width Image Panel -->

<section class="case-study-content">

	<div class="case-study-content__container">

		<?php if ( '' != get_sub_field( 'left_image' ) ) : ?>

			<div class="work-main-content__image work-main-copy__left-image">

				<div class="work-main-content__image__container">

					<div class="work-main-content__image__container__inner">

						<?php echo rp3_picture_element( get_sub_field( 'left_image' ), 'main-copy-counter-image' ); ?>

					</div>
					<!-- // work main content image container inner -->

				</div>
				<!-- // work main content image container -->

			</div>
			<!-- // work main content image -->

		<?php endif; ?>

		<?php if ( '' != get_sub_field( 'right_image' ) ) : ?>

			<div class="work-main-content__image work-main-copy__right-image">

				<div class="work-main-content__image__container">

					<div class="work-main-content__image__container__inner">

						<?php echo rp3_picture_element( get_sub_field( 'right_image' ), 'main-copy-counter-image' ); ?>

					</div>
					<!-- // work main content image container inner -->

				</div>
				<!-- // work main content image container -->

			</div>
			<!-- // work main content image -->

		<?php endif; ?>

	</div>
	<!-- // .case-study-content container -->

</section>
<!-- // .case-study-content -->
