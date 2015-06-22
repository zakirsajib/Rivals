<?php
// create custom plugin settings menu
add_action('admin_menu', 'theme_create_menu');

function theme_create_menu() {

	//create new top-level menu
	add_theme_page('Theme Settings', 'Options', 'administrator', 'theme_option', 'theme_settings_page');

	//call register settings function
	
	add_action( 'admin_init', 'register_header_tab_settings' );
	add_action( 'admin_init', 'register_social_tab_settings' );
	add_action( 'admin_init', 'register_footer_tab_settings' );
	add_action( 'admin_init', 'register_cat_tab_settings' );
	add_action( 'admin_init', 'register_css_tab_settings' );
	add_action( 'admin_init', 'register_login_tab_settings' );
	add_action( 'admin_init', 'register_dashboard_tab_settings' );
}

// responsible for changing the button name from settings option

function register_header_tab_settings() {	
	register_setting( 'baw-settings-group', 'favicon_1' );
	register_setting( 'baw-settings-group', 'logo_1' );
}

function register_social_tab_settings() {
	register_setting( 'social-settings-group', 'hideallsocial' );
	register_setting( 'social-settings-group', 'twt' );
	register_setting( 'social-settings-group', 'fb' );
	register_setting( 'social-settings-group', 'instagram' );
	register_setting( 'social-settings-group', 'youtube' );
	register_setting( 'social-settings-group', 'twitch' );
	register_setting( 'social-settings-group', 'twtdisplay' );
	register_setting( 'social-settings-group', 'fbdisplay' );
	register_setting( 'social-settings-group', 'instagramdisplay' );
	register_setting( 'social-settings-group', 'youtubedisplay' );
	register_setting( 'social-settings-group', 'twitchdisplay' );
}

function register_footer_tab_settings() {
	
	register_setting( 'footer-settings-group', 'footer-copyright' );
	register_setting( 'footer-settings-group', 'footer-addr' );
	register_setting( 'footer-settings-group', 'footer-phone' );
	register_setting( 'footer-settings-group', 'footer-email' );
}

function register_cat_tab_settings() {
	register_setting( 'cat-settings-group', 'cat-lol' );
	register_setting( 'cat-settings-group', 'cat-dota' );
	register_setting( 'cat-settings-group', 'cat-csgo' );
	register_setting( 'cat-settings-group', 'cat-esports' );
}

function register_css_tab_settings() {
	register_setting( 'css-settings-group', 'theme_font_size' );
	register_setting( 'css-settings-group', 'body-color' );
	register_setting( 'css-settings-group', 'body-size' );
	register_setting( 'css-settings-group', 'body-line-height' );
	register_setting( 'css-settings-group', 'link-color' );
	register_setting( 'css-settings-group', 'link-hover-color' );
	register_setting( 'css-settings-group', 'link-active-color' );
	register_setting( 'css-settings-group', 'nav-color' );
	register_setting( 'css-settings-group', 'nav-hover-color' );
	register_setting( 'css-settings-group', 'nav-active-color' );
	register_setting( 'css-settings-group', 'header-bk-color' );
	register_setting( 'css-settings-group', 'sidebar-width' );
	register_setting( 'css-settings-group', 'container-width' );
	register_setting( 'css-settings-group', 'pagination-bk-color' );
	register_setting( 'css-settings-group', 'pagination-color' );
	register_setting( 'css-settings-group', 'pagination-hover-bk-color' );
	register_setting( 'css-settings-group', 'pagination-hover-color' );
	register_setting( 'css-settings-group', 'pagination-act-bk-color' );
	register_setting( 'css-settings-group', 'pagination-act-color' );
	
	register_setting( 'css-settings-group', 'readmore-bk-color' );
	register_setting( 'css-settings-group', 'readmore-color' );
	register_setting( 'css-settings-group', 'readmore-hover-bk-color' );
	register_setting( 'css-settings-group', 'readmore-hover-color' );
	
	register_setting( 'css-settings-group', 'submit-bk-color' );
	register_setting( 'css-settings-group', 'submit-color' );
}

function register_login_tab_settings() {
	register_setting( 'login-settings-group', 'login_logo' );
	register_setting( 'login-settings-group', 'login_bg' );
}

function register_dashboard_tab_settings() {
	register_setting( 'dashboard-settings-group', 'dashboard_title');
	register_setting( 'dashboard-settings-group', 'dashboard_text');
	register_setting( 'dashboard-settings-group', 'dashboard_footer_text');
	register_setting( 'dashboard-settings-group', 'dsh_logo');
}



