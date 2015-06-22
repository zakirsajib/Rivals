<h3>Body Layout</h3>
<table class="form-table">
	<tr valign="top">
    		 <th scope="row">Sidebar Max. Width</th> 		 		
		<td>
			 <input type="text" name="sidebar-width" value="<?php echo get_option('sidebar-width');?>" class="fav-fontfield"/>px<br>
			<span class="description">Default is 300px</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Container Max. width</th> 		 		
		<td>
			 <input type="text" name="container-width" value="<?php echo get_option('container-width');?>" class="fav-fontfield"/>px<br>
			<span class="description">Default is 1150px</span>
		</td>
		</tr>
</table>
<h3>Body/Paragraph</h3>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Font size</th> 		 		
		<td>
			 <?php if(get_option('theme_font_size')):?>	 	
			<input type="text" name="theme_font_size" class="fav-fontfield" value="<?php echo get_option('theme_font_size');?>"/>
			<?php else:?>
				<input type="text" name="theme_font_size" class="fav-fontfield" value="100%"/>
			<?php endif;?>
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Body copy color</th> 		 		
		<td>
			 <input type="text" name="body-color" value="<?php echo get_option('body-color');?>" class="wp-color-picker-field" data-default-color="#333333" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Body paragraph font size</th> 		 		
		<td>
			 <input type="text" name="body-size" value="<?php echo get_option('body-size');?>" class="fav-fontfield"/>px<br>
			<span class="description">Default is 18px</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Body paragraph line height</th> 		 		
		<td>
			 <input type="text" name="body-line-height" value="<?php echo get_option('body-line-height');?>" class="fav-fontfield"/>px<br>
			<span class="description">Default is 28px</span>
		</td>
		</tr>
		
		
</table>
<h3>Link/Anchor</h3>
<table class="form-table">		
		<tr valign="top">
    		 <th scope="row">Link color</th> 		 		
		<td>
			 <input type="text" name="link-color" value="<?php echo get_option('link-color');?>" class="wp-color-picker-field" data-default-color="#006ddc" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Link:hover color</th> 		 		
		<td>
			 <input type="text" name="link-hover-color" value="<?php echo get_option('link-hover-color');?>" class="wp-color-picker-field" data-default-color="#0f3647" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Link:active color</th> 		 		
		<td>
			 <input type="text" name="link-active-color" value="<?php echo get_option('link-active-color');?>" class="wp-color-picker-field" data-default-color="#000000" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>
<h3>Navigation</h3>
<table class="form-table">		
		
		<tr valign="top">
    		 <th scope="row">Menu item color</th> 		 		
		<td>
			 <input type="text" name="nav-color" value="<?php echo get_option('nav-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Menu mouse hover color</th> 		 		
		<td>
			 <input type="text" name="nav-hover-color" value="<?php echo get_option('nav-hover-color');?>" class="wp-color-picker-field" data-default-color="#5e5e5e" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		
		<tr valign="top">
    		 <th scope="row">Active Menu color</th> 		 		
		<td>
			 <input type="text" name="nav-active-color" value="<?php echo get_option('nav-active-color');?>" class="wp-color-picker-field" data-default-color="#5e5e5e" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>

<hr>
<h3>Header</h3>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Header background color</th> 		 		
		<td>
			 <input type="text" name="header-bk-color" value="<?php echo get_option('header-bk-color');?>" class="wp-color-picker-field" data-default-color="#151515" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>
<h3>Pagination</h3>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Pagination background color</th> 		 		
		<td>
			 <input type="text" name="pagination-bk-color" value="<?php echo get_option('pagination-bk-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Pagination color</th> 		 		
		<td>
			 <input type="text" name="pagination-color" value="<?php echo get_option('pagination-color');?>" class="wp-color-picker-field" data-default-color="#333333" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Pagination mouse hover background color</th> 		 		
		<td>
			 <input type="text" name="pagination-hover-bk-color" value="<?php echo get_option('pagination-hover-bk-color');?>" class="wp-color-picker-field" data-default-color="#444444" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Pagination mouse hover color</th> 		 		
		<td>
			 <input type="text" name="pagination-hover-color" value="<?php echo get_option('pagination-hover-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Active Pagination background color</th> 		 		
		<td>
			 <input type="text" name="pagination-act-bk-color" value="<?php echo get_option('pagination-act-bk-color');?>" class="wp-color-picker-field" data-default-color="#444444" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Active Pagination color</th> 		 		
		<td>
			 <input type="text" name="pagination-act-color" value="<?php echo get_option('pagination-act-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>
<h3>Read more button</h3>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Background color</th> 		 		
		<td>
			 <input type="text" name="readmore-bk-color" value="<?php echo get_option('readmore-bk-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Color</th> 		 		
		<td>
			 <input type="text" name="readmore-color" value="<?php echo get_option('readmore-color');?>" class="wp-color-picker-field" data-default-color="#444444" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Mouse hover background color</th> 		 		
		<td>
			 <input type="text" name="readmore-hover-bk-color" value="<?php echo get_option('readmore-hover-bk-color');?>" class="wp-color-picker-field" data-default-color="#444444" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Mouse hover color</th> 		 		
		<td>
			 <input type="text" name="readmore-hover-color" value="<?php echo get_option('readmore-hover-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>
<h3>Submit button</h3>
<table class="form-table">
		<tr valign="top">
    		 <th scope="row">Background color</th> 		 		
		<td>
			 <input type="text" name="submit-bk-color" value="<?php echo get_option('submit-bk-color');?>" class="wp-color-picker-field" data-default-color="#2b2b2b" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
		<tr valign="top">
    		 <th scope="row">Color</th> 		 		
		<td>
			 <input type="text" name="submit-color" value="<?php echo get_option('submit-color');?>" class="wp-color-picker-field" data-default-color="#ffffff" /><br>
			<span class="description">Default used if no color is selected</span>
		</td>
		</tr>
</table>