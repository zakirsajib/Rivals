<?php
define ("THEMENAME", "rivals");

function init_theme_scripts() {
	add_filter('show_admin_bar', '__return_false');
}
add_action('init', 'init_theme_scripts');

$current_path= dirname(__FILE__);
require_once ($current_path. '/wpbakery/js_composer/js_composer.php');
require_once($current_path. '/theme-options.php'); // Theme options
require_once($current_path. '/dashboard/dashboard-options.php'); // Dashboard options
require_once($current_path. '/login/login-options.php'); // Login options

// Adding thumbnail into admin's column
require_once($current_path. '/includes/thumbnail.php');	// Thumbnails columns


/********** Remove Plugin updates notice ***********/

//remove_action( 'load-update-core.php', 'wp_update_plugins' );
//add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );




/********** Sets up the content width value based on the theme's design and stylesheet. ***********/
if ( ! isset( $content_width ) )
$content_width = 1150;



/********** Register bootstrap javascript ***********/

function wpbootstrap_scripts_with_jquery(){
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) ); // Updated 2.3.2
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );



/***** Different color schemes *****/
function colorpalette_theme_customizer( $wp_customize ) {

	$wp_customize->add_section( 'colorpalette_color_scheme_settings', array(
		'title'       => __( 'Color Scheme', 'colorpalette' ),
		'priority'    => 30,
	) );

	$wp_customize->add_setting( 'colorpalette_color_scheme', array(
		'default'        => 'Grey',
		'type'       => 'option',
	) );

	$wp_customize->add_control( 'colorpalette_color_scheme', array(
		'label'   => 'Choose your color scheme',
		'section' => 'colorpalette_color_scheme_settings',
		'type'       => 'radio',
		'choices'    => array(
			__( 'Grey', 'locale' ) => 'grey',
			__( 'Red', 'locale' ) => 'red',
			__( 'Green', 'locale' ) => 'green',
			__( 'Blue', 'locale' ) => 'blue',
		),
	) );
	
}
//add_action('customize_register', 'colorpalette_theme_customizer');


function load_fonts() {
            wp_register_style('oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700italic');
            wp_enqueue_style( 'oswald');
            
            wp_register_style('lato', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic');
            wp_enqueue_style( 'lato');
}
 
add_action('wp_print_styles', 'load_fonts');


/********** Register themes Stylesheet ***********/
function default_theme_styles() {
	global $wp_styles;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Custom css if any
	//wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate/animate.css');
	//responsiveslider
	//wp_enqueue_style( 'responsivecss', get_template_directory_uri() . '/css/responsiveslider/responsiveslides.css');
	// Flexslider
    //wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.css');
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'default-theme-style', get_stylesheet_uri() );
	
	
	
	//wp_enqueue_style( 'rwd-display', get_template_directory_uri() . '/css/rwd-display.css');
	
	
	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	
	// Load our IE-only stylesheet for all versions of IE:
	wp_enqueue_style( 'default-theme-ie', get_template_directory_uri() . '/css/ie.css', array( 'default-theme-style' ), '2013');
	$wp_styles->add_data( 'default-theme-ie', 'conditional', 'IE' );
	
	 /**
	* Load our IE version-specific stylesheet:
	* <!--[if IE 7]> ... <![endif]-->
	*/
	wp_enqueue_style( 'default-theme-style-ie7', get_stylesheet_directory_uri() . "/css/ie7.css", array( 'default-theme-style' ), '2013');
	$wp_styles->add_data( 'default-theme-style-ie7', 'conditional', 'IE 7' );
	
	/**
     * Load our IE specific stylesheet for a range of older versions:
     * <!--[if lt IE 9]> ... <![endif]-->
     * <!--[if lte IE 8]> ... <![endif]-->
     * NOTE: You can use the 'less than' or the 'less than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style( 'default-theme-style-old-ie', get_stylesheet_directory_uri() . "/css/old-ie.css", array( 'default-theme-style' ), '2013');
    $wp_styles->add_data( 'default-theme-style-old-ie', 'conditional', 'lt IE 9' );
    
    /**
     * Load our IE specific stylesheet for a range of newer versions:
     * <!--[if gt IE 8]> ... <![endif]-->
     * <!--[if gte IE 9]> ... <![endif]-->
     * NOTE: You can use the 'greater than' or the 'greater than or equal to' syntax here interchangeably.
     */
    wp_enqueue_style( 'default-theme-style-new-ie', get_stylesheet_directory_uri() . "/css/new-ie.css", array( 'default-theme-style' ), '2013');
    $wp_styles->add_data( 'default-theme-style-new-ie', 'conditional', 'gt IE 8' );
	
}
add_action( 'wp_enqueue_scripts', 'default_theme_styles' );






