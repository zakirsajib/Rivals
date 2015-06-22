<?php 
get_header();
?>
<div class="home-container single row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="container">
			<div class="span8">
				<?php while(have_posts()) : the_post();?>   
					<?php the_content();?>
					
					<div class="post-title">
						<h1><?php the_title();?></h1>

							<?php get_template_part('includes/fb','sharecount');?>
														
							<ul class="list-inline">
								
								<li><span id="facebookfeed">Loading...</span> <span class="share-label">&nbsp;Shares</span></li>
	    						<li>
	    						<a class="fbpopup facebook-share button" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>" target=_blank><i class="fa fa-facebook"></i></a></li>
	    						
	    						<li>
	    						<a class="twtpopup twitter-retweet button" href="https://twitter.com/share?source=tweetbutton&text=Rivals&url=<?php echo get_permalink();?>" target=_blank>  <i class="fa fa-twitter"></i></a>
	    						</li>
							</ul>
					</div>	
						
						
					<div class="clearfix"></div>
					<div class="editorial-notes">
						
						<?php if(get_field('source_notes')||get_field('source_url_notes')):?>
						<!-- <strong>Editorial Notes</strong><br> -->
							<strong>Source:</strong>&nbsp;<a href="<?php the_field('source_url_notes');?>" target="_blank"><?php the_field('source_notes');?></a><br>
						<?php endif;?>
						
						<?php if(get_field('image_notes')):?>
							<img src="<?php the_field('image_notes')?>"><br>
						<?php endif;?>
						
						<?php if(get_field('info_notes')):?>
							<strong>Info:</strong>&nbsp;<?php the_field('info_notes')?><br>
						<?php endif;?>
						
						<?php if(get_field('title_1_notes')):?>
							<strong><?php the_field('title_1_notes')?>:</strong>
						<?php endif;?>
						
						<?php if(get_field('member_bearing_title_1_notes')):?>
							<?php the_field('member_bearing_title_1_notes')?><br>
						<?php endif;?>
						
						<?php if(get_field('title_2_notes')):?>
							<strong><?php the_field('title_2_notes')?>:</strong>
						<?php endif;?>
						
						<?php if(get_field('member_bearing_title_2_notes')):?>
							<?php the_field('member_bearing_title_2_notes')?><br>
						<?php endif;?>
						
						<?php if(get_field('title_3_notes')):?>
							<strong><?php the_field('title_3_notes')?>:</strong>
						<?php endif;?>
						
						<?php if(get_field('member_bearing_title_3_notes')):?>
							<?php the_field('member_bearing_title_3_notes')?>
						<?php endif;?>
						
					</div>
	
					
					<div class="clearfix"></div>
					<div class="single-info">
						<strong class="date">Date:</strong>&nbsp;<time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time><span class="divider">/</span>
						<strong class="author">Author:</strong>&nbsp;<span><?php echo the_author_meta('first_name'); ?></span>&nbsp;<span>"<?php echo the_author_meta('nickname'); ?>"</span>&nbsp;<span><?php echo the_author_meta('last_name'); ?></span><br><strong class="categories">Category:</strong>&nbsp; <?php the_category(', ') ?><span class="divider">/</span><?php echo get_the_tag_list('<strong class="tags">Tags:</strong>&nbsp; ',', ',' '); ?>
						
						<br><strong> Total views:</strong>&nbsp;<?php echo wpp_get_views($post->ID, 'weekly'); ?>
						
					</div>
				
				<div class="clearfix"></div>
				<?php edit_post_link('Edit', '<p>', '</p>'); ?>
					
				<?php endwhile;?>	
    
    
			    <?php 
				// pagination
				content_nav(); ?>
			    
			    
			     <div class="comments-area row-fluid">
					<?php comments_template('', true ); ?>
				</div>  
			</div>
			
			
			<div class="span3" id="custom-side">
				<?php if ( is_active_sidebar( 'general_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'general_sidebar' );  ?>
			    <?php endif;?>
			</div>  
    
    </div> <!-- end container -->
    </div>
</div>

<?php get_footer();?>


