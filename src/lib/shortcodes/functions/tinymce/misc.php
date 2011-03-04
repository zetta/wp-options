<?php

class st_misc_buttons {
	
	var $pluginname = "storelicious_misc";
	
	function st_misc_buttons(){
		if(is_admin()){
			if ( current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
			{
				//add_filter('tiny_mce_version', array(&$this, 'st_tiny_mce_version'));
				add_filter("mce_external_plugins", array(&$this, "st_mce_external_plugins"));
				add_filter('mce_buttons_2', array(&$this, 'st_mce_buttons'));
			}
		}
	}
	function st_mce_buttons($buttons) {
		array_push($buttons, "separator", "storelicious_alert", "storelicious_note", "storelicious_info", "storelicious_help", "separator", "storelicious_success", "storelicious_error", "separator", "storelicious_down", "storelicious_up", "separator", "storelicious_send_twitter","separator", "storelicious_author" );
		return $buttons;
	}
	function st_mce_external_plugins($plugin_array) {
			$plugin_array[$this->pluginname] =  get_bloginfo('template_url').'/lib/shortcodes/functions/editor.js';
		return $plugin_array;
	}
	function st_tiny_mce_version($version) {
		return ++$version;
	}
}

add_action('init', 'st_misc_buttons');
function st_misc_buttons(){
	global $st_misc_buttons;
	$st_misc_buttons = new st_misc_buttons();
}
///////////////////////////


	
