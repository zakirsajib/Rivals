<table class="form-table">
	<tr valign="top">
		<th scope="row">Login Logo</th> 		 		
	<td>	
		<?php if(get_option('login_logo')):?>
			<p class="description">Preview:</p>
			<img class="preview-img" src="<?php echo get_option('login_logo');?>"/>
		 <?php endif;?>
		 <input type="text" name="login_logo" id="login_logo" class="fav" value="<?php echo get_option('login_logo');?>"/>
		 <input id="plupload-browse-button" class="button upload_btn_login" type="button" value="Upload Image" />
		 <p class="description">WP default recommended size: 274 X 63 pixels</p>
	</td>
	</tr>
	<tr valign="top">
		<th scope="row">Background image</th> 		 		
	<td>	
		<?php if(get_option('login_bg')):?>
		<p class="description">Preview:</p>
			<img class="preview-img" src="<?php echo get_option('login_bg');?>" width="150" height="150"/>
		 <?php endif;?>
		 <input type="text" name="login_bg" id="login_bg" class="fav" value="<?php echo get_option('login_bg');?>"/>
		 <input id="plupload-browse-button" class="button upload_btn_login_bg" type="button" value="Upload Image" />
		 <p class="description">Recommended size: 1000 X 1000 pixels</p>
	</td>
	</tr>
</table>