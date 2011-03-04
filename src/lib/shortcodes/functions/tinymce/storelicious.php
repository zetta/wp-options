<?php

class st_split_buttons {
	
	var $pluginname = "storelicious_split";
	
	function st_split_buttons(){
		if(is_admin()){
			if ( current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
			{
				//add_filter('tiny_mce_version', array(&$this, 'split_tiny_mce_version'));
				add_filter("mce_external_plugins", array(&$this, "split_mce_external_plugins"));
				add_filter('mce_buttons', array(&$this, 'split_mce_buttons'));
			}
		}
	}
	function split_mce_buttons($buttons) {
		array_push($buttons,  "separator", "storelicious_button","separator" );
		return $buttons;
	}
	function split_mce_external_plugins($plugin_array) {
			$plugin_array[$this->pluginname] =  get_bloginfo('template_url').'/lib/shortcodes/functions/editor.js';
		return $plugin_array;
	}
	function split_tiny_mce_version($version) {
		return ++$version;
	}
}
add_action('init', 'st_split_buttons');
function st_split_buttons(){
	global $st_test_buttons;
	$st_test_buttons = new st_split_buttons();
}