/********** Register themes javascript ***********/

add_action( 'wp_enqueue_scripts', 'load_javascript_files' );
function load_javascript_files(){
	 //wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), false );
	 wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false );	
	
	
	//wp_register_script( 'modernizr-min', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', array('jquery'), false );
	//wp_register_script( 'rwd', get_template_directory_uri() . '/js/rwd-display.js', array('jquery'), false );
	
	
	//wp_enqueue_script( 'modernizr-min' );
	//wp_enqueue_script( 'rwd' );

	
	
	// use wp native jquery library
	
	wp_enqueue_script( 'jquery' ); // use wp native jquery
	wp_enqueue_script( 'jquery-ui-core' ); // use wp native jquery UI
	//wp_enqueue_script( 'jquery-ui-accordion' ); // use wp native jquery jquery-ui-accordion
	//wp_enqueue_script( 'jquery-ui-tabs' ); // use wp native jquery jquery-ui-tabs
	//wp_enqueue_script( 'jquery-ui-tooltips' ); // use wp native jquery jquery-ui-tabs
	
	wp_enqueue_script( 'thickbox' ); // use wp native jquery thickbox

	
	// ----------- Enable as your theme demands --------------// 
	// -------------------------------------------------------//
	
		
		 wp_enqueue_script( 'custom' );
}





/********** Custom Images ***********/

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
	//set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions 
	add_theme_support( 'automatic-feed-links' );
}
if ( function_exists( 'add_image_size' ) ) { 
	//Set the image size by resizing the image proportionally (that is, without distorting it): 
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	
	//Set the default Post Thumnail size by resizing the image proportionally (that is, without distorting it): 
	//set_post_thumbnail_size( 50, 50 ); // 50 pixels wide by 50 pixels tall, resize mode
	
	//Set the image size by cropping the image (either from the sides, or from the top and bottom)
	//(220 pixels wide by 180 pixels tall, hard crop modecropped)
	//add_image_size( 'homepage-thumb', 220, 180, true ); 
	
	
	add_image_size( 'homepage-thumb', 420, 280, true ); 
	
}

//add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
    $addsizes = array(
         "category-thumb" => __( "Category Thumb",''),
         "homepage-thumb" => __( "Homepage-Thumb", '')
         // Add more
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}



/********** Force Perfect JPG Images ***********/

add_filter( 'jpeg_quality', 'smashing_jpeg_quality' );
function smashing_jpeg_quality() {
	return 100;
}













/********** Allow SVG through WordPress Media Uploader ***********/

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );





/********** Custom editor stylesheet ***********/

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );





/********** Remove WP default sizes ***********/

function sgr_filter_image_sizes( $sizes) {
		
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'sgr_filter_image_sizes');





/*********** Add class to links generated by next_posts_link and previous_posts_link ***********/

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="styled-button"';
}





/*********** Displays navigation to next/previous pages when applicable. INDEX page ***********/

if ( ! function_exists( 'defaulttheme_content_nav' ) ) :

function defaulttheme_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );
	
	
	// Styled hired from twitter bootstrap
	
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul id="<?php echo $html_id; ?>" class="pager" role="navigation">
			<h3 class="assistive-text"><?//php _e( 'Post Pagination', THEMENAME ); ?></h3>
			
			<li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', THEMENAME ) ); ?></li>
			<li class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', THEMENAME ) ); ?></li>
		</ul><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;



/*********** Displays navigation to next/previous pages when applicable. in SINGLE page***********/

if ( ! function_exists( 'content_nav' ) ) :

function content_nav() {?>
		
		<div class="row-fluid">
			<ul class="pager">
				<li class="previous">
					<?php previous_post_link('%link', 'Previous post');?> 
				</li>
				
				<li class="next">				
					<?php next_post_link('%link', 'Next post'); ?>
				</li>
			</ul>
		</div>
		
	<?php
}
endif;



/********** Register Custom Menus ***********/

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'Primary' => __( 'Primary Menu', THEMENAME),
			'Secondary' => __( 'User Meta Menu', THEMENAME),
			'Third' => __( 'Footer Menu', THEMENAME)
		)
	);
}




/********** Create Default home page while theme initiates ***********/


// Create Home page
$name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name='Home'");
if ($name != '') {
	//
} else { 
	global $user_ID;
	$post = array();
	$post['post_type']    = 'page'; //could be 'post' for example
	$post['post_content'] = esc_attr('hello world!!');
	$post['post_author']  = null;
	$post['post_status']  = 'publish'; //draft
	$post['post_title']   = 'Home';
	$postid = wp_insert_post ($post);
	if ($postid == 0)
	    echo 'Screwed';
	else
	    echo 'Cool';
} 

