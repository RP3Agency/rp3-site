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

				<?php wp_list_comments(array (
					'avatar_size' => '64'
				) ); ?>

			</ul>

			<?php comment_form( array(
				'title_reply'			=> 'Leave a Comment',
				'comment_notes_after'	=> '<p class="comment-notes">You can format your comments using <a href="http://daringfireball.net/projects/markdown/syntax">Markdown</a>.</p>',
				'label_submit'			=> 'Submit Comment'
			) ); ?>

		</div>

	</div>

</section>
