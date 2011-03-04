<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS TOOLTIPS
/*
/* tooltip : Class for chunky buttons
/*
/*  Usage:
/* [tooltip text="$text"]ToolTip[/tooltip]
/*
/*
-------------------------------------------------------------- */

/* btnIcon
-------------------------------------------------------------- */

add_shortcode('tooltip', 'storelicious_tooltip');
function storelicious_tooltip($atts, $content = null) {
	extract(shortcode_atts(array(
		'text' => 'Write your text for tooltip',
	
	), $atts));
	
	$content = storelicious_clean_html($content);		
	$content = do_shortcode($content);
	
	return '<span class="stTooltip">'.$content.'<span class="stTooltip-container">'.$text.'<span class="stTooltip-arrow">&nbsp;</span></span></span>';
	
}

include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/tooltip.php');

