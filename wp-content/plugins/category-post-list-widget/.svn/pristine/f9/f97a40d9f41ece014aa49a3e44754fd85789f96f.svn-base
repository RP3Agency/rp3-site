<?php 
/*
Plugin Name:Category Post list Widget
Author:Stark Mrunmai And  Stark.
Author URI:http://www.starkdigital.net/
Description:This plugin is used to show post under particular category.
Version: 1.1
Author URI:http://www.starkdigital.net/
*/

require_once( dirname(__FILE__)."/cplw_ajax_functions.php" );
add_action('wp_ajax_show_CPLW_diaglogbox', '_fnCPLWShowDiaglogContent'); //dialog box contnt

/**
 * cplw_scripts_method() function includes required jquery files.
 *
 */
function cplw_scripts_method() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('cycle_js', plugins_url('/js/jquery.cycle.all.js', __FILE__));
}

/** Tell WordPress to run cplw_scripts_method() when the 'wp_enqueue_scripts' hook is run. */
add_action('wp_enqueue_scripts', 'cplw_scripts_method'); 

/**
 * cplw_stylesheet() function includes required css files.
 *
 */
function cplw_stylesheet() {
    wp_register_style( 'main-style', plugins_url('/css/main.css', __FILE__) );
    wp_enqueue_style( 'main-style' );
}

/** Tell WordPress to run cplw_scripts_method() when the 'cplw_stylesheet' hook is run. */
add_action( 'wp_enqueue_scripts', 'cplw_stylesheet' ); 


/**
 * cplw_required_css() function includes required css files for admin side.
 *
 */
add_action( 'admin_head', 'cplw_required_css' );

function cplw_required_css() {
    wp_register_style( 'cplw_css', plugins_url('/css/basic.css', __FILE__) );
    wp_enqueue_style( 'cplw_css' );
}

include_once("functions.php"); 
include_once("shortcode.php");  
class Category_Post_List_widget extends WP_Widget 
{
	function Category_Post_List_widget() {
		parent::WP_Widget(false,$name="Category Post List",array('description'=>'Display post under particular category'));
	}
	
