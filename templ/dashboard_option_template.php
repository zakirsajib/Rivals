<table class="form-table">
    	<tr valign="top"><th scope="row">Title</th><td>	
			<input type="text" name="dashboard_title" class="fav" value="<?php echo get_option('dashboard_title');?>"/>
		</td>
		</tr>
    	<tr valign="top"><th scope="row">Descriptions</th><td>
			<textarea name="dashboard_text" cols="50" rows="10"><?php echo get_option('dashboard_text');?></textarea>
		</td>
		</tr>
		
		<tr valign="top"><th scope="row">Footer Text</th><td>	
			<input type="text" name="dashboard_footer_text" class="fav" value="<?php echo get_option('dashboard_footer_text');?>"/>
		</td>
		</tr>
		
		<tr valign="top"><th scope="row">Dashboard Logo</th><td>	
			<?php if(get_option('dsh_logo')):?>
				<p class="description">Preview:</p>
				<img class="preview-img" src="<?php echo get_option('dsh_logo');?>"alt="admin logo"/>
			 <?php endif;?>
			 <input type="text" name="dsh_logo" id="dsh_logo" class="fav" value="<?php echo get_option('dsh_logo');?>"/>
			 <input id="plupload-browse-button" class="button upload_dsh_logo" type="button" value="Upload Image" />
			 <p class="description">Recommended size: 30 X 31 pixels</p>
		</td>
		</tr>
		
</table>