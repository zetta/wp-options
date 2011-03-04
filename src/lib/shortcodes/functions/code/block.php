<?php
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS CONTENT BLOCK
/*
/* Put a nice block content with thumbnail
/*
/* Usage:
/* [block align="$align" image="$style"  title="Title"] $content [/block]
/*
/*
-------------------------------------------------------------- */
add_shortcode('block', 'storelicious_block');
function storelicious_block($atts, $content = null) {
	extract(shortcode_atts(array(
		'align' => 'left',
		'image' => '',
		'width' => '175',
		'height' => '121',
		'title' => 'Don\'t forget your title attribute!'
	
	), $atts));
	switch($align) {
		
		case 'left':
			$align = 'left';
			break;
		
		case 'right':
			$align = 'right';
			break;
			
		
	}
	
	
	$content = storelicious_clean_html($content);
	
	return '<div class="block clearfix"><a href="'.$image.'" rel="prettyPhoto" class="align'.$align.'" ><span>&nbsp;</span><img src="'.get_bloginfo('template_url').'/lib/scripts/timthumb.php?src='.$image.'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=60&amp;a=t" width="'.$width.'" height="'.$height.'" alt="'.$title.'" /></a><h3>'.$title.'</h3><p>'.do_shortcode($content).'</p></div>';

}
include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/block.php');

