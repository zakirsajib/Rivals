<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    	<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<?php wp_head();?>
<?php 
/*Custom stylesheet input by admin in options->css*/
get_template_part('css/custom', 'style');?>
</head>
		
<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MKCR5Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MKCR5Z');</script>
<!-- End Google Tag Manager -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php if(isset($_GET['login']) && $_GET['login'] == 'failed'):?>
	<div class="container">	
		<div class="alert alert-error login-fail">
			<strong>Error!</strong> Login failed: You have entered an incorrect Username or password, please try again.
		</div>
	</div>
<?php endif;?>

<div class="header-wrapper row-fluid" id="header-2"> 
				
  	<div class="container">	  	
		<div class="logo span2">
			<?php $logo= get_option('logo_1');?>
			<?php if($logo):?>
				<a href="<?php echo home_url();?>" title="Click here to go to home page"><img src="<?php echo get_option('logo_1');?>" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>"/></a>
			<?php else:?>
				<a href="<?php echo home_url();?>" title="Click here to go to home page"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>" /></a>
			<?php endif; ?>
		</div>
  	 		
 		
 		<!-- <div class="main-nav"> -->
	 		<div class="navbar navbar-inverse navbar-relative-top span6">
		        <div class="navbar-inner">
		           <div class="span12">
		                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </a>
						<?php wp_nav_menu( array( 
							'menu' => 'main-menu',
							'theme_location' => 'Primary', 
							'menu_id' => 'main-menu', 
							'menu_class' => 'nav', 
							'container_id' =>'',
							'container_class' =>'top-menu nav-collapse collapse',
							'fallback_cb' => 'wp_page_menu'
					));?>	
					
					</div>
		        </div>
	    	</div>
	    <!-- </div> -->
	    
	    <?php if(get_option('hideallsocial')== 1):?>
	    	<!-- <div class="social-media"> -->
	    	<div class="social-media-fortawesome span2">
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
	    <!-- </div> -->
	    <?php endif;?>
	    
	    <!-- <div class="login-meta"> -->
	    
	    <?php global $current_user;?>	
		    <?php if ( !is_user_logged_in() ):?>	    	
		    	<div class="navbar navbar-inverse navbar-relative-top span2">
			        <ul id="main-menu-login" class="nav">
			        	<li><a href="#rivalsLogin" data-toggle="modal">Register/Sign In</a></li>
			        </ul>
			    </div>
			    
			    <!-- Modal -->
				<div id="rivalsLogin" class="modal hide fade" tabindex="-1" role="dialog" 
				aria-labelledby="rivalsLogin" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body">
								<?php get_template_part('regloginform');?>
							</div>
						</div>
					</div>
				</div>
			    
			    
			    
			<?php else: ?>
			  	<div class="logged-meta span2">
			        <ul class="nav nav-pills">
					 <li class="dropdown">   
					    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo the_author_meta( 'display_name', $current_user->ID ); ?> <b class="caret"></b></a>
					    <ul class="dropdown-menu" id="menu1">
					    	<li><a href="<?php bloginfo('url')?>/user-profile">My Profile</a></li>
							<li><a class="wpmessengermenu" mediud="inbox" href="#">Messages</a></li>
					    	<li><a href="<?php echo wp_logout_url(home_url())?>">Logout</a></li>
					    </ul>
					  </li>  
					 </ul>
				</div>
			<?php endif;?>
	    
	    <!-- </div> --> <!-- end login-meta -->
	    
	    
  <!-- <hr> -->
  </div> <!-- container -->
  
</div> <!-- header wrapper -->