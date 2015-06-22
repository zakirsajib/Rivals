<?php get_header();?>

<div class="home-container row-fluid">

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="container">
<?php 

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>

<h1>About: <?php echo the_author_meta('display_name', $current_user->ID); ?></h1>
    <dl class="dl-horizontal">
        <dt>Website</dt>
        <dd><a href="<?php echo the_author_meta('user_url', $current_user->ID); ?>" target="_blank"><?php echo the_author_meta('user_url', $current_user->ID); ?></a></dd>
        
        <dt>Profile</dt>
        <dd><?php echo the_author_meta('user_description', $current_user->ID); ?></dd>
        
        <dt>Display Name</dt>
        <dd><?php echo the_author_meta('display_name', $current_user->ID); ?></dd>
       
        <dt>Email</dt>
        <dd><a href="mailto:<?php echo antispambot(the_author_meta('user_email', $current_user->ID))?>"><?php echo antispambot(the_author_meta('user_email', $current_user->ID)) ?></a></dd>
        
        <dt>Facebook</dt>
        <dd><a href="http://facebook.com/<?php echo the_author_meta('facebook', $current_user->ID); ?>" target="_blank"><?php echo the_author_meta('facebook', $current_user->ID); ?></a></dd>
        
        <dt>Twitter</dt>
        <dd><a href="http://twitter.com/<?php echo the_author_meta('twitter', $current_user->ID); ?>" target="_blank"><?php echo the_author_meta('twitter', $current_user->ID); ?></a></dd>
    </dl>

<h1>Posts by <?php echo the_author_meta('display_name', $current_user->ID); ?>:</h1>


	  <?php if ( have_posts() ) :  while(have_posts()) : the_post();?>
	    	
	    	<dl class="dl-horizontal">
            	<dt>
            		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
            		<?php the_title(); ?></a>
            	</dt>
            	<dd><?php the_time('d M Y'); ?> in <?php the_category(' & ');?></dd>
	    	</dl>    		    	
	  <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>
    <?php endif; ?>	


</div>
</div>    
</div>
<?php get_footer();?>