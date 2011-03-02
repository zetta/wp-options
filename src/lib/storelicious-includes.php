<?php

/************************************************************************************		
 * ADD ELEMENTS CSS 
 ************************************************************************************/
	add_action('wp_head', 'storelicious_css_elements');
	function storelicious_css_elements() {
		$output = '<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/assets/css/elements.css" />';
		echo $output;
	}



?>