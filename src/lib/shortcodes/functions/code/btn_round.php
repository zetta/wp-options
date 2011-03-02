<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS BUTTONS
/*
/* btnRound : Class for rounded buttons
/*
/* Usage:
/* [btnRound color="$color" url="#"] Button [/btnRound]
/*
/*
-------------------------------------------------------------- */

	add_shortcode('btnRound', 'storelicious_btnRound');
	function storelicious_btnRound($atts, $content = null) {
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'grey'
		
		), $atts));
		
		include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_colors.php');
		
		return '<a href="'.$url.'" class="stButton btnRound '.$class.'"><span>&nbsp;</span>'.$content.'</a>';
		
	}
	
?>