// Use a static front page
/*
$home = get_page_by_title( 'Home' );
update_option( 'page_on_front', $home->ID );
update_option( 'show_on_front', 'page' );
*/




/********** Register sidebar(s) ***********/

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	
		/*General Sidebar*/
		$general_sidebar=array(
			'id' => 'general_sidebar',
			'name' => __( 'Popular Posts' , THEMENAME),
			'description' => __( 'Drag and drop the popular posts widget here' , THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="popular-posts-title">',
			'after_title' => '</h2>'
		);
		
		/*Footer sidebar */
		$f_sidebar_one=array(
			'id' => 'f_sidebar_one',
			'name' => __( 'Footer Sidebar One', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="about-us widget-title">',
			'after_title' => '</h5>'
		);
		
		/*Footer sidebar */
		$f_sidebar_two=array(
			'id' => 'f_sidebar_two',
			'name' => __( 'Footer Sidebar Two', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying contact details in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="connect widget-title">',
			'after_title' => '</h5>'
		);
		
		/*Footer sidebar */
		$f_sidebar_three=array(
			'id' => 'f_sidebar_three',
			'name' => __( 'Footer Sidebar Three', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying widgets in footer.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="mailchimp-email widget-title">',
			'after_title' => '</h5>'
		);
		
		
		/*User profile sidebar */
		$user_sidebar_one=array(
			'id' => 'user_sidebar_one',
			'name' => __( 'User profile Sidebar', THEMENAME),
			'description' => __( 'This sidebar is designed for displaying User profile related widgets when they are logged in.', THEMENAME),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="loggedin-user-profile widget-title">',
			'after_title' => '</h2>'
		);
		

		
		

		
		/* Register the sidebars. */
		register_sidebar( $general_sidebar );
		register_sidebar( $f_sidebar_one );
		//register_sidebar( $f_sidebar_two );
		register_sidebar( $f_sidebar_three );
		register_sidebar( $user_sidebar_one );
}





/********** Register WP thickbox ***********/

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	
	// favicon
	wp_register_script('btn-one', get_template_directory_uri(). '/js/btn-one.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('btn-one');
	
	//logo
	wp_register_script('btn-two', get_template_directory_uri(). '/js/btn-two.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('btn-two');
	
	//dashboard admin logo
	wp_register_script('btn-three', get_template_directory_uri(). '/js/btn-three.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('btn-three');
	
	//login logo & background image
	wp_register_script('btn-four', get_template_directory_uri(). '/js/btn-four.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('btn-four');
	wp_register_script('btn-five', get_template_directory_uri(). '/js/btn-five.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('btn-five');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) == 'theme_option') {
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
}





/********** change upload label ***********/

add_filter("attribute_escape", "myfunction", 10, 2);
function myfunction($safe_text, $text) {
    return str_replace(__('Insert into Post', THEMENAME), __('Use this image', THEMENAME), $text);
}





/********** Set excerpt link ***********/

function new_excerpt_more($more) {
	global $post;
	return ' <br/><a class="btn btn-info" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/********** Set excerpt length***********/

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );





/********** Remove editor ***********/

function wpr_remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
global $remove_submenu_page, $current_user;
get_currentuserinfo();
if($current_user->user_login == 'admin') { //Specify admin name here
    add_action('admin_menu', 'wpr_remove_editor_menu', 1);
}



/********** Hide ACF menu item from the admin menu ***********/
 
function hide_admin_menu()
{
	global $current_user;
	get_currentuserinfo();
 
	if($current_user->user_login != 'zakiruk')
	{
		echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
	}
}
//add_action('admin_head', 'hide_admin_menu');



/********** Favicon ***********/
add_action( 'wp_head', 'ilc_favicon');
function ilc_favicon(){
    if(get_option('favicon_1')):
    echo "<link rel='shortcut icon' href='" . get_option('favicon_1') . "' />" . "\n";
    else:
    echo "<link rel='shortcut icon' href='#' />" . "\n";
    endif;
}



/********** Color Picker ***********/

add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );
function wp_enqueue_color_picker( ) {
    
     //Access the global $wp_version variable to see which version of WordPress is installed.
    global $wp_version;
    
    //If the WordPress version is greater than or equal to 3.5, then load the new WordPress color picker.
    if ( 3.5 <= $wp_version ){
    	//Both the necessary css and javascript have been registered already by WordPress, so all we have to do is load them with their handle.
    	wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'wp-color-picker' );
    }else{
        //As with wp-color-picker the necessary css and javascript have been registered already by WordPress, so all we have to do is load them with their handle.
    	wp_enqueue_style( 'farbtastic' );
        wp_enqueue_script( 'farbtastic' );
    }
    //Load our custom javascript file
    wp_enqueue_script( 'wp-color-picker-script', get_template_directory_uri() . '/js/colorpicker.js', array( 'wp-color-picker' ), false, true ); 
}





/********** Remove some Plugins From Plugin Screen ***********/
// It will allow to install the plugin and once it is activated it will be removed from the plugin screen so it can not be deactivated. The plugin will still be active and can be used as normal but it means that users can not deactivate these plugins.

//add_filter( 'all_plugins', 'hide_plugins');
function hide_plugins($plugins)
{
	// Hide ACF plugin
	if(is_plugin_active('advanced-custom-fields/acf.php')) {
		unset( $plugins['advanced-custom-fields/acf.php'] );
	}
	// Hide other plugins as you think it necessary
	
	
	
	return $plugins;
}




/**
 * Change the post type labels
 */
function change_post_type_labels() {
  global $wp_post_types;
  // Get the post labels
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Articles';
  $labels->singular_name = 'Articles';
  $labels->add_new = 'Add Articles';
  $labels->add_new_item = 'Add Articles';
  $labels->edit_item = 'Edit Articles';
  $labels->new_item = 'Articles';
  $labels->view_item = 'View Articles';
  $labels->search_items = 'Search Articles';
  $labels->not_found = 'No Articles found';
  $labels->not_found_in_trash = 'No Articles found in Trash';
}
add_action( 'init', 'change_post_type_labels' );


/**
 * Change the post menu to article
 */
function change_post_menu_text() {
  global $menu;
  global $submenu;
  // Change menu item
  $menu[5][0] = 'Articles';
  // Change post submenu
  $submenu['edit.php'][5][0] = 'Articles';
  $submenu['edit.php'][10][0] = 'Add Articles';
  $submenu['edit.php'][16][0] = 'Articles Tags';
}
add_action( 'admin_menu', 'change_post_menu_text' );



// unregister all widgets
 function remove_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Search');
     unregister_widget('WP_Widget_Text');
     unregister_widget('WP_Widget_Categories');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('WP_Nav_Menu_Widget');
 }
// add_action('widgets_init', 'remove_default_widgets', 11);




//Add Missing Alt Tags To WordPress Images
function add_alt_tags($content)
{
        global $post;
        preg_match_all('/<img (.*?)\/>/', $content, $images);
        if(!is_null($images))
        {
                foreach($images[1] as $index => $value)
                {
                        if(!preg_match('/alt=/', $value))
                        {
                                $new_img = str_replace('<img', '<img alt="'.$post->post_title.'"', $images[0][$index]);
                                $content = str_replace($images[0][$index], $new_img, $content);
                        }
                }
        }
        return $content;
}
add_filter('the_content', 'add_alt_tags', 99999);




/********** Remove yim, aim and jabber field and add fb and twitter to User Profiles ***********/

add_filter('user_contactmethods', 'user_contactmethods');  
function user_contactmethods($user_contactmethods){  
  
  unset($user_contactmethods['yim']);  
  unset($user_contactmethods['aim']);  
  unset($user_contactmethods['jabber']);  
  
  $user_contactmethods['twitter'] = 'Twitter Username';  
  $user_contactmethods['facebook'] = 'Facebook Username';  
  
  return $user_contactmethods;  
}  




/********** Icons for your Custom Post Types in the Admin Menu ***********/


function add_menu_icons_styles(){
?>
<!-- http://melchoyce.github.io/dashicons/ -->
<style>
/*Custom post type Events*/
#adminmenu .menu-icon-events div.wp-menu-image:before {
content: '\f145';
}

/*Custom post type News*/
#adminmenu .menu-icon-news div.wp-menu-image:before {
content: "\f163";
}

</style>
 
<?php
}
//add_action( 'admin_head', 'add_menu_icons_styles' );





/********** Comments ***********/

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <?php if($comment->user_id>0) { ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-authorby vcard">
         <div class="avatar">
         	<?php echo get_avatar( $comment->comment_author_email, 52 ); ?>
		 </div>
         
      </div> <!-- End comment-author -->
      
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', THEMENAME) ?></em>
         <br />
      <?php endif; ?>
		
					
      <div class="comment-metaby commentmetadata"><?php edit_comment_link(__('(Edit)', THEMENAME),'  ','') ?></div>
	<div class="comment-databy">
	
		<div class="authornameby">
         <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
         <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', THEMENAME), comment_date('F j, Y \a\t g:i a')) ?></a>
         </div>	
      <?php comment_text() ?>
	
     </div> <!-- End comment-data -->
     
     <div class="replyby">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>

    <div class="clear"></div>
     </div>
     
     
     <?php } else { ?>
     
     
     <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <div class="avatar">
         	<?php echo get_avatar( $comment->comment_author_email, 52 ); ?>
		 </div>
         
      </div> <!-- End comment-author -->
      
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', THEMENAME) ?></em>
         <br />
      <?php endif; ?>
		
					
      <div class="comment-meta commentmetadata"><?php edit_comment_link(__('(Edit)', THEMENAME),'  ','') ?></div>
	<div class="comment-data">
	
		<div class="authorname">
         <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
         <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', THEMENAME), comment_date('F j, Y \a\t g:i a')) ?></a>
         </div>	
      <?php comment_text() ?>
    </div> <!-- End comment-data -->
    
    <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     </div>
    
    <div class="clear"></div>
     </div>

     <?php }}

function dox_get_submit_auto_page() {
	global $dox_options;
	return get_permalink( 'Add Post' );
}

function detect_iphone_ipad() {  
    if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone')){?>    
    <meta name="viewport" content="width = 320, initial-scale=0.2, maximum-scale=1, user-scalable=yes">     
    <?php return true; }
    
    if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad'))?>    
    <meta name="viewport" content="initial-scale=0.6, maximum-scale=1, user-scalable=yes">     
    <?php return true;
}  
//add_action('wp_head','detect_iphone_ipad');


