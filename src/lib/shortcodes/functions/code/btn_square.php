<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS BUTTONS
/*
/* button : Class for classic buttons
/*
/* button Usage:
/* [button color="$color" url="#"] Button [/button]
/*
/*
-------------------------------------------------------------- */

	add_shortcode('btnSquare', 'storelicious_buttons');
	function storelicious_buttons($atts, $content = null) {
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'grey'
		
		), $atts));
		
		include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_colors.php');

		return '<a href="'.$url.'" class="btnSquare '.$class.'"><span>&nbsp;</span>'.$content.'</a>';
		
	}
	
include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/buttons.php');
?>