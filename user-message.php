<?php 
/*Template Name: User Message */
get_header();
?>

<div class="user-message row-fluid">
		<div class="container">
			<?php	$current_user = wp_get_current_user();
					$user_id = empty($current_user->ID) ? null : $current_user->ID;
					if ( empty($user_id) ) {
						get_template_part('regloginform');
					}
			?><!-- end - if-not-user-logged-in -->
			
			
			<!-- if-user-is-logged -->
			<?php if (!empty($user_id)):?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; endif; ?>
			<?php endif;?> <!-- end-if-user-is-logged -->
			
			
			
			
		</div> <!-- end container -->
</div> <!-- end row-fluid -->

<?php get_footer();?>