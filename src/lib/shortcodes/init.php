<?php
/**
 * Storelicious shortcodes
 *
 * All shortcodes codes and functions
 *
 * @package Storelicious
 * @subpackage Framework
 * @since Storelicious Framework 1.0
 */


/************************************************************************************		
 * CHECK THE LAST JQUERY VERSION
 ************************************************************************************/
add_action( 'wp_head', current_jquery( '1.5.1' ));
function current_jquery($version) {
		global $wp_scripts;
		if ( ( version_compare($version, $wp_scripts -> registered[jquery] -> ver) == 1 ) && !is_admin() ) {
				wp_deregister_script('jquery'); 
 
				wp_register_script('jquery',
						'http://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js',
						false, $version);
		}
}
	 
	
	

/************************************************************************************		
 * ADD SHORTCODES CSS 
 ************************************************************************************/
add_action('wp_head', 'storelicious_css_shortcodes');
function storelicious_css_shortcodes() {
	$output = '<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/shortcodes/css/shortcodes.css" /> 
	<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/assets/css/tipsy.css" />';
	echo $output;
}

/************************************************************************************		
 * ADD SHORTCODES JS 
 ************************************************************************************/
add_action('init', 'storelicious_js_shortcodes');
function storelicious_js_shortcodes() {
	if(!is_admin()) {
		wp_register_script('storeliciousShortcodes', get_bloginfo('template_url').'/lib/shortcodes/js/shortcodes.js');
		wp_register_script('storeliciousModernizr', get_bloginfo('template_url').'/lib/assets/js/modernizr-1.6.min.js');
		wp_register_script('storeliciousTipsy', get_bloginfo('template_url').'/lib/assets/js/jquery.tipsy.pack.js');
		wp_register_script('storeliciousSwfObject', get_bloginfo('template_url').'/lib/assets/js/swfobject.js');
		
		//wp_enqueue_script('jquery');
		//wp_deregister_script('jquery'); 
		wp_enqueue_script('storeliciousModernizr');
		wp_enqueue_script('storeliciousSwfObject');
		wp_enqueue_script('storeliciousTipsy');
		wp_enqueue_script('storeliciousShortcodes');
		
	}
}

 
 /************************************************************************************		
 * ADD CSS JS SHORTCODES FOR ADMIN
 ************************************************************************************/
 
 
 /*
 ESTAS SOLO TENDRIAN QUE CARGAR EN LAS PAGINAS CREADAS
 y que hacemos con estas? esas solo deberían cargar en las que tienen /storelicious/
 pero y esa que dice shortcode.css??
  también bro, porque son para documentación, ejemplos, etc.. dentro del admin, los shortcodes en el theme ya cargan de manera independiente
  entonces mejor los movemos a la otra carpeta?? o ahi estan bien?? como consideras tu== ahí están bien ¿no? que esté dividido, porque el motor de
  los shortcodes es otra madre que estaré "alimenando
zzaz  "
listo!!! =) 
 */

if (('admin.php' == $pagenow) && (preg_match('/^storelicious/',$_GET['page'])))
{
	add_action('admin_head', 'storelicious_css_admin_shortcodes');
	function storelicious_css_admin_shortcodes() {
		$output = '
		
		<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/assets/css/storelicious.panel.gs.css" />
		<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/shortcodes/css/shortcodes.css" />
		<link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/shortcodes/css/shortcodes_admin.css" />
		';
		echo $output;
	}
	
	add_action('init', 'storelicious_js_admin_shortcodes');
	function storelicious_js_admin_shortcodes() {
			wp_register_script('storeliciousShortcodes', get_bloginfo('template_url').'/lib/shortcodes/js/shortcodes.js');
			wp_register_script('storeliciousModernizr', get_bloginfo('template_url').'/lib/assets/js/modernizr-1.6.min.js');
			wp_register_script('storeliciousTipsy', get_bloginfo('template_url').'/lib/assets/js/jquery.tipsy.pack.js');
			wp_register_script('storeliciousSwfObject', get_bloginfo('template_url').'/lib/assets/js/swfobject.js');
			
			wp_enqueue_script('storeliciousModernizr');
			wp_enqueue_script('storeliciousSwfObject');
			wp_enqueue_script('storeliciousTipsy');
			wp_enqueue_script('storeliciousShortcodes');
	}
}
/************************************************************************************		
 * ADD SHORTCODES JAVASCRIPT
 ************************************************************************************/
 
