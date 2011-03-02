<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS NOTIFICATION MESSAGES
/*
/* Show any message with close button
/*
/* Usage:
/* [notification type="$type"] $content [/notification]
/*
/*
-------------------------------------------------------------- */
	add_shortcode('notification', 'storelicious_notification');
	
	function storelicious_notification($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'type' => 'note'
		), $atts));
		
		//decide colors
		switch($type) {
			
			case 'error':
				$class = 'notificationError';
				break;
			
			case 'note':
				$class = 'notificationNote';
				break;
			
			case 'alert':
				$class = 'notificationAlert';
				break;
			
			case 'info':
				$class = 'notificationInfo';
				break;
			
			case 'success':
				$class = 'notificationSuccess';
				break;
			
			case 'up':
				$class = 'notificationUp';
				break;
			
			case 'down':
				$class = 'notificationDown';
				break;
			
			case 'help':
				$class = 'notificationHelp';
				break;
			
		}
		
		return '<div class="stNotification '.$class.'"><span class="close">&nbsp;</span><div class="stNotificationInner"><span class="icon">&nbsp;</span>'.do_shortcode($content).'</div></div>';
		
	}
	
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/notifications.php');

?>