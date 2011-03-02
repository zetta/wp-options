<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS BUTTONS
/*
/* button : Class for classic buttons
/* btnRound : Class for rounded buttons
/* btnIcon : Class for icon buttons
/* btnSquare : Class for squared buttons
/*
/*
/* button Usage:
/* [button color="$color" url="#"] Button [/button]
/*
/*
-------------------------------------------------------------- */

/* buttons
-------------------------------------------------------------- */
	add_shortcode('button', 'storelicious_split');
	function storelicious_split($atts, $content = null) {
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'grey'
		
		), $atts));
		switch($color) {
			
			case 'grey':
				$class = 'buttonGrey';
				break;
				
			case 'pink':
				$class = 'buttonPink';
				break;
			
			case 'yellow':
				$class = 'buttonYellow';
				break;
			
			case 'green':
				$class = 'buttonGreen';
				break;
			
			case 'blue':
				$class = 'buttonBlue';
				break;
			
			case 'purple':
				$class = 'buttonPurple';
				break;
			
			case 'black':
				$class = 'buttonBlack';
				break;
			
			
		}
		
		return '<a href="'.$url.'" class="btn '.$class.'"><span>&nbsp;</span>'.$content.'</a>';
		
	}
	
	include(TEMPLATEPATH .'/lib/shortcodes/functions/tinymce/storelicious.php');
?>