if (('admin.php' == $pagenow) && (preg_match('/^storelicious/',$_GET['page'])))
{ 
	add_action('admin_footer', 'storelicious_shortcodes_functions'); //carga en el admin
} 
	add_action('wp_footer', 'storelicious_shortcodes_functions'); //carga en el front
	function storelicious_shortcodes_functions() {
		$output = "
		<script type=\"text/javascript\">
			jQuery(document).ready(function() {
				
				jQuery('.storeliciousToggle-open, .storeliciousToggle-closed').each(function() {
					jQuery(this).storeliciousToggle();
				});
				
				jQuery('.stImgSlide').each(function() {
					jQuery(this).storeliciousSlideImage();
				});
	
				jQuery('.stNotification').each(function() {
					jQuery(this).closeNotification();
				});
				
				jQuery('.stGallery').each(function() {
					jQuery(this).storeliciousGallery();
				});
				
				jQuery('.stTooltip').each(function() {
					jQuery(this).storeliciousTooltips();
				});
				
				jQuery('.tabbedContent').each(function() {
					jQuery(this).storeliciousTabs();
				});
				
				jQuery('.stAccordion').each(function() {
					jQuery(this).storeliciousAccordion();
				});
				
				
				jQuery('ol li:first').addClass('first');
				jQuery('ol li:last').addClass('last');
				jQuery('ol li').wrapInner('<\p>');
				
				
			});
		</script>";
		echo $output;
	}

//if open in fancybox
function ifFancy($fancybox) {
	if($fancybox == 'yes') {
		return 'rel="fancybox"';
	} 
}
//if have title
function ifTitle($title) {
	if($title != '') {
		return 'title="'.$title.'"';
	} 
}	
//if permalink
function ifPermalink($url) {
	global $post;
	$id = $post->ID;
	$permalink = get_permalink( $id );
	if($url == '#' || $url =='') {
		return ''.$permalink.'';
	}  else {
		return ''.$url.'';
	}
}	
	
/************************************************************************************		
 * INCLUDE ALL SHORTCODES FUNCTIONS
 ************************************************************************************/


include('functions/code/btn_square.php'); //SQUARE BUTTON
include('functions/code/btn_round.php'); //ROUNDED BUTTON
include('functions/code/btn_icon.php'); //ICON BUTTON
include('functions/code/btn_chunky.php'); //CHUNKY BUTTON
include('functions/code/links.php'); //LINKS
include('functions/code/lists.php'); //LIST
include('functions/code/tabs.php'); //TABS
include('functions/code/slide.php'); //SLIDE
include('functions/code/toggle.php'); //TOGGLE
include('functions/code/block.php'); //BLOCK
include('functions/code/related.php'); //RELATED
include('functions/code/related_thumb.php'); //RELATED THUMBNAIL
include('functions/code/notifications.php'); //NOTIFICATIONS
include('functions/code/misc.php'); //MISC
include('functions/code/columns.php'); //COLUMNS
include('functions/code/tooltip.php'); //TOOLTIPS
include('functions/code/protected.php'); //PROTECTED CONTENT
include('functions/code/accordion.php'); //ACCORDION
include('functions/code/storelicious.php'); //STORELICIOUS
include('functions/code/gallery.php'); //GALLERY

/************************************************************************************		
 * REFRESH TINYMCE EDITOR
 ************************************************************************************/
function storelicious_refresh_editor($ver) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'storelicious_refresh_editor');


/************************************************************************************		
 * CLEAN HTML EXTRA <P>
 ************************************************************************************/
/*	function storelicious_clean_html($content){
		//$content = str_replace("<p></div>", "</div>", $content);
		$content = preg_replace('#<br />#', '<p>', $content);	
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
		/*$content = preg_replace('#(<p>)(\s*\[[\w\s\]\[\/]*)(</p>)#', '$2', $content);*/
		//return $content;
//	}

function storelicious_clean_html($content){
	$content = preg_replace('#<br />#', '', $content);	
	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	$content = preg_replace('#(<p>)(\s*\[[\w\s\]\[\/]*)(</p>)#', '$2', $content);
	
	return $content;
}
