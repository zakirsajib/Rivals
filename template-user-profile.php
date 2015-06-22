<?php 
/*
Template Name: User Profile
*/
?>
<?php get_header(); ?>

<?php 
	if(!function_exists('get_user_to_edit')){
		require_once(ABSPATH.'/wp-admin/includes/user.php');
	}
 ?>

<div class="user-profile-container row-fluid">
		<div class="container">
			

			<!-- if-not-user-logged-in
				Scenario: for example if they just type the user profile url
				in this case they will not see this page, they would see sign in and registration page
			-->
			
			<?php	$current_user = wp_get_current_user();
					$user_id = empty($current_user->ID) ? null : $current_user->ID;
					if ( empty($user_id) ) {
						get_template_part('regloginform');
					}
			?><!-- end - if-not-user-logged-in -->
			
			
			
							
				
		<!-- if-user-is-logged -->
		<?php if (!empty($user_id)):?>
				
			<?php if (have_posts()) : ?>
			
				<div class="span3 left-sidebar">				
					<!-- <h3 class="user-settings">Settings</h3> -->
				</div>

				
							
			<?php while (have_posts()) : the_post(); ?>
				
				<div class="span9">
					<!-- .post -->
					<div <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>">
				
				<?php
					$alert_display = 'none';
					
					global $userdata, $wp_http_referer;

					if ( !isset( $_POST['submit'] ) ) {
						
						$profileuser = get_user_to_edit($user_id);
						
					} else {
						
						ob_start();
						
						check_admin_referer('update-user_' . $user_id);
						
						$errors = edit_user( $user_id );
						
						if ( is_wp_error( $errors ) ) {
							$alert_message = $errors->get_error_message();
							$alert_type = 'alert-error';
							$alert_display = 'block';
						} else {
							$alert_message = __('Your profile has been updated successfully.',THEMENAME);
							$alert_type = 'alert-success';
							$alert_display = 'block';
							do_action( 'personal_options_update', $user_id );
						}
						ob_end_clean();
						$profileuser = get_user_to_edit($user_id);
						
					}

				?>				
				
					<h1 class="section-title"><?php _e('Profile', THEMENAME) ?></h1>
					
					<!-- .step-form -->
					<div class="step-form">

						<!-- .step-alert -->
						<div class="update-notice alert <?php echo $alert_type; ?>" style="display:<?php echo $alert_display; ?>">
							<div class="text-warning"><?php echo $alert_message; ?></div>
						</div><!-- end .step-alert -->
					
						<!-- .step-form-wrap -->
						<div class="step-form-wrap">

							<form id="your-profile" action="<?php echo get_permalink(); ?>" method="post"<?php do_action('user_edit_form_tag'); ?>>
								<?php wp_nonce_field('update-user_' . $user_id) ?>
								
								<?php if ( $wp_http_referer ) : ?>
									<input type="hidden" name="wp_http_referer" value="<?php echo esc_url( $wp_http_referer ); ?>" />
								<?php endif; ?>	
								
								<input type="hidden" name="from" value="profile" />
								<input type="hidden" name="checkuser_id" value="<?php echo $user_id ?>" />
								
								<?php do_action( 'personal_options', $profileuser ); ?>
								<?php do_action( 'profile_personal_options', $profileuser ); ?>
			
								
								<div class="form-input clearfix">
									<label class="sub-title"><?php _e('User Name') ?></label>
									<input type="text" name="user_login" class="span6" id="user_login" value="<?php echo esc_attr($profileuser->user_login); ?>" disabled="disabled" /><br><span class="muted"><?php _e('Usernames cannot be changed.'); ?></span>
								</div>
																
								<div class="form-input form-input-50">
									<label for="first_name" class="sub-title"><?php _e('First Name') ?></label>
									<input type="text" name="first_name" class="span6" id="first_name" value="<?php echo esc_attr($profileuser->first_name) ?>" />
								</div>

								<div class="form-input form-input-50 clearfix">
									<label for="last_name" class="sub-title"><?php _e('Last Name') ?></label>
									<input type="text" name="last_name" class="span6" id="last_name" value="<?php echo esc_attr($profileuser->last_name) ?>" />
								</div>

								<div class="form-input form-input-50 clearfix">
									<label for="nickname" class="sub-title"><?php _e('Nickname'); ?> <span class="description"><?php _e('(required)'); ?></span></label>
									<input type="text" name="nickname" class="span6" id="nickname" value="<?php echo esc_attr($profileuser->nickname) ?>" />
								</div>

								<div class="form-input form-input-50 clearfix">
									<label for="display_name" class="sub-title"><?php _e('Display name publicly as') ?></label>
									<select name="display_name" id="display_name">
									<?php
										$public_display = array();
										$public_display['display_nickname']  = $profileuser->nickname;
										$public_display['display_username']  = $profileuser->user_login;

										if ( !empty($profileuser->first_name) )
											$public_display['display_firstname'] = $profileuser->first_name;

										if ( !empty($profileuser->last_name) )
											$public_display['display_lastname'] = $profileuser->last_name;

										if ( !empty($profileuser->first_name) && !empty($profileuser->last_name) ) {
											$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
											$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
										}

										if ( !in_array( $profileuser->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
											$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

										$public_display = array_map( 'trim', $public_display );
										$public_display = array_unique( $public_display );

										foreach ( $public_display as $id => $item ) {
									?>
										<option id="<?php echo $id; ?>"<?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
									<?php } ?>
									</select>
									<div class="clearfix"></div>
								</div>
								
								<div class="clearfix"></div>
								<div class="form-input marginT20 clearfix">
									<label for="email" class="sub-title"><?php _e('E-mail'); ?> <span class="description"><?php _e('(required)'); ?></span></label>
									<input type="text" name="email" class="span6" value="<?php echo esc_attr($profileuser->user_email) ?>" size="30" />
								</div>	

								<div class="form-input clearfix">
									<label for="url" class="sub-title"><?php _e('Website') ?></label>
									<input type="text" name="url" class="span6" value="<?php echo esc_attr($profileuser->user_url) ?>" size="30" />
								</div>							

								<div class="clearfix"></div>
								<div class="form-input marginT20 clearfix">
									<label for="description" class="sub-title"><?php _e('Biographical Info'); ?></label>
									<textarea name="description" id="description" class="span6"><?php echo $profileuser->description; // textarea_escaped ?></textarea><br><span class="muted"><?php _e('Share a little biographical information to fill out your profile. This may be shown publicly.'); ?></span>
								</div>	

								<?php
									$show_password_fields = apply_filters('show_password_fields', true, $profileuser);
									if ( $show_password_fields ) :
								?>
									<div class="form-input clearfix">
										<label for="pass1" class="sub-title"><?php _e('New Password'); ?></label>
										<input type="password" name="pass1" class="span6" id="pass1" size="16" value="" autocomplete="off" placeholder="Minimum of 8 characters"/><br><span class="muted"><?php _e("If you would like to change the password type a new one. Otherwise leave this blank."); ?></span>
									</div>
									<div class="form-input clearfix">
										<label for="pass2" class="sub-title"><?php _e('Confirm Password'); ?></label>
										<input type="password" name="pass2" class="span6" id="pass2" size="16" value="" autocomplete="off" /><br><span class="muted"><?php _e("Type your new password again."); ?></span>
									</div>
								<?php endif; ?>		

								<?php do_action( 'show_user_profile', $profileuser ); ?>
								
								
								
								<div class="clearfix"></div>
								
								<div class="form-input clearfix">
									 <input type="hidden" name="action" value="update" />
									<input name="user_id" id="user_id" value="1" type="hidden">
									<input name="submit" id="submit" class="profile-submit" value="<?php echo __('Update Profile') ?>" type="submit">
								</div>							
									
							</form>
							
							<script type="text/javascript" charset="utf-8">
								if (window.location.hash == '#password') {
									document.getElementById('pass1').focus();
								}
							</script>
							
						</div><!-- .step-form-wrap -->
					</div><!-- end - .step-form -->				
			</div><!-- end - .post -->
			</div>				
			<?php endwhile; endif; ?>	
		
	<?php endif; ?><!-- end-if-user-is-logged -->
		
	
</div>
</div>			
<?php get_footer(); ?>