	/**
	 * Displays category posts widget on blog.
	 *
	 * @param array $instance current settings of widget .
	 * @param array $args of widget area
	 */
	function widget($args,$instance) {
		global $post;
		$post_old = $post; // Save the post object.
		extract($args);

		// If not title, use the name of the category.
		if( !$instance["widget_title"] ) 
		{
			$category_info = get_category($instance["cat"]);
			$instance["widget_title"] = $category_info->name;
  		}
		
		//sort by
		$valid_sort_by = array('date', 'title', 'comment_count', 'rand');
		if ( in_array($instance['sort_by'], $valid_sort_by) ) 
		{
		    $sort_by = $instance['sort_by'];

		    $sort_order = isset($instance['sort_order']) ? $instance['sort_order'] : 'DESC'; 
		} else 
		{
		    // by default, display latest first
		    $sort_by = 'date';
		    $sort_order = 'DESC';
		}
		// Get effect for front end
		$effects = $instance['effects']	;
		$effects_time = $instance['effects_time'];

		// Get  post info.
		$cat_posts = new WP_Query(
		"showposts=" . $instance["num"] . 
		"&cat=" . $instance["cat"] .
		"&orderby=" . $sort_by .
		"&order=" . $sort_order
		);

		// Excerpt length 
		$new_excerpt_length = create_function('$length', "return " . $instance["excerpt_length"] . ";");
		if ( $instance["excerpt_length"] > 0 )
			add_filter('excerpt_length', $new_excerpt_length);
		$arrExlpodeFields = explode(',',$instance['display']);
		
		echo $before_widget; 
		// Widget title
		echo $before_title;		
		echo $instance["widget_title"];
		echo $after_title;

		$i = 0;
		global $wp_query;
		$total_posts = $wp_query->found_posts;
		
		// Post list
		?>
		<script type="text/javascript">
	        jQuery(document).ready(function() {
	        		var effect = '<?php echo $effects; ?>';
	                if(effect != 'none')
	                {
	                    jQuery('.news_scroll').cycle({ 
	                        fx: effect, 
	                        timeout: '<?php echo $effects_time; ?>',
	                        random:  1
	                    }); 
	                }
	            });
	    </script>
	   	<div class="post_content" style="height:<?php echo $instance['widget_h'] ?>px !important width:<?php echo $instance['widget_w'] ?>px !important">
			<div class="ovflhidden news_scroll">				
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
										<?php the_post_thumbnail( 'thumb', array($instance["thumb_w"],$instance["thumb_h"] )); ?>
									</a>
								</div>
								<?php 	
								endif; 
								?>
								<h2><a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>"><?php echo  get_the_title(); ?></a></h2>
								<?php 

								if ( in_array("date",$arrExlpodeFields) ) : ?>
									<p class="post_date" ><?php the_time($instance['date_format']); ?></p>
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
						<?php	
					} 
					?>
			</div>
		</div>
		<div class="view_all_link">
			<?php
			if(!empty($instance['view_all_link']))
			{
				if($instance['cat'] != 0)
				{
					echo '<a href="' . get_category_link($instance["cat"]) . '">View all</a>';
				}
				else
				{
					if( get_option( 'show_on_front' ) == 'page' )							
						echo '<a href="' .get_permalink( get_option('page_for_posts' ) ). '">View all</a>' ;
					else 							
						echo '<a href="'.get_bloginfo('url'). '">View all</a>' ;
				}
			}
			?>
		</div>
		<?php echo $after_widget; 
		remove_filter('excerpt_length', $new_excerpt_length);
		$post = $post_old; // Restore the post object.
	}

	/**
	 * Form processing...
	 *
	 * @param array $new_instance of widget .
	 * @param array $old_instance of widget .
	 */
	
	function update($new_instance,$old_instance) 
	{
		global $wpdb;
		$displayFields = array();
		if($_POST['display']){
			array_push($_POST['display'], 'title');
			$displayFields = array_unique($_POST['display']);
		}
		else
		{
			$displayFields = array('title');
		}
		$strImplodeFields = implode(',',$displayFields);
		$new_instance['display'] = $strImplodeFields;		
		
		return $new_instance;
	}

	/**
	 * The configuration form.
	 *
	 * @param array $instance of widget to display already stored value .
	 * 
	 */
	function form($instance) 
	{ 	
		$displayFields = array();		
		$displayFields = ($instance['display']) ? $instance['display'] : 'title';
		$display=($instance['display']) ? $instance['display'] : array();
		$arrExlpodeFields = explode(',', $displayFields);
		$instance["widget_w"] = $instance["widget_w"] ? $instance["widget_w"] : '220';
		$instance["widget_h"] = $instance["widget_h"] ? $instance["widget_h"] : '300';
		$instance["excerpt_length"] = $instance["excerpt_length"] ? $instance["excerpt_length"] : '10';
		$instance["scroll_by"] = $instance["scroll_by"] ? $instance["scroll_by"] : '3';
		$instance["date_format"] = $instance["date_format"] ? $instance["date_format"] : 'F j, Y';
		$instance["effects_time"] = $instance["effects_time"] ? $instance["effects_time"] : '3000';
		$instance["sort_order"] = $instance["sort_order"] ? $instance["sort_order"] : 'desc';
		$instance["view_all_link"] = $instance["view_all_link"] ? $instance["view_all_link"] : '';
		$instance["num"] = $instance["num"] ? $instance["num"] : '1';
		?>		
		<p>
			<label for="<?php echo $this->get_field_id("widget_title"); ?>">
				<?php _e( 'Title' ); ?>:
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id("widget_title"); ?>" name="<?php echo $this->get_field_name("widget_title"); ?>" type="text" value="<?php echo esc_attr($instance["widget_title"]); ?>" />
		</p>
		<p>
			<label>
				<?php _e( 'Category' ); ?>:
			</label>
			<?php wp_dropdown_categories( array( 'name' => $this->get_field_name("cat"),'show_option_all' => 'All','hide_empty' => 0, 'selected' => $instance["cat"] ) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("num"); ?>">
				<?php _e('Number of posts to show'); ?>:
			</label>
			<input class="digits" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='4' maxlength="5"/>
			<br/>(-1 for all posts)  			
    	</p>
    	<p>
			<label for="<?php echo $this->get_field_id("display"); ?>">
        		<?php _e('Display'); ?>:
        	</label>
	        <select id="<?php echo $this->get_field_id("display"); ?>" name="display[]" multiple="multiple" class="display" size="5">
	            <?php
					$arrDisplay = array("title","excerpt","comment_num","date","thumb","author"); 
					$arrDisplayLabels = array("title" => "Post Title" , "excerpt" => "Short Description" ,"comment_num" => "Comment Count" ,"date" => "Post Date" ,"thumb" => "Post Thumbnail" ,"author" => "Post Author" ); 
					foreach($arrDisplay as $strValue)
					{
				?>
				<option value="<?php echo $strValue; ?>" <?php echo (in_array($strValue,$arrExlpodeFields) || $strValue == 'title') ? "selected=selected" : ''; ?>><?php echo $arrDisplayLabels[$strValue]; ?></option>
				<?php } ?>
	        </select>			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("sort_by"); ?>">
        		<?php _e('Sort by'); ?>:
        	</label>
	        <select id="<?php echo $this->get_field_id("sort_by"); ?>" name="<?php echo $this->get_field_name("sort_by"); ?>">
		        <option value="date"<?php selected( $instance["sort_by"], "date" ); ?>>Date</option>
		        <option value="title"<?php selected( $instance["sort_by"], "title" ); ?>>Title</option>
		        <option value="comment_count"<?php selected( $instance["sort_by"], "comment_count" ); ?>>Number of comments</option>
		        <option value="rand"<?php selected( $instance["sort_by"], "rand" ); ?>>Random</option>
	        </select>			
    	</p>
    	<p>
            <label for="<?php echo $this->get_field_id("sort_order"); ?>" >
                <?php _e('Sort order'); ?>:
            </label>
            <select id="<?php echo $this->get_field_id("sort_order"); ?>" name="<?php echo $this->get_field_name("sort_order"); ?>">
                <option value="desc" <?php selected( $instance["sort_order"], "desc" ); ?>>DESC</option>
                <option value="asc" <?php selected( $instance["sort_order"], "asc" ); ?>>ASC</option>                   
            </select>           
        </p>
        <p>
			<label for="<?php echo $this->get_field_id("excerpt_length"); ?>">
				<?php _e( 'Excerpt length (in words):' ); ?>
			</label>
			<input class="digits" type="text" id="<?php echo $this->get_field_id("excerpt_length"); ?>" name="<?php echo $this->get_field_name("excerpt_length"); ?>" value="<?php echo $instance["excerpt_length"]; ?>" size="5" maxlength="4"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("date_format"); ?>">
				<?php _e( 'Date Format :' ); ?>
			</label>
			<input class="" type="text" id="<?php echo $this->get_field_id("date_format"); ?>" name="<?php echo $this->get_field_name("date_format"); ?>" value="<?php echo $instance["date_format"]; ?>"  size='20' maxlength="20"/>
			<br/>November 28, 2012 (F j, Y)
		</p>
		<p>
			<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Documentation on date and time formatting</a>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id("effects"); ?>">
        		<?php _e('Effects'); ?>:
        	</label>
        	<select id="<?php echo $this->get_field_id("effects"); ?>" name="<?php echo $this->get_field_name("effects"); ?>" class="widefat effect">
				<?php
					$arrEffect = array("none","scrollHorz","scrollVert"); 
					foreach($arrEffect as $strKey => $strValue)
					{
				?>
				<option value="<?php echo $strValue; ?>" <?php selected( $instance["effects"], "$strValue" ); ?>><?php echo ucfirst($strValue); ?></option>
				<?php } ?>
			</select>	        
    	</p>
    	<p>
			<label for="<?php echo $this->get_field_id("effects_time"); ?>">
				<?php _e('Effect Duration (milliseconds)'); ?>:
			</label>
			<input  class="digits" id="<?php echo $this->get_field_id("effects_time"); ?>" name="<?php echo $this->get_field_name("effects_time"); ?>" type="text" value="<?php echo absint($instance["effects_time"]); ?>" size='5' maxlength="5"/>			
    	</p>
		<p>
			<label><?php _e('Widget dimensions'); ?>:</label>
			<br />
			<label for="<?php echo $this->get_field_id("widget_w"); ?>">
				Width: 
			</label>
			<input class="widefat widget_dimension digits" type="text" id="<?php echo $this->get_field_id("widget_w"); ?>" name="<?php echo $this->get_field_name("widget_w"); ?>" value="<?php echo $instance["widget_w"]; ?>"  size='5'  maxlength="4"/> px
			<br />
			<label for="<?php echo $this->get_field_id("widget_h"); ?>">
				Height: 
			</label>
			<input class="widefat widget_dimension digits" type="text" id="<?php echo $this->get_field_id("widget_h"); ?>" name="<?php echo $this->get_field_name("widget_h"); ?>" value="<?php echo $instance["widget_h"]; ?>"  size='5'  maxlength="4"/> px			
		</p>
		<p>
			<label><?php _e('Thumbnail dimensions'); ?>:</label>
			<br/>	
			<label for="<?php echo $this->get_field_id("thumb_w"); ?>">
					Width:
			</label> 
			<input class="digits" type="text" id="<?php echo $this->get_field_id("thumb_w"); ?>" name="<?php echo $this->get_field_name("thumb_w"); ?>" value="<?php echo $instance["thumb_w"]; ?>"  size='5'  maxlength="3"/> px
			<br/>	
			<label for="<?php echo $this->get_field_id("thumb_h"); ?>">
				Height: 
			</label>
			<input class="digits" type="text" id="<?php echo $this->get_field_id("thumb_h"); ?>" name="<?php echo $this->get_field_name("thumb_h"); ?>" value="<?php echo $instance["thumb_h"]; ?>"  size='5' maxlength="3"/> px						
		</p>
		<p>
			<label><?php _e('Show view all link'); ?>: </label>			
			<input type="checkbox" name="<?php echo $this->get_field_name("view_all_link"); ?>" value="1" class="link" id="<?php echo $this->get_field_id("view_all_link"); ?>" <?php echo ($instance["view_all_link"] == 1) ? 'checked' : ''; ?>> 
		</p>
		
		<?php 
	}
} 
add_action('widgets_init', create_function('', 'return register_widget("Category_Post_List_widget");'));

// Below code is to display tinymce button on page.
add_action( 'admin_init', 'cplw_addTinyMCEButtons' );
function cplw_addTinyMCEButtons() {
    add_filter("mce_external_plugins", "cplw_add_TMCEbutton");
    add_filter('mce_buttons', 'cplw_register_TMCEbutton');
} 

function cplw_register_TMCEbutton($buttons) {
    array_push( $buttons, "separator", 'CPLWPosts' ); 
    return $buttons;
}  
function cplw_add_TMCEbutton($plugin_array) {
    $plugin_array['cplwPosts'] = plugin_dir_url(__FILE__). '/js/tinymce_button.js';
    return $plugin_array;
}
?>