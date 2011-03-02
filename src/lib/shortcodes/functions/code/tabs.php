<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS TABS
/*
/* Add a tabbed content for your posts
/*
/* Usage:
/* [tabs][tab title="$title"]Content here[/tab][tab title="$title"]Content here[/tab][/tabs]
/*
/*
-------------------------------------------------------------- */
add_shortcode("tabs", "storelicious_tabs");
function storelicious_tabs($atts, $content = null, $code) {
	
global $post;
$id = $post->ID;
		
	extract(shortcode_atts(array(
		'title' => '#',
		'style' => 'clean'
	), $atts));


switch($style) {
			
			case 'clean':
				$style = 'tabbedClean';
				break;
			
			case 'dark':
				$style = 'tabbedDark';
				break;
				
			case 'grey':
				$style = 'tabbedGrey';
				break;
		}
	
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
		
	} else {
	
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
			
		}
		
		$output = '<ul class="tabNavigation clearfix">';
		
		for($i = 0; $i < count($matches[0]); $i++ ) {
			$output .= '<li><a href="#tab-'.$i.'">' . $matches[3][$i]['title'] . '</a></li>';
		}
		
		$output .= '</ul>';
		$output .= '<div class="tabbedInner clearfix">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="tabbedInnerContent clearfix">'.do_shortcode(trim($matches[5][$i])).'</div>';
		}
		$output .= '</div>';
		
		return '<div class="tabbedContent '.$style.'">'.$output.'</div>';
	}
	
}

	
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/tabs.php');

?>