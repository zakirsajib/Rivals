<?php 
get_header();
?>
<div class="page-container row-fluid">
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="container">
			  	<?php while(have_posts()) : the_post();?>
		  				<?php the_content()?>
			    <?php endwhile;?>
		 </div> <!-- end container -->
		<?php else : ?>
				<?php get_template_part('not', 'found')?>
		<?php endif; // end have_posts() check ?>	
	</div>
</div>
<?php get_footer();?>