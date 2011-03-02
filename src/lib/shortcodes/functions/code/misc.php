<?php
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS MISC SHORTCODES
/*
/* Shortcodes for messages, short url, send to twitter
/*
/*	» Single Messages
/*	» Useful shortcodes for content
/*	» Share on Twitter Link
/*	» Author Information
/*
-------------------------------------------------------------- */

/*-------------------------------------------------------------- 
/*
/* STORELICIOUS SINGLE MESSAGES
/*
/* Show a message
/*
/* Usage:
/* [message type="$type"] $content [/message]
/*
/*
-------------------------------------------------------------- */

/* MESSAGES WITHOUT CLOSE BUTTON */

	add_shortcode('message', 'storelicious_messages');
	
	function storelicious_messages($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'type' => 'note'
		), $atts));
		
		//decide colors
		switch($type) {
			
			case 'error':
				$class = 'error';
				break;
			
			case 'note':
				$class = 'note';
				break;
			
			case 'alert':
				$class = 'alert';
				break;
			
			case 'info':
				$class = 'info';
				break;
			
			case 'success':
				$class = 'success';
				break;
			
			case 'up':
				$class = 'up';
				break;
			
			case 'down':
				$class = 'down';
				break;
			
			case 'help':
				$class = 'help';
				break;
			
		}
		
		return '<div class="stMessage '.$class.'">'.do_shortcode($content).'</div>';
		
	}


/* OTHER WAY TO PUT MESSAGES IN POST */
add_shortcode('note', 'msg_note');
add_shortcode('info', 'msg_info');
add_shortcode('alert', 'msg_alert');
add_shortcode('success', 'msg_success');
add_shortcode('error', 'msg_error');
add_shortcode('up', 'msg_up');
add_shortcode('down', 'msg_down');
add_shortcode('help', 'msg_help');

function msg_note( $atts, $content = null ) {
   return '<div class="note">' . do_shortcode($content) . '</div>';
}

function msg_info( $atts, $content = null ) {
   return '<div class="info">' . do_shortcode($content) . '</div>';
}

function msg_alert( $atts, $content = null ) {
   return '<div class="alert">' . do_shortcode($content) . '</div>';
}

function msg_success( $atts, $content = null ) {
   return '<div class="success">' . do_shortcode($content) . '</div>';
}

function msg_error( $atts, $content = null ) {
   return '<div class="error">' . do_shortcode($content) . '</div>';
}

function msg_up( $atts, $content = null ) {
   return '<div class="up">' . do_shortcode($content) . '</div>';
}

function msg_down( $atts, $content = null ) {
   return '<div class="down">' . do_shortcode($content) . '</div>';
}
function msg_help( $atts, $content = null ) {
   return '<div class="help">' . do_shortcode($content) . '</div>';
}

/*-------------------------------------------------------------- 
/*
/* STORELICIOUS USEFUL SHORTCODES FOR CONTENT
/*
/* Misc shortcodes for fix your content
/*
/* clear : Clear content
/* dotted : Add a dotted line
/* dashed : Add a dashed line
/*
/*
-------------------------------------------------------------- */
add_shortcode('clear', 'storelicious_clear');
add_shortcode('dotted', 'storelicious_dotted');
add_shortcode('dashed', 'storelicious_dashed');

function storelicious_clear($atts, $content = null) {
		return '<br class="clear" />';
		}
function storelicious_dotted($atts, $content = null) {
		return '<hr class="dotted" />';
		}
function storelicious_dashed($atts, $content = null) {
		return '<hr class="dashed" />';
		}				

/************************************************************************************		
 * SHARE ON TWITTER
************************************************************************************/
add_shortcode('twitter', 'send_to_twitter');
function send_to_twitter() {
  return '<div id="twitThis"><a rel="external" href="http://twitter.com/home?status='.__('Currently reading','storelicious').' '.get_permalink($post->ID).'" title="'.__('Click to send this page to Twitter!','storelicious').'">'.__('Share on Twitter','storelicious').'</a></div>';
}


/*-------------------------------------------------------------- 
/*
/* STORELICIOUS AUTHOR INFORMATION
/*
/* Show a message
/*
/* Usage:
/* [message type="$type"] $content [/message]
/*
/*
-------------------------------------------------------------- */
add_shortcode("author", "storelicious_author");


function storelicious_author($atts, $content = null) {

	if(get_the_author_meta('user_url')) {
	$website ='<li class="profWeb"><a rel="me" class="fn url" href="'.get_the_author_meta('user_url').'">'.__('Website','storelicious').'</a></li>';
	} 
	if(get_the_author_meta('twitter')) {
	$twitter ='<li class="profTwitter"><a rel="me" class="url" href="http://www.twitter.com/'.get_the_author_meta('twitter').'">Twitter</a></li>';
	} 
	if(get_the_author_meta('facebook')) {
	$facebook ='<li class="profFacebook"><a rel="me" class="url" href="http://www.facebook.com/'.get_the_author_meta('facebook').'">Facebook</a></li>';
	} 
	if(get_the_author_meta('linkedin')) {
	$linkedin ='<li class="profLinked"><a rel="me" class="url" href="http://www.linkedin.com/in/'.get_the_author_meta('linkedin').'">LinkedIn</a></li>';
	}
	if(get_the_author_meta('flickr')) {
	$flickr ='<li class="profFlickr"><a rel="me" class="url" href="http://www.flickr.com/photos/'.get_the_author_meta('flickr').'">Flickr</a></li>';
	}
	if(get_the_author_meta('grooveshark')) {
	$grooveshark ='<li class="profGroove"><a rel="me" class="url" href="'.get_the_author_meta('grooveshark').'">Grooveshark</a></li>';
	}
	if(!get_the_author_meta('first_name')  || !get_the_author_meta('last_name') ){
		$name ='<span class="nickname">'.get_the_author_meta('display_name').'</span>';
	} else {
		$name ='<span class="given-name">'.get_the_author_meta('first_name').'</span> <span class="family-name">'.get_the_author_meta('last_name').'</span> ';
	}
	
	$other_posts ='<p class="txtR"><a rel="me" class="url" href="'.get_bloginfo('url').'/author/'.get_the_author_meta('user_login').'">'.__('View my other post','storelicious').' <strong>('.get_the_author_posts().')</strong></a>';
	
	$output .=
	
	'<div class="author-info vcard"><div class="author-info-inner">'.get_avatar(get_the_author_id(), 48 ,''.get_bloginfo('template_url').'/lib/assets/pix/default/avatar.png').'
			<h3 class="author-name fn  n">'.$name.'</h3>'.'
			<ul class="author-links fn">'.$website.''.$twitter.''.$facebook.''.$linkedin.''.$flickr.''.$grooveshark.'</ul>
			<hr class="dotted" />
			<div class="author-desc">'.get_the_author_meta('description').''.$other_posts.'</div>
	</div></div>';
				
   return $output;
   
}

	
		
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/misc.php');
?>