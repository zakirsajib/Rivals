<table class="form-table">	
	<tr valign="top">
      	<th scope="row">Favicon</th> 		 		
  	<td>
  			   <?php $fav= get_option('favicon_1');?>
  			   <?php if($fav):?>
  			   		<p class="description">Preview:</p>
  			   		<img class="preview-img" src="<?php echo get_option('favicon_1');?>"/>
  			   <?php endif;?>
  			   <input type="text" name="favicon_1" id="favicon_1" class="fav" value="<?php echo get_option('favicon_1');?>"/>

  			   <input id="plupload-browse-button" class="button upload_btn_favicon" type="button" value="Upload Image" />
  			   <p class="description">Recommended size: 16 X 16 pixels</p>
  	</td>
  	</tr>
  	<tr valign="top">
      	<th scope="row">Logo</th> 		 		
  	<td>
  			   <?php $logo_1= get_option('logo_1');?>
  				<?php if($logo_1):?>
  			   		<p class="description">Preview:</p>
  			   		<img class="preview-img" src="<?php echo get_option('logo_1');?>"/>
  			   	<?php endif;?>
  			   <input type="text" name="logo_1" id="logo_1" class="fav" value="<?php echo get_option('logo_1');?>"/>

  			   <input id="plupload-browse-button" class="button upload_btn_logo1" type="button" value="Upload Image" />
  			   <p class="description">Recommended size: 100 X 100 pixels</p>
  	</td>
  	</tr>
</table>
		
	