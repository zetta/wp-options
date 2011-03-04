<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS LINK WITH ICONS
/*
/* You can add any icon to your anchor link
/*
/* Usage:
/* [link icon="$icon" url="#"] Link Icon [/link]
/*
/*
-------------------------------------------------------------- */
add_shortcode('link', 'storelicious_aIcon');
function storelicious_aIcon($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '#',
		'icon' => 'accept',
		'title' => '',
		'target' => 'self'
	), $atts));
	include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_icons.php');
	
	switch($target) {
		case 'self': $target = '_self'; break;
		case 'blank': $target = '_blank'; break;
	}

	return '<a href="'.$url.'" target="'.$target.'" class="tipTop aIcon '.$class.'" '.ifTitle($title).'>'.$content.'</a>';
}


include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/links.php');


