<?php
/**
 * Function cplw_widget_shortcode_output() is called in file shortcode.php to display data.
 * @param $category is used to show posts from particular category.
 * @param $height is the height of posts list content area.
 * @param $width is the width of posts list content area.
 * @param $posts_to_show is number of posts to show.
 * @param $orderby is to display posts by order of title, date etc.
 * @param $order is to display posts by order. 
 * @param $excerpt_length is the length of content to display.
 * @param $thumbnail_width is the thumbnail width.
 * @param $thumbnail_height is the thumbnail height.
 * @param $date_format is the date format.
*/ 
function cplw_widget_shortcode_output($category, $height, $width, $posts_to_show, $orderby, $order, $display, $excerpt_length, $thumbnail_width, $thumbnail_height, $date_format){     
    global $post, $wpdb;     
  
    $sort_by = isset($orderby) ? $orderby : 'date'; 
    $sort_order = isset($order) ? $order : 'DESC';   
   
    $cat_posts = new WP_Query(
        "showposts=" . $posts_to_show . 
        "&cat= ". $category  .
        "&orderby=" . $sort_by .
        "&order=" . $sort_order
    ); 

    // Excerpt length 
    $new_excerpt_length = create_function('$length', "return " . $excerpt_length . ";");
    if ( $excerpt_length > 0 )
        add_filter('excerpt_length', $new_excerpt_length);
    $arrExlpodeFields = explode(',',$display);
   
    $arrExlpodeFields = explode(',',$display);
    ?>
        <div class="post_content" style="height:<?php echo $height; ?>px !important width:<?php echo $width; ?>px !important">
            <div class="ovflhidden post_scroll">                
                <?php while ( $cat_posts->have_posts() )
                    {
                        $cat_posts->the_post(); ?>                      
                            <div class="fl newsdesc">                              
                                <?php
                                if (
                                        function_exists('the_post_thumbnail') &&
                                        current_theme_supports("post-thumbnails") &&
                                        in_array("thumb",$arrExlpodeFields) &&
                                        has_post_thumbnail()
                                    ) :

                                ?>
                                        <div class="post_thumbnail">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                <?php the_post_thumbnail( array($thumbnail_width,$thumbnail_height )); ?>
                                            </a>
                                        </div>
                                <?php   
                                endif;
                                ?>
                                <div class="post_data">
                                    <!-- Post title -->
                                    <h2><a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a></h2>
                                    <?php 
                                    if ( in_array("date",$arrExlpodeFields) ) : ?>
                                         <!-- post Date -->
                                        <p class="post_date" ><?php echo the_time($date_format); ?></p>
                                    <?php 
                                    endif; 
                                    if ( in_array("author",$arrExlpodeFields) ) : ?>
                                        <p class="post_author" ><?php  echo "by " ;?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></p>
                                    <?php 
                                    endif; 

                                    if ( in_array("excerpt",$arrExlpodeFields) ) :
                                        the_excerpt(); 
                                    endif; 
                                    if ( in_array("comment_num",$arrExlpodeFields) ) : ?>
                                        <p class="comment-num"><a href="<?php comments_link(); ?>">(<?php comments_number(); ?>)</a></p>
                                    <?php 
                                    endif; 
                                    ?>
                                </div>
                            </div>                                              
                        <?php   
                    } 
                    wp_reset_postdata();               
                ?>
            </div>
        </div>
    <?php 
    add_action('widgets_init', create_function('', 'return register_widget("Category_Post_List_widget");'));
}