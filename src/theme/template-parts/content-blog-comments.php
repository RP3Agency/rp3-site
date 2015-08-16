<section class="single-blog__comments">

	<div class="single-blog__comments__wrapper">

		<?php if ( 0 < get_comments_number() ) : ?>

			<a href="#!" id="single-blog__comments__trigger" class="single-blog__comments__trigger">

				View Comments <span class="single-blog__comments__count"><?php echo esc_html( get_comments_number() ); ?></span>

			</a>

		<?php else : ?>

			<a href="#!" id="single-blog__comments__trigger" class="single-blog__comments__trigger">Leave a Comment</a>

		<?php endif; ?>

		<div id="single-blog__comments__form" class="single-blog__comments__form">

			<ul class="single-blog__comments__list">

				<?php wp_list_comments(); ?>

			</ul>

			<?php comment_form(); ?>

		</div>

	</div>

</section>
