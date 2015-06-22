<?php get_header();?>

<div class="category-container row-fluid">
	  <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	  		<div class="container">
	  			<div class="span9">
			  			<?php if ( have_posts() ) : ?>
			  				<?php while(have_posts()) : the_post();?>
			    			
				    			<div class="row-fluid">
				    				<div class="span6">
				    					<?php if(has_post_thumbnail() ) : ?>
						  					<?php the_post_thumbnail(array(420, 280)); ?>
						  				<?php else:?>
						  					<img src="http://placehold.it/420x280" alt="default image" />
						  				<?php endif;?>
				    				</div>
				    				
				    				<div class="span6">
				    					<div class="info">
				    						<ul class="list-inline">
				    							<li><strong><?php the_category(', ') ?></strong></li>
				    							<li class="divider"> - </li>
				    							<li class="human-date"> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?> </li>
				    						</ul>
				    					</div>
				    					
				    					<a class="title-url" href="<?php the_permalink()?>"><h1 class="title"><?php the_title()?></h1></a>
				    					<div class="info">
				    						<ul class="list-inline">
				    							<li>
				    						<a class="fbpopup facebook-share button" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>&t=<?php the_title(); ?>" title="Share on Facebook" target=_blank><i class="fa fa-facebook"></i><span>share</span></a></li>
				    						<li>
				    						<a class="twtpopup twitter-retweet button" href="https://twitter.com/share?source=tweetbutton&text=Rivals&url=<?php echo get_permalink();?>" target=_blank>  <i class="fa fa-twitter"></i><span>tweet</span></a>
				    						</li>
				    						
				    						<li class="divider"> - </li>
				    						<li class="comments"><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>

				    						</ul>
				    					</div>
				    				</div> <!-- end span6 -->
				    			</div> <!-- end row-fluid -->
				    			<div class="clearfix"></div>
				    			<hr>
			    			<?php endwhile;?>
			    		<?php else : ?>
							<?php get_template_part('not', 'found')?>
						<?php endif; // end have_posts() check ?>
	    		</div><!-- end span9 -->
	    		
	    	<div class="span3">
	    			<?php if ( is_active_sidebar( 'general_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'general_sidebar' );  ?>
			    	<?php endif;?>
	    	</div>	
	    	
	  		</div> <!-- end container -->
	  </div> <!-- end postclass -->
</div> <!-- end category container -->
<?php get_footer();?>