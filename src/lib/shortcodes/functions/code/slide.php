<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS SLIDE IMAGE
/*
/* Add a nice slide image to your posts
/*
/* Usage:
/* [slide url="$url" fancybox="true" image="$image"]
/*
/*
-------------------------------------------------------------- */	
	add_shortcode('slide', 'storelicious_slide');
	function storelicious_slide($atts, $content = null) {
global $post;
$id = $post->ID;
$permalink = get_permalink( $id );
$template_url = get_bloginfo('template_url');
		
		extract(shortcode_atts(array(
			'image' => 'Write the url for image',
			'url' => '#',
			'fancybox' => ''
		
		), $atts));
		
		
		return '<div class="sldImage"><a class="stImgSlide" href="'.ifPermalink($url).'" '.ifFancy($fancybox).'><img src="'.$template_url.'/lib/scripts/timthumb.php?src='.$image.'&amp;w=593&amp;h=450&amp;zc=1&amp;q=90&amp;a=t" title="" alt="" width="593" height="450" /></a></div>';
		
	}

		
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/slide.php');
?>