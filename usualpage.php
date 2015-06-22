<?php 
/*Template Name: 3 Columns layouts */
get_header();
?>

<div class="page-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="container">
				
				<div class="span3 left-sidebar">				
					<?php if ( is_active_sidebar( 'f_sidebar_one' ) ) : ?>
			        	<?php dynamic_sidebar( 'f_sidebar_one' );  ?>
			        <?php endif;?>
				</div>
				
				<div class="span5">
			  		<?php while(have_posts()) : the_post();?>
    					<?php if(has_post_thumbnail() ) : ?>
		  					<?php the_post_thumbnail('full'); ?>
		  				<?php endif;?>
		  				<div class="clearfix"></div>
		  				
		  				<h1 class="page-title"><?php the_title();?></h1>
		  				
		  				<?php the_content();?>
		  				
			    	<?php endwhile;?>
	    		</div><!-- end span9 -->
	    		
		    	<div class="span3" id="custom-side">
		    		<?//php if ( is_active_sidebar( 'general_sidebar' ) ) : ?>
				        <?//php dynamic_sidebar( 'general_sidebar' );  ?>
				    <?//php endif;?>
		    	</div>	
		 </div> <!-- end container -->
		<?php else : ?>
				<?php get_template_part('not', 'found')?>
		<?php endif; // end have_posts() check ?>	
	</div>
</div>
<?php get_footer();?>