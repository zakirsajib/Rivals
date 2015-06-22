<?php 	
		global $current_user, $dox_options, $err, $success;
				
		$user_logged = false;
		if ( is_user_logged_in() ) { 
			$user_logged = true;
			$author_url = get_author_posts_url( $current_user->ID );
		}
 ?>

<div class="row-fluid">
						
		<!-- IF USER IS LOGGED -->
		<?php if ($user_logged == true) { ?>
							
				<!-- .account-nav -->
				<div class="span6 account-nav">
					<h1 class="panel-title"><?php _e('MY ACCOUNT', THEMENAME) ?></h1>
					<ul>
						<li><a href="<?php bloginfo('url')?>/add-post">Add Post</a></li>
						<li><a href="<?php bloginfo('url')?>/my-all-posts">My All Posts</a></li>
						<li><?php echo '<a href="'.$author_url.'">'.__('My Published posts',THEMENAME).'</a>'; ?></li>
					</ul>					
				</div><!-- end- .account-nav -->	
				
				<!-- .user-profile -->
				<div class="span6 user-profile">
					<h1 class="panel-title"><?php _e('User Profile', THEMENAME) ?></h1>
					<ul>
						<li><a href="<?php bloginfo('url')?>/my-profile">My Profile</a></li>									
						<li><?php echo '<a href="'.wp_logout_url(home_url()).'">'.__('Log Out',THEMENAME).'</a>'; ?></li>
					</ul>	
				</div><!-- end- .user-profile -->			
								
				
				
		<!-- IF NOT USER IS LOGGED -->
		<?php } else {  ?>
				
				
				<!-- .user-login -->
				<div class="span6 user-login">
					
					<div class="sign-alert alert" style="display:none"></div>
					
					
					<h1 class="panel-title"><?php _e('Sign In', THEMENAME) ?></h1>
					
					<?php 
					$args= array(
						'redirect'       => site_url('/user-profile'), 
						'label_username' => __( 'USERNAME' ),
						'label_password' => __( 'PASSWORD' ),
						'label_log_in'   => __( 'SIGN IN' ),
						'label_remember' => __( 'REMEMBER ME' ),
						'value_remember' => true
					);
					
					
					wp_login_form( $args ); ?>
					
					<div class="forgot-pass">
					<a href="<?php bloginfo('url')?>/reset-password" title="Lost Password">I Forgot My Password</a>
					</div>
					
				</div><!-- end- .user-login -->

				<!-- .register -->
			<div class="span6 register">
				<div class="reg-alert alert" style="display:none"></div>
				<h1 class="panel-title"><?php _e('Join Rivals', THEMENAME) ?></h1>
				<div class="join-msg">
				CREATE AN ACCOUNT TO STAY CONNECTED, GET ACCESS TO OUR COMMUNITY FORUMS, COMMENT ON OUR POSTS AND MORE</div>
										
			<?php
			$err = '';
			$success = '';
			 
			global $wpdb, $PasswordHash, $current_user, $user_ID;
			 
			//if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
			
			if(isset($_POST['register']) || wp_verify_nonce( $_POST['register'], 'task' ) ) {
			 
			$username = $wpdb->escape(trim($_POST['user_reg_login']));
			$email = $wpdb->escape(trim($_POST['user_reg_email']));
			//$pwd1 = $wpdb->escape(trim($_POST['pwd1']));
			//$pwd2 = $wpdb->escape(trim($_POST['pwd2']));
			
			
			//if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "") {
			if( $email == "" || $username == "") {
			$err = 'Please don\'t leave the required fields.';
			} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$err = 'Invalid email address.';
			} else if(email_exists($email) ) {
				$err = 'Email already exist.';
			//} else if($pwd1 <> $pwd2 ){
			//$err = 'Password do not match.';	
			} else {
			
			$pwd1 = wp_generate_password();
			
			$user_id = wp_insert_user( array ('user_pass' => apply_filters('pre_user_user_pass', $pwd1), 
			
			'user_login' => apply_filters('pre_user_user_login', $username), 
			'user_email' => apply_filters('pre_user_user_email', $email), 
			'role' => 'subscriber' ) );
				if( is_wp_error($user_id) ) {
					$err = 'Error on user creation.';
				} else {
					wp_new_user_notify($user_id, $pwd1);
					do_action('user_register', $user_id);
					$success = 'Please check your email. Thank you.';
				}
			}
		}?>
 
<!--display error/success message-->
<div id="message">
	<?php
		if(! empty($err) ) :
		echo '<div class="container"><div class="alert alert-error reg-opt">'.$err.'</div></div>';
		endif;
	?>
	<?php
		if(! empty($success) ) :
		echo '<div class="container"><div class="alert alert-info reg-opt">'.$success.'</div></div>';
		endif;
	?>
</div>
 
<form id="reg-submit-form" method="post">
	
	<label for="user_reg_login"><?php _e('USERNAME / ALIAS', THEMENAME); ?></label>
	<input type="text" name="user_reg_login" id="user_reg_login"/>
	
	<label for="user_reg_email"><?php _e('EMAIL', THEMENAME); ?></label>
	<input type="email" name="user_reg_email" id="user_reg_email"/>
	
	<div class="join-terms">BY CREATING AN ACCOUNT, I AGREE THAT I HAVE READ AND ACCEPT YOUR PRIVACY POLICY AND TERMS OF USE.</div>
	
	
		
	
	<?php wp_nonce_field('task','register', true, true ); ?>
	<input type="submit" name="reg-submit" value="<?php _e('CREATE AN ACCOUNT', THEMENAME); ?>" id="reg-submit" tabindex="103" />
	<!-- <input type="hidden" name="task" value="register" /> -->
</form>
										
				</div><!-- end- .register -->	
				
		<?php } ?>
		<!-- END - USER IS LOGGED -->
		
	
<div class="clearfix"></div>
<?php 	if ($user_logged == false) {
			$register = isset($_GET['register']); 
			if($register == true) {
				echo '<div class="alert alert-success"><p>';
					_e('Thank you for sign up. <br/>Please check your email for the password!', THEMENAME);
				echo '</p></div>';			
			}
?>

</div> <!-- end row-fluid -->


<script type="text/javascript">

	var $j = jQuery.noConflict();
	
	$j(document).ready(function(){			

		// register submit button
		$j('#reg-submit-form').submit(function () {
			
			if ( $j('#reg-submit-form #user_reg_login').val() == '' || $j('#reg-submit-form #user_reg_email').val() == '')
			{
				$j(".reg-alert").removeClass('alert-success alert-error alert-warning');
				$j(".reg-alert").addClass('alert-warning');
				
				$j(".reg-alert").empty();
				$j(".reg-alert").append('<?php _e('Please enter username and e-mail.',THEMENAME) ?>');
				
				$j('.reg-alert').css('display','block');
				$j('.reg-alert').delay(4000).slideUp(350); 	
							
				return false;
			}
			
		});	

		// login submit button
		$j('#loginform').submit(function () {
			
			if ( $j('#loginform #user_login').val() == '' || $j('#loginform #user_pass').val() == '' )
			{
				$j(".sign-alert").removeClass('alert-success alert-error alert-warning');
				$j(".sign-alert").addClass('alert-warning');
				
				$j(".sign-alert").empty();
				$j(".sign-alert").append('<?php _e('Please enter your username and password',THEMENAME) ?>');
				
				$j('.sign-alert').css('display','block');
				$j('.sign-alert').delay(4000).slideUp(350); 	
							
				return false;
			}
			
		});		
		
	});						  
</script>
<?php } ?>
