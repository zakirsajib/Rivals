jQuery(document).ready(function() {
 
jQuery('#upload_image_three').click(function() {
	
	window.send_to_editor = function(html) {
 	
 	//Use this one
	imgurl = jQuery(html).attr('src') || jQuery(html).find('img').attr('src') || jQuery(html).attr('href');
 	
 	jQuery('#minnesota_bank_logo').val(imgurl);
 	tb_remove();
 }
	 tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
	 return false;
	});
});