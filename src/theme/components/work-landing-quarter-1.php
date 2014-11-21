<!-- Quarter Width 1 -->

<?php
$post = get_sub_field( 'quarter_width_1' );
setup_postdata( $post );
?>

<div class="work__quarter">

	<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="block">

		<?php echo rp3_picture_element( get_field( 'hero_image' ), 'work-quarter-width' ); ?>

	</a>

</div>
<!-- work half -->

<?php wp_reset_postdata(); ?>

<!-- End Quarter Width 1 -->
