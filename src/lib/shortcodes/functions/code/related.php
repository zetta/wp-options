<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS RELATED POST WITH THUMBNAILS AND TEXT
/*
/* Add related post without plugin
/*
/* Usage:
/* [related number="6" id="$id"]
/*
/*
-------------------------------------------------------------- */

add_shortcode("related", "storelicious_related_posts");
function storelicious_related_posts($atts, $content = null) {
	extract(shortcode_atts(array(
        'number' => '6',
        'id' => ''
    ), $atts));
	
	global $wp_query, $post;
	
	$post->ID = $GLOBALS['post']->ID;

	if($id == '') {
	$id = $post->ID;
	} else {
	$id;
	}

	$tags = wp_get_post_tags($id);
	$tempQuery = $wp_query;
	
	if($tags) {
	$tag_ids = array();
	
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$newQuery=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($id),
		'posts_per_page' => $number,
		'orderby' => rand,
		'caller_get_posts' => 1);
	
	query_posts($newQuery);
	
	
	
	ob_start(); ?>

<div class="related-posts-container clearfix">
  <h3 class="ribbonHdr ribbonPink"><span>&nbsp;</span>
    <?php _e('Related Posts','storelicious') ;?>
  </h3>
  <div class="related-post-inner">
    <ul>
      <?php 
			$odd = 'class="odd" ';
			while (have_posts()) : the_post(); $post->ID = $GLOBALS['post']->ID; ?>
      <li <?php echo $odd; ?>><a class="tipTop tmbImage" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), medium );
				$files = get_children("post_parent=".$post->ID."&post_type=attachment&post_mime_type=image&orderby=menu_order&order=ASC");
				
					if(has_post_thumbnail()) { ?>
        <img src="<?php bloginfo('template_url'); ?>/lib/scripts/timthumb.php?src=<?php echo $src[0]; ?>&amp;w=100&amp;h=100&amp;zc=1&amp;q=60&amp;a=t" />
        <?php } elseif($files) {  
							$keys = array_keys($files);
					        $num=$keys[0];
					        $img=wp_get_attachment_url($num);
				?>
        <img src="<?php echo bloginfo('template_url'); ?>/lib/scripts/timthumb.php?src=<?php print $img; ?>&amp;w=100&amp;h=100&amp;zc=1&amp;q=60&amp;a=t" alt="<?php the_title_attribute(); ?>" />
        <?php } else { ?>
        <img src="<?php bloginfo('template_url'); ?>/lib/scripts/timthumb.php?src=<?php bloginfo('template_url'); ?>/lib/assets/pix/default/noimage.png&amp;w=100&amp;h=100&amp;zc=1&amp;q=60&amp;a=t" />
        <?php } ?>
        </a>
        <div class="relatedContent">
          <div class="related-hdr">
            <h4><a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
              </a></h4>
            <small>
            <?php the_time('d, F Y'); ?>
            </small> </div>
          <p>
            <?php if ( empty($post->post_excerpt) ) { echo shorten_text(220); } else { the_excerpt(); } ?>
          </p>
        </div>
      </li>
      <?php $odd = ( empty( $odd ) ) ? 'class="odd" ' : '';
			endwhile; ?>
    </ul>
  </div>
</div>
<?php 

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	} wp_reset_query();
		
	return $output_string;

}	
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/related.php');
?>
