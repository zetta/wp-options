<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS LIST WITH ICONS
/*
/* You can add any icon to your unordered list
/*
/* Usage:
/* [ul icon="$icon"][li]Item List[/li] [/ul]
/*
/*
-------------------------------------------------------------- */
	add_shortcode('ul', 'storelicious_list');
	add_shortcode('li', 'storelicious_list_li');
	function storelicious_list($atts, $content = null) {
		extract(shortcode_atts(array(
			'icon' => 'tick'
		), $atts));
		include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_icons.php');
		return '<ul class="stList list-'.$class.'">'.do_shortcode($content).'</ul>';
	}
	function storelicious_list_li($atts, $content = null) {
		return '<li>'.do_shortcode($content).'</li>';
	}
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS LIST ITEMS WITH ICONS
/*
/* Allow use mixed class in list
/*
/* Usage:
/* [list][item icon="$icon"]Item List[/item] [/list]
/*
/*
-------------------------------------------------------------- */
	add_shortcode('list', 'storelicious_list_mixed');
	add_shortcode('item', 'storelicious_list_item');
	function storelicious_list_item($atts, $content = null) {
		extract(shortcode_atts(array(
			'icon' => 'tick'
		), $atts));
		include (TEMPLATEPATH . '/lib/shortcodes/inc/switch_icons.php');
		return '<li class="stListItem '.$class.'">'.do_shortcode($content).'</li>';
	}
	function storelicious_list_mixed($atts, $content = null) {
		return '<ul>'.do_shortcode($content).'</ul>';
	}
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS ORDERED LIST STYLES
/*
/* Select between different styles for your ordered list
/*
/* Usage:
/* [ol type="$type"][li]Item List[/li] [/ol]
/*
/*
-------------------------------------------------------------- */
add_shortcode('ol', 'storelicious_orderedlist');
function storelicious_orderedlist($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'disc'
	), $atts));
	
	switch($type) {
		
		case 'disc':
			$type = 'disc';
			break;
		
		case 'roman':
			$type = 'roman';
			break;
	}
	
	return '<ol class=" list-'.$type.'">'.do_shortcode($content).'</ol>';
}


	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/lists.php');


?>