<html>
    <head>
    	<title>Select options</title>
        <link rel="stylesheet" type="text/css" href="<?php echo plugins_url('/css/basic.css', __FILE__); ?>">        
        <script type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>         
        <script type="text/javascript" src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script>
        <script type="text/javascript" src="<?php echo plugins_url('/js/dialog_box.js', __FILE__); ?>"></script> 
        <script type="text/javascript" src="<?php echo plugins_url('/js/jquery.validate.js', __FILE__); ?>"></script>
          
        <?php
        if(floatval(get_bloginfo("version")) > floatval("3.5.2"))
        {
        ?>
            <script type="text/javascript" src="<?php echo plugins_url('/js/jquery-migrate.js', __FILE__); ?>"></script>
        <?php
        }
        ?>
    </head>
    <body>         
        <form id="add_CPLWshortcode" name="add_CPLWshortcode" onsubmit="CPLWInsertDialog.insert();return false;" method="post" action="#" class="frm_shortcode">  
            <textarea name="shortcode"  id="shortcode"  readonly="readonly" class="hide" ></textarea>         
            <p>
                <label class="lbl_cplw">
                    <?php _e( 'Category' ); ?>:
                </label>
                <?php wp_dropdown_categories(array('class' => 'required','show_option_all'    => 'All','hide_empty' => 0, )); ?>
            </p>
            <p>
                <label for="num" class="lbl_cplw">
                    <?php _e('Number of posts to show'); ?>:
                </label>
                <input class="required NumberValidation" id="num" name="num" type="text" value="1" size='4' maxlength="5"/> (-1 for all posts)        
            </p>
            <p>
                <label for="display" class="lbl_display lbl_cplw">
                    <?php _e('Display'); ?>:
                </label>
                <select id="display" name="display[]" multiple="multiple" class="display" size="5">
                    <?php
                        $arrDisplay = array("title","excerpt","comment_num","date","thumb","author"); 
                        $arrDisplayLabels = array("title" => "Post Title" , "excerpt" => "Short Description" ,"comment_num" => "Comment Count" ,"date" => "Post Date" ,"thumb" => "Post Thumbnail" ,"author" => "Post Author" ); 
                        foreach($arrDisplay as $strValue)
                        {
                    ?>
                    <option value="<?php echo $strValue; ?>" <?php echo (in_array($strValue,$arrDisplayLabels) || $strValue == 'title') ? "selected=selected" : ''; ?>><?php echo $arrDisplayLabels[$strValue]; ?></option>
                    <?php } ?>
                </select>           
            </p>
            <p>
                <label for="sort_by" class="lbl_cplw">
                    <?php _e('Sort by'); ?>:
                </label>
                <select id="sort_by" name="sort_by">
                    <option value="date">Date</option>
                    <option value="title">Title</option>
                    <option value="comment_count">Number of comments</option>
                    <option value="rand">Random</option>
                </select>           
            </p>
            <p>
                <label for="sort" class="lbl_cplw">
                    <?php _e('Sort order'); ?>:
                </label>
                <select id="sort_order" name="sort_order">
                    <option value="desc">DESC</option>
                    <option value="asc">ASC</option>                   
                </select>           
            </p>
            <p>
                <label for="excerpt_length" class="lbl_cplw">
                    <?php _e( 'Excerpt length (in words):' ); ?>
                </label>
                <input class="digits" type="text" id="excerpt_length" name="excerpt_length" value="10" size="5" maxlength="4"/>
            </p>
            <p>
                <label for="date_format" class="lbl_cplw">
                    <?php _e( 'Date Format :' ); ?>
                </label>
                <input class="input_date_format" type="text" id="date_format" name="date_format" value="F j, Y" maxlength="20" size='20'/>November 28, 2012 (F j, Y)
            </p>
            <p>
                <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Documentation on date and time formatting</a>
            </p>
            <p>
                <label for="effects" class="lbl_effects">
                    <?php _e('Effects'); ?>:
                </label>
                <select id="effects" name="effects" class="widefat effect">
                    <?php
                        $arrEffect = array("none","scrollHorz","scrollVert"); 
                        foreach($arrEffect as $strKey => $strValue)
                        {
                    ?>
                    <option value="<?php echo $strValue; ?>" ><?php echo ucfirst($strValue); ?></option>
                    <?php } ?>
                </select>           
            </p>
            <p>
                <label for="effects_duration" class="lbl_cplw">
                    <?php _e('Effect Duration (milliseconds)'); ?>:
                </label>
                <input  class="digits" id="effects_duration" name="effects_duration" type="text" value="1000" size='5' maxlength="5"/>         
            </p>
            <p>
                <label><?php _e('Wrapper dimensions'); ?>:</label>
                <br />
                <div class="width_wrapper">
                    <label for="width" class="lbl_width">
                        Width: 
                    </label>
                    <input class="widefat required digits" type="text" id="width" name="width" value="500"  size='5'  maxlength="4"/> px
                </div>
                <div class="height_wrapper">
                    <label for="height" class="lbl_cplw">
                        Height: 
                    </label>
                    <input class="widefat required digits" type="text" id="height" name="height" value="500"  size='5'  maxlength="4"/> px 
                </div>         
            </p>
            <p>
                <label><?php _e('Thumbnail dimensions'); ?>:</label>
                <br/>  
                <div class="width_wrapper">
                    <label for="thumb_w" class="lbl_cplw">
                            Width:
                    </label> 
                    <input class="widefat digits" type="text" id="thumb_w" name="thumb_w" value="150"  size='5'  maxlength="3"/> px
                </div> 
                <div class="height_wrapper"> 
                    <label for="thumb_h" class="lbl_thumb_h">
                        Height: 
                    </label>
                    <input class="widefat digits" type="text" id="thumb_h" name="thumb_h" value="150"  size='5' maxlength="3"/> px
                </div>                       
            </p>           
            <p class="submit">                       
                <input type="submit" value="Insert" class="btn_add" id="insert" name="insert">
            </p>
        </form>   
    </body>
</html>