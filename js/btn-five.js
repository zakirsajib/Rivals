jQuery(document).ready(function() {

	jQuery('.upload_btn_login_bg').click(function() {
	 formfield = jQuery('#login_bg').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 return false;
	});
	window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 jQuery('#' + formfield).val(imgurl);
	 tb_remove();
	}
});