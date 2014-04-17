//tinyMCEPopup.requireLangPack();
	
var CPLWInsertDialog = {
	init : function() {		
	    var shortcode; var strCat; var strWidth; var strHeight; var effects; var display; var strNoOfPosts; var time; var sortBy; var excerptLength; var thumb_w; var thumb_h; var date_format;
	    jQuery('.btn_add').live("click",function(e){
	    	
			jQuery("#add_CPLWshortcode").validate();

			jQuery.validator.addMethod("NumberValidation", function(value, element) {   
		     	return this.optional(element) || /^[0-9\-\s]+$/i.test(value);
		    }, "Username must contain only numbers, or dashes.");

			var form = jQuery("#add_CPLWshortcode");
			
			if(form.valid())
			{
				update_CPLWshortcode();				
			}
			else
			{
				return false;
			}        
	    });

		function update_CPLWshortcode() {			
			if (jQuery('#cat').val() !='' && jQuery('#cat').val() != '0') {
				strCat = 'category="'+jQuery('#cat').val()+'"';
			}else{
				strCat = 'category="all" ';
			}
			
			if (jQuery('#width').val() !='' && isNaN(jQuery('#height').val()) == false) {	
				strWidth = ' width="'+jQuery('#width').val()+'"';
				
			}else{
				strWidth = ' width="500" ';
			}

			if (jQuery('#height').val() !='' && isNaN(jQuery('#height').val()) == false) {	
				strHeight = ' height="'+jQuery('#height').val()+'"';
				
			}else{
				strHeight = ' height="500" ';
			}
			
			if ((jQuery('#effects').val() != '') ) {
				effects = ' effects="'+jQuery('#effects').val()+'"';
			}
			else
			{
				effects = ' effects="none" ';
			}
				
			if (jQuery('#num').val() !='') {
				strNoOfPosts = ' posts_to_show="'+jQuery('#num').val()+'"';
			}else{
				strNoOfPosts =  ' posts_to_show="1" ' ;
			}
			
			if (jQuery('select#display option:selected').length > 0) {						
				strDisplay = ' display="'+jQuery('#display').val()+'"';
			}else{
				strDisplay = ' display="title" ' ;
			}

			if (jQuery('#effects_duration').val() !='') {
				time = ' time="'+jQuery('#effects_duration').val()+'"';
			}else{
				time = ' time="1000" ' ;
			}

			if (jQuery('#sort_by').val() !='') {
				sortBy = ' sort_by="'+jQuery('#sort_by').val()+'"';
			}else{
				sortBy = ' sort_by="date" ' ;
			}

			if (jQuery('#sort_order').val() !='') {
				sort = ' order="'+jQuery('#sort_order').val()+'"';
			}else{
				sort = ' order="DESC" ' ;
			}

			if (jQuery('#excerpt_length').val() !='') {
				excerptLength = ' excerpt_length="'+jQuery('#excerpt_length').val()+'"';
			}else{
				excerptLength = ' excerpt_length="10" ' ;
			}

			if (jQuery('#thumb_w').val() !='' && isNaN(jQuery('#thumb_w').val()) == false) {
				thumb_width = ' thumb_width="'+jQuery('#thumb_w').val()+'"';
			}else{
				thumb_width = ' thumb_width="150" ';
			}

			if (jQuery('#thumb_h').val() !='' && isNaN(jQuery('#thumb_h').val()) == false) {
				thumb_height = ' thumb_height="'+jQuery('#thumb_h').val()+'"';
			}else{
				thumb_height = ' thumb_height="150" ';
			}

			if (jQuery('#date_format').val() !='') {
				date_format = ' date_format="'+jQuery('#date_format').val()+'"';
			}else{
				date_format = ' date_format="F j, Y" ';
			}

			var newsc = '[cplw '+strCat+strWidth+strHeight+effects+strNoOfPosts+time+sortBy+excerptLength+thumb_width+thumb_height+date_format+strDisplay+sort+']';
			jQuery('#shortcode').val(newsc);
		}		
	},
	insert : function() {		
		// insert the contents from the input into the document		
		tinyMCEPopup.editor.execCommand('mceInsertContent', false, jQuery('#shortcode').val());
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(CPLWInsertDialog.init, CPLWInsertDialog);

// function to check height and width is number or not
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}