<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS RELATED POST WITH THUMBNAILS
/*
/* Add related post without plugin
/*
/* Usage:
/* [relatedThumbnails number="6" id="$id"]
/*
/*
-------------------------------------------------------------- */

add_shortcode("stGallery", "storelicious_gallery");
function storelicious_gallery($atts, $content = null) {
	extract(shortcode_atts(array(
		'width' => '500',
		'height' => '400',
		'tmb_width' => '100',
		'tmb_height' => '100',
        'number' => '3',
		'fancybox' => ''
    ), $atts));
	
	global $wp_query, $post;
	
	$post->ID = $GLOBALS['post']->ID;

	if($id == '') {
		$id = $post->ID;
	} else {
		$id;
	}
	
	$tmp_post = $post;
	
	$thumbnails = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'numberposts'     => $number,
		'post_parent' => $post->ID,
		'orderby' => 'menu_order'
		);
	
	$previews = array(
		'post_type' 		=> 'attachment',
		'post_mime_type' 	=> 'image',
		'numberposts'		=> 1,
		'posts_per_page'	=> 1,
		'post_parent' 		=> $post->ID,
		'orderby' 			=> 'menu_order'
		);

	$stThumbs 	= get_posts($thumbnails);
	$stPreviews	= get_children($previews);
	
	
	$output.='<div class="stGallery">';
	foreach ($stPreviews as $post) :
		setup_postdata($post);
		$image = wp_get_attachment_image_src($post->ID, 'large');
		$output.='<div class="stImgContainer"><a '.ifFancy($fancybox).' href="'.$image[0].'" title="'.the_title("","",false).'"><img class="medImg" src="'.get_bloginfo('template_url').'/lib/scripts/timthumb.php?src='.$image[0].'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=60&amp;a=t" width="'.$width.'" height="'.$height.'" alt="'.the_title("","",false).'" /></a><span class="desc">'.the_title("","",false).'</span></div>';
	 endforeach;
	 $output.='<ul class="thumbs">';
        foreach($stThumbs as $post) :
                setup_postdata($post);
				$image = wp_get_attachment_image_src($post->ID, 'large');
				$output.='<li><a title="'.the_title("","",false).'" href="'.get_bloginfo('template_url').'/lib/scripts/timthumb.php?src='.$image[0].'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=60&amp;a=t"><img src="'.get_bloginfo('template_url').'/lib/scripts/timthumb.php?src='.$image[0].'&amp;w='.$tmb_width.'&amp;h='.$tmb_height.'&amp;zc=1&amp;q=60&amp;a=t" alt="'.the_title("","",false).'" width="'.$tmb_width.'" height="'.$tmb_height.'" /></a></li>';
        endforeach;
		$post = $tmp_post;
        $output.='</ul></div>';
        return $output;


}
		include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/gallery.php');

?>