function theme_settings_page() {
?>
<div class="wrap">
<div id="icon-themes" class="icon32"></div>
<?php settings_errors(); ?>

		<?php  
			$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'header_options'; 
        ?> 
			<h2 class="nav-tab-wrapper"> 
			<a href="?page=theme_option&tab=header_options" class="nav-tab <?php echo $active_tab == 'header_options' ? 'nav-tab-active' : ''; ?>">Header</a>
            <a href="?page=theme_option&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Media</a>
            <a href="?page=theme_option&tab=footer_options" class="nav-tab <?php echo $active_tab == 'footer_options' ? 'nav-tab-active' : ''; ?>">Footer</a>
              <a href="?page=theme_option&tab=cat_options" class="nav-tab <?php echo $active_tab == 'cat_options' ? 'nav-tab-active' : ''; ?>">Category Style</a>
            <a href="?page=theme_option&tab=css_options" class="nav-tab <?php echo $active_tab == 'css_options' ? 'nav-tab-active' : ''; ?>">CSS Style</a> 
            <a href="?page=theme_option&tab=login_options" class="nav-tab <?php echo $active_tab == 'login_options' ? 'nav-tab-active' : ''; ?>">Admin Login</a> 
            <a href="?page=theme_option&tab=dashboard_options" class="nav-tab <?php echo $active_tab == 'dashboard_options' ? 'nav-tab-active' : ''; ?>">Dashboard</a> 
        </h2> 	




<form class="form" method="post" action="options.php">
        
    	<?php  
        	if( $active_tab == 'home_options' ) { 
            	settings_fields( 'home-settings-group' );   
            	do_settings_sections( 'home-settings-group' );?>
            		<?php get_template_part('templ/home_option_template');?>
         	
         	<?php }elseif($active_tab == 'header_options'){
         		settings_fields( 'baw-settings-group' );   
            	do_settings_sections( 'baw-settings-group' );?>
            		<?php get_template_part('templ/header_option_template');?>
            
            <?php }elseif($active_tab == 'social_options'){
         		settings_fields( 'social-settings-group' );   
            	do_settings_sections( 'social-settings-group' );?>
            		<?php get_template_part('templ/social_option_template');?>		
            
            <?php }elseif($active_tab == 'cat_options'){
         		settings_fields( 'cat-settings-group' );   
            	do_settings_sections( 'cat-settings-group' );?>
            		<?php get_template_part('templ/cat_option_template');?>
            
            <?php }elseif($active_tab == 'css_options'){
         		settings_fields( 'css-settings-group' );   
            	do_settings_sections( 'css-settings-group' );?>
            		<?php get_template_part('templ/css_option_template');?>
            
            <?php }elseif($active_tab == 'login_options'){
         		settings_fields( 'login-settings-group' );   
            	do_settings_sections( 'login-settings-group' );?>
            		<?php get_template_part('templ/login_option_template');?>
			
			<?php }elseif($active_tab == 'dashboard_options'){
         		settings_fields( 'dashboard-settings-group' );   
            	do_settings_sections( 'dashboard-settings-group' );?>
            		<?php get_template_part('templ/dashboard_option_template');?>
			
            
         	<?php }elseif($active_tab == 'footer_options'){ 
            	settings_fields( 'footer-settings-group' );  
            	do_settings_sections( 'footer-settings-group' );?>
            		<?php get_template_part('templ/footer_option_template');?>
          	<?php }?>
            <?php submit_button(); ?>  
    
        
        
</form>
</div>

<style type="text/css">
.form-table th{
	font-weight: 700;
}

h2 .nav-tab {
	font-size: 16px;
}

h3{
	border-bottom: 1px solid #ccc;
	padding: 0 0 0.5em;
}


hr{
	border: 1px solid #eee;
}

p{
	margin: 1.8em 0;
}
input.fav{  
	clear: both;
	padding: 5px;  
	border: solid 1px #BBBBBB;  
	outline: 0;  
	width: 50%;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
} 

input.fav-fontfield{
	clear: both;
	padding: 5px;  
	border: solid 1px #BBBBBB;  
	outline: 0;  
	width: 10%;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
}


input.fav-long{
	clear: both;
	padding: 5px;  
	border: solid 1px #BBBBBB;  
	outline: 0;  
	width: 80%;  
	background: #FFFFFF;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
}


textarea{
	padding: 5px;  
	border: solid 1px #BBBBBB;
	outline: 0;  
	box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
	-webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
}


.alt-seo{
	float: left;
	width:70%;
}

.preview-img{
	float: left;
	text-align: center;
	padding: 5px;
	margin: 0 20px 0 0;
	border: 1px solid #CCC;
}

submit.button-primary {
	width: auto;
	padding: 9px 15px;
	background: #336699;
	border: 0;
	font-size: 14px;
	color: #FFFFFF;
}  
</style>
<?php } ?>