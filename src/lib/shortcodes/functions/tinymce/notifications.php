<?php

	class add_storelicious_notifications_button {
	
		var $pluginname = "storelicious_notifications";
		
		function add_storelicious_notifications_button()  {
			add_filter('tiny_mce_version', array(&$this, 'change_tinymce_version') );
			add_action('init', array (&$this, 'addStNotifications') );
			
		}
	
		function addStNotifications() {
			if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
			
			if ( get_user_option('rich_editing') == 'true') {
				add_filter("mce_external_plugins", array(&$this, "add_storelicious_notifications_plugin" ), 3);
				add_filter('mce_buttons_2', array(&$this, 'register_storelicious_notifications_button' ), 3);
				
			}
		}
		
		function register_storelicious_notifications_button($buttons) {
			array_push($buttons, "", $this->pluginname );
			return $buttons;
			
		}
		
		function add_storelicious_notifications_plugin($plugin_array) {    
			$plugin_array[$this->pluginname] =  get_bloginfo('template_url').'/lib/shortcodes/functions/editor.js';
			return $plugin_array;
			
		}
		
		function change_tinymce_version($version) {
			return ++$version;
		}
		
	}

	// Call it now
	$tinymce_button = new add_storelicious_notifications_button ();


?>
