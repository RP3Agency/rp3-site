<?php
/**
 * Function cplw_shortcode()  is used to create shortcode for plugin.
 * @param array $atts is to pass attributes to the function. 
*/
function cplw_shortcode($atts){
	extract(shortcode_atts(array(
   		'category' => '',
   		'width' => '',  
        'height' => '',      
        'effects' => '',
        'time' => '',
        'order' => '',
        'orderby' => '',
        'posts_to_show' => '',
        'display' => '',
        'excerpt_length' => '',
        'thumb_height' => '',
        'thumb_width' => '',
        'date_format' => '',
      ), $atts));  
  ob_start();
  ?>
	<script type="text/javascript">  
       (function(){           
            var strEffect = '<?php echo $effects; ?>';
            if(strEffect != 'none')
            {
              jQuery('.post_scroll').cycle({ 
                  fx: strEffect, 
                  timeout: '<?php echo $time; ?>'                
              }); 
            }
        })(jQuery);
    </script>
        
	<?php
    cplw_widget_shortcode_output($category, $height, $width, $posts_to_show, $orderby, $order, $display, $excerpt_length, $thumb_width, $thumb_height, $date_format);
    $shortcodeData = ob_get_contents();	
    ob_end_clean();
    return $shortcodeData;
    }

/**
 * Function cplw_register_shortcodes()  is used to register shortcode.
*/
function cplw_register_shortcodes(){
	add_shortcode('cplw', 'cplw_shortcode');
}
add_action( 'init', 'cplw_register_shortcodes');
?>