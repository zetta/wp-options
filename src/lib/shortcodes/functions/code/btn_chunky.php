<?php
	
/*-------------------------------------------------------------- 
/*
/* STORELICIOUS BUTTONS
/*
/* chunky : Class for chunky buttons
/*
/*  Usage:
/* [btnChunky color="$color" url="#"] Button [/btnChunky]
/*
/*
-------------------------------------------------------------- */

	add_shortcode('btnChunky', 'storelicious_btnChunky');
	function storelicious_btnChunky($atts, $content = null) {
		extract(shortcode_atts(array(
		
			'url' => '#',
			'color' => 'grey'
		
		), $atts));
		
		switch($color) {
			
			case 'grey':
				$class = 'btnChunkyClear';
				break;
			
			case 'dark':
				$class = 'btnChunkyDark';
				break;
			
			
		}
		
		return '<a href="'.$url.'" class="stButton btnChunky '.$class.'"><span>&nbsp;</span>'.$content.'</a>';
		
	}
	
?>