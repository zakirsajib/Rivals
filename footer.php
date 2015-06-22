<div class="footer row-fluid">
		<div class="footer-inner container">
		  	<div class="span4 col1">
		  		<?php if ( is_active_sidebar( 'f_sidebar_one' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_one' );  ?>
		        <?php endif;?>
		  	</div>
		  	
		  	<?php if(get_option('hideallsocial')== 1):?>
		  	<div class="span4 col2">
	    		<h5 class="connect">Connect</h5>
	    		<div class="social-media-fortawesome">
			    	<ul>
		    		<?php if(get_option('fbdisplay')== 1):?>
		    			<li><a href="<?php echo get_option('fb');?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		    		<?php endif;?>
		    		<?php if(get_option('twtdisplay')== 1):?>
		    			<li><a href="<?php echo get_option('twt');?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		    		<?php endif;?>
		    		<?php if(get_option('instagramdisplay')== 1):?>
		    			<li><a href="<?php echo get_option('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
		    		<?php endif;?>
		    		<?php if(get_option('youtubedisplay')== 1):?>
		    			<li><a href="<?php echo get_option('youtube');?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
		    		<?php endif;?>
		    		<?php if(get_option('twitchdisplay')== 1):?>
		    			<li><a href="<?php echo get_option('twitch');?>" target="_blank"><i class="fa fa-twitch"></i></a></li>
		    		<?php endif;?>
		    	</ul>
	    		</div>
		  	</div>
		  	<?php endif;?>
		  	
		  	
		  	
		  	<div class="span4 col3">
		  		<?php if ( is_active_sidebar( 'f_sidebar_three' ) ) : ?>
		        	<?php dynamic_sidebar( 'f_sidebar_three' );  ?>
		        <?php endif;?>
		  	</div>
		  	
		  	<div class="clearfix"></div>
		  	
		  	<div class="copyright-area">
		  		<ul>
		  			<li><a href="<?php echo home_url();?>/terms-of-use">Terms of Use</a></li>
		  			<li><a href="<?php echo home_url();?>/privacy-policy">Privacy Policy</a></li>
		  			<li>|&nbsp;&nbsp;&nbsp;<?php echo get_option('footer-copyright');?></li>
		  		</ul>
		  	</div>
		  			  	
		 </div>
</div>


<?php 
// Google analytics code
$code= get_option('gcode');
if($code):
	echo $code;
endif;
?>
<?php wp_footer();?>
</body>
</html>