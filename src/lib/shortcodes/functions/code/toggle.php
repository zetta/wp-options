<?php
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS TOGGLE CONTENT
/*
/* Toggle any content in your post
/*
/* Usage:
/* [toggle state="$state" style="$style" title="Title"] $content [/toggle]
/*
/*
-------------------------------------------------------------- */
	add_shortcode('toggle', 'storelicious_toggle');
	function storelicious_toggle($atts, $content = null) {
		extract(shortcode_atts(array(
			'state' => 'closed',
			'style' => 'clean',
			'title' => 'Don\'t forget your title attribute!'
		
		), $atts));
		switch($style) {
			
			case 'clean':
				$style = 'toggleClean';
				break;
			
			case 'box':
				$style = 'toggleBox';
				break;
				
			case 'window':
				$style = 'toggleWindow';
				break;
		}
		
		if($state == 'open') {
			$class = 'storeliciousToggle-open';
		} else {
			$class = 'storeliciousToggle-closed';
		}
		$content = storelicious_clean_html($content);
		
		return '<div class="stToggleOuter clearfix '.$style.'"><div class="'.$class.'"><div class="toggle-handler"><img src="'.get_bloginfo('template_url').'/lib/assets/pix/ui/spacer.gif" class="btnToggle" width="24" height="24" alt="" />'.$title.'</div><div class="toggle-content"><div class="toggle-inner clearfix">'.do_shortcode($content).'</div></div></div></div>';

	}
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/toggle.php');
?>