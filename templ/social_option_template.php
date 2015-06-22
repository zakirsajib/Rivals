<table class="form-table">
		<tr valign="top">
		<td>
			  <label><strong>Display All</strong></label>
			  <input name="hideallsocial" type="checkbox" value="1" <?php checked( '1', get_option( 'hideallsocial' ) ); ?> />
			  <span class="description">If its unchecked all social media icons will not be displayed.</span>

		</td>
		</tr>
</table>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Twitter URL</th> 		 		
		<td>
			  <span class="description">Complete url starts with http://</span><br>
			  <input type="text" name="twt" class="fav" value="<?php echo get_option('twt');?>"/>
			  <label>Display</label>
			  <input name="twtdisplay" type="checkbox" value="1" <?php checked( '1', get_option( 'twtdisplay' ) ); ?> />
		</td>
		</tr>
				
		<tr valign="top">
    		 <th scope="row">Facebook URL</th> 		 		
		<td>	
			  <span class="description">Complete url starts with http://</span><br>
			  <input type="text" name="fb" class="fav" value="<?php echo get_option('fb');?>"/>
			  <label>Display</label>
			  <input name="fbdisplay" type="checkbox" value="1" <?php checked( '1', get_option( 'fbdisplay' ) ); ?> />
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Instagram URL</th> 		 		
		<td>
			  <span class="description">Complete url starts with http://</span><br>
			  <input type="text" name="instagram" class="fav" value="<?php echo get_option('instagram');?>"/>
			  <label>Display</label>
			  <input name="instagramdisplay" type="checkbox" value="1" <?php checked( '1', get_option( 'instagramdisplay' ) ); ?> />
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Youtube URL</th> 		 		
		<td>
			  <span class="description">Complete url starts with http://</span><br>
			  <input type="text" name="youtube" class="fav" value="<?php echo get_option('youtube');?>"/>
			  <label>Display</label>
			  <input name="youtubedisplay" type="checkbox" value="1" <?php checked( '1', get_option( 'youtubedisplay' ) ); ?> />
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Twitch URL</th> 		 		
		<td>
			<span class="description">Complete url starts with http://</span><br>
			<input type="text" name="twitch" class="fav" value="<?php echo get_option('twitch');?>"/>
			<label>Display</label>  
			<input name="twitchdisplay" type="checkbox" value="1" <?php checked( '1', get_option( 'twitchdisplay' ) ); ?> />
			  
		</td>
		</tr>
</table>