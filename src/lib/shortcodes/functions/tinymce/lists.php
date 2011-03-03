<?php

	class add_storelicious_list_button {
	
		var $pluginname = "storelicious_lists";
		
		function add_storelicious_list_button()  {
			add_filter('tiny_mce_version', array(&$this, 'change_tinymce_version') );
			add_action('init', array (&$this, 'addStLists') );
			
		}
	
		function addStLists() {
		
			if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
			if ( get_user_option('rich_editing') == 'true') {
				add_filter("mce_external_plugins", array(&$this, "add_storelicious_list_plugin" ), 2);
				add_filter('mce_buttons_2', array(&$this, 'register_storelicious_list_button' ), 2);
				
			}
		}
		
		function register_storelicious_list_button($buttons) {
			array_push($buttons, "", $this->pluginname );
			return $buttons;
			
		}
		
		function add_storelicious_list_plugin($plugin_array) {    
			$plugin_array[$this->pluginname] =  get_bloginfo('template_url').'/lib/shortcodes/functions/editor.js';
			return $plugin_array;
			
		}
		
		function change_tinymce_version($version) {
			return ++$version;
		}
		
	}

	$tinymce_button = new add_storelicious_list_button ();


?>
