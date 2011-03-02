<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS BUTTONS
/*
/* chunky : Class for chunky buttons
/*
/*  Usage:
/* [btnChunky color="$color" url="#"] Button [/btnChunky]
/*
/*
-------------------------------------------------------------- */

/* btnIcon
-------------------------------------------------------------- */
	add_shortcode('btnIcon', 'storelicious_btnIcon');
	function storelicious_btnIcon($atts, $content = null) {
		extract(shortcode_atts(array(
		
			'url' => '#',
			'icon' => 'add'
		
		), $atts));
		
		include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_icons.php');
		
		return '<a href="'.$url.'" class="stButton btnIcon"><span>&nbsp;</span><img src="'.get_bloginfo('template_url').'/lib/assets/pix/ui/spacer.gif" class="stIcon '.$class.'" width="16" height="16" alt="" />'.$content.'</a>';
		
	}
	
?>