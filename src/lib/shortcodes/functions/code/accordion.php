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
add_shortcode("accordion", "storelicious_accordion");
function storelicious_accordion($atts, $content = null, $code) {
	
global $post;
$id = $post->ID;
		
	extract(shortcode_atts(array(
		'title' => '#',
		'style' => 'clean'
	), $atts));


switch($style) {
			
			case 'clean':
				$style = 'accordionClean';
				break;
			
			case 'box':
				$style = 'accordionBox';
				break;
				
			case 'window':
				$style = 'accordionWindow';
				break;
		}
	$content = storelicious_clean_html($content);
	
	if (!preg_match_all("/(.?)\[(block)\b(.*?)(?:(\/))?\](?:(.+?)\[\/block\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
		
	} else {
	
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
			
		}
		
		
		//$output .= '<div class="tabbedInner clearfix">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="accordion-handler"><img src="'.get_bloginfo('template_url').'/lib/assets/pix/ui/spacer.gif" class="btnHandler" width="24" height="24" alt="" />'.$matches[3][$i]['title'].'</div><div class="accordion-container clearfix"><div class="accordion-inner clearfix">'.do_shortcode(trim($matches[5][$i])).'</div></div>';
		}
		//$output .= '</div>';
		
		return '<div class="stAccordion '.$style.'">'.$output.'</div>';
	}
	
}

	
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/accordion.php');

?>