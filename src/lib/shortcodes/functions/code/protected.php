<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS PROTECTED CONTENT
/*
/* protect : Class for hidden content
/*
/*  Usage:
/* [protected]$text[/protected]
/*
/*
-------------------------------------------------------------- */

/* btnIcon
-------------------------------------------------------------- */
add_shortcode('protected','storelicious_protected');
function storelicious_protected($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'loginform' => 'no'
		), $atts));

	if ( is_user_logged_in() ) {
		$content = storelicious_clean_html($content);	
		$content = do_shortcode($content);
		$output = $content;
	} else {
		
		 if( get_option('users_can_register') ){
	 $registration = "<p class='st-registration'>".__('Not a member?','storelicious')." <a href='".site_url('wp-login.php?action=register', 'login_post')."'>".__('Register now','storelicious')."!</a></p>";
	 
 }

		if($loginform == "yes") {
			
		$output = "<div class='st-protected'>
					<div class='st-protected-form'>
					<form action='" . get_option('home') . "/wp-login.php' method='post'>
						<p><label>".__('Username','storelicious').": <input type='text' name='log' id='log' value='" . wp_specialchars(stripslashes($user_login), 1) . "' size='20' /></label></p>
						<p><label>".__('Password','storelicious').": <input type='password' name='pwd' id='pwd' size='20' /></label></p>
						<input type='submit' name='submit' value='".__('Login','storelicious')."' class='login-button' />
					</form> 
					</div> 
					
				".$registration."
				</div> ";
		} else {
			$output = '';
		}
		
		
	}
				
	return $output;
}


		include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/protected.php');

?>