// Create Your Own WordPress Login Page
// Reference: http://www.paulund.co.uk/create-your-own-wordpress-login-page

// if wrong login details were provided
add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login

function pu_login_failed( $user ) {
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	// check that were not on the default login page
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
		// make sure we don't already have a failed login attempt
		if ( !strstr($referrer, '?login=failed' )) {
			// Redirect to the login page and append a querystring of login failed
	    	wp_redirect( $referrer . '?login=failed');
	    } else {
	      	wp_redirect( $referrer );
	    }

	    exit;
	}
}


// if Empty Username And Password are given
add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	$error = false;

  	if($_POST['log'] == '' || $_POST['pwd'] == '')
  	{
  		$error = true;
  	}

  	// check that were not on the default login page
  	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

  		// make sure we don't already have a failed login attempt
    	if ( !strstr($referrer, '?login=failed') ) {
    		// Redirect to the login page and append a querystring of login failed
        	wp_redirect( $referrer . '?login=failed' );
      	} else {
        	wp_redirect( $referrer );
      	}

    exit;

  	}
}
// Redefine user notification function
if ( !function_exists('wp_new_user_notify') ) {

	function wp_new_user_notify( $user_id, $plaintext_pass = '' ) {

		$user = new WP_User( $user_id );

		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );

		$message  = sprintf( __('New user registration on %s:'), get_option('blogname') ) . "\r\n\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n\r\n";
		$message .= sprintf( __('E-mail: %s'), $user_email ) . "\r\n";

		@wp_mail(
			get_option('admin_email'),
			sprintf(__('[%s] New User Registration'), get_option('blogname') ),
			$message
		);

		if ( empty( $plaintext_pass ) )
			return;
		
		
		$message  = __('Hi there,') . "\r\n\r\n";
		$message .= sprintf( __("Welcome to %s! Here's how to log in:"), get_option('blogname')) . "\r\n\r\n";
		$message .= sprintf( __('Please visit http://rivals.gg/ and then click on Register/Sign In')) . "\r\n";
		$message .= sprintf( __('Enter following details in Sign In form')) . "\r\n";
		$message .= sprintf( __('Username: %s'), $user_login ) . "\r\n";
		$message .= sprintf( __('Password: %s'), $plaintext_pass ) . "\r\n\r\n";
		$message .= sprintf( __('If you have any problems, please contact me at %s.'), get_option('admin_email') ) . "\r\n\r\n";
		$message .= sprintf(__('Thank You')). "\r\n\r\n";
		$message .= sprintf(__('Sincerely,')). "\r\n";
		$message .= sprintf(__('Team RIVALS')). "\r\n";
		
		$headers = 'From: Rivals <info@rivals.gg>' . "\r\n";

		wp_mail(
			$user_email,
			sprintf( __('[%s] Your username and password'), get_option('blogname') ),
			$message,
			$headers
		);
	}
}
//filter the <p> tags from the images and iFrame
function filter_ptags_on_images($content)
{
$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
?>