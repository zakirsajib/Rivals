<?php 
/*Template Name: Home*/
get_header();
?>

<?php
$Path=$_SERVER['REQUEST_URI'];
$URI= $Path;

if (strpos($URI,'page') !== false): //echo 'true';?>
    
    <style>
    	.feat-banner img{display: none;}
    </style>

<?php endif;?>



<div class="home-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	  	<?php if ( have_posts() ) : ?>
			  <div class="container">
				  	<?php while(have_posts()) : the_post();?>
						<div class="feat-banner">
							<?php the_content();?>
						</div>
					<?php endwhile;?>
			</div> <!-- end container -->
		<?php else : ?>
			<?php get_template_part('not', 'found')?>	
		<?php endif; // end have_posts() check ?>
		
		<div class="clearfix"></div>
		

			<?php 
			global $wp_query;
				
				$default_posts_per_page = get_option( 'posts_per_page' );
				$args = array( 'posts_per_page' => $default_posts_per_page, 'post_type'=>'post', 'paged' => $paged );
				$args = array_merge( $args, $wp_query->query );
				query_posts( $args );
			?>




<?//php $args=array('post_type'=>'post');query_posts($args);?>
		
<div class="home-category-container row-fluid">
	  		<div class="container">
	  			<div class="span8">
			  			<?php if ( have_posts() ) : ?>
			  				<?php while(have_posts()) : the_post();?>
			    			
				    			<div class="row-fluid">
				    				<div class="span7">
				    					<?php if(has_post_thumbnail() ) : ?>
						  					<a href="<?php the_permalink()?>"><?php the_post_thumbnail('homepage-thumb'); ?></a>
						  				<?php else:?>
						  					<img src="http://placehold.it/420x280" alt="default image" />
						  				<?php endif;?>
				    				</div>
				    				
				    				<div class="span5 info-box">
				    					<div class="info">
				    						<ul class="list-inline">
				    							<?php 
				    							if(in_category('league-of-legends')):?>
				    								<li class="lol"><?php the_category(', ') ?></li>
				    							<?php elseif(in_category('dota2')):?>
				    								<li class="dota2"><?php the_category(', ') ?></li>
				    							<?php elseif(in_category('counter-strike-global-offensive')):?>
				    								<li class="csgo"><?php the_category(', ') ?></li>
				    							<?php elseif(in_category('esports')):?>
				    								<li class="esports"><?php the_category(', ') ?></li>
				    							<?php endif;?>
				    							<li><i class="fa fa-clock-o"></i></li>
				    							<li class="human-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></li><li class="divider">-</li><li class="comments"><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
				    						</ul>
				    					</div>
				    					
				    					<a class="title-url" href="<?php the_permalink()?>"><h1 class="title"><?php the_title()?></h1></a>
				    				
				    				<div class="info">
				    					<ul class="list-inline">
				    						<li class="more-btn"><a class="more" href="<?php the_permalink()?>">Read More</a></li>
				    					</ul>
				    				</div>
				    			</div> <!-- end span5 -->
				    			
				    			</div> <!-- end row-fluid -->
				    			<div class="clearfix"></div>
				    			<hr>				    			
			    			<?php endwhile; ?>
			    			
			    			
			    		
			    			
			    		<?php else : ?>
							<?php get_template_part('not', 'found')?>
						<?php endif; // end have_posts() check ?>
	    		</div><!-- end span9 -->
	    		
	    	<div class="span3" id="custom-side">
	    			<?php if ( is_active_sidebar( 'general_sidebar' ) ) : ?>
			        	<?php dynamic_sidebar( 'general_sidebar' );  ?>
			    	<?php endif;?>
	    	</div>
	    	
	    	<div class="clearfix"></div>
	    	
	    				<?php if(function_exists('wp_paginate')) {
				 				wp_paginate();
							 }else {  			
								defaulttheme_content_nav( 'nav-below' ); 
								}
							?>
	    		
	    	<?php wp_reset_query(); ?>
	  		</div> <!-- end container -->
</div> <!-- end category container -->

		
		
		
			
	</div>
</div>
<?php get_footer();?>