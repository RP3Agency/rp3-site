<?php

// Set thumbnail size for home page
add_image_size( 'home', 272, 292, true );

// Custom queries for news & blog posts on the home page
function rp3_display_homepage_post( $position = 'left' ) {

    // Build our query by getting the latest post that's been marked for the position we're calling
    $args = array(
        'posts_per_page'    => 1,
        'post_type'         => array( 'post', 'rp3_blog' ),
        'meta_query'        => array(
            array(
                'key'   => 'homepage',
                'value' => 1,
                'type'  => 'NUMERIC'
            ),
            array(
                'key'   => 'homepage_position',
                'value' => $position,
                'type'  => 'CHAR'
            ),
        ),
    );

    $homepage_query = new WP_Query( $args );

    // Create The Loopª
    if ( $homepage_query->have_posts() ): while ( $homepage_query->have_posts() ): $homepage_query->the_post();

    // some items in our HTML are dependent on the post type
    switch ( $homepage_query->post->post_type ) {
        case 'post':
        default:
            $post_type_class = 'news';
            $post_type_link_text = 'news';
            $post_type_read_more = 'Story';
        break;

        case 'rp3_blog':
            $post_type_class = 'blog';
            $post_type_link_text = 'posts';
            $post_type_read_more = 'Post';
        break;
    }

    // Get the image info
    // $image_info = wp_get_attachment_image_src( get_field( 'homepage_image' ), 'home' );
    $image = get_field( 'homepage_image' );
?>
    <article class="tile <?php echo $post_type_class; ?> <?php echo $position; ?>-tile">

        <header>
            <div class="thumbnail">
                <a href="<?php the_permalink(); ?>" class="ir" style="background-image: url(<?php echo $image['sizes']['home']; ?>);"><?php echo $image['title']; ?></a>
            </div>
        </header>
		<div class="headline">
        	<h1><?php the_title(); ?></h1>
        	<div class="link"><a href="<?php the_permalink(); ?>" title="Read &quot;<?php echo htmlspecialchars( get_the_title() ); ?>&quot;">Read <?php echo $post_type_read_more; ?></a></div>
		</div>
        <footer>
            <div class="date"><?php echo get_the_date('F j, Y'); ?></div>
            <div class="post_type_link"><a href="<?php echo home_url( '/' . $post_type_class . '/' ); ?>">All <?php echo $post_type_link_text; ?></a></div>
        </footer>

        <div class="icon"><?php echo ucwords( $post_type_class ); ?></div>

    </article>

<?php
    endwhile; endif;

} // end rp3_display_homepage_query()

