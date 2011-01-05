<?php

$options = array();
$options[] = array( "name" => _s("Basic form elements"),
                    "type" => "tab");


$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "top center",
					"type" => "select",
					"options" => $body_pos);



/*
$options[] = array( "name" => _s("Single Text"),
					"type" => "text");




/*                    
$options[] = wpo_string('string','this is the default string...','String','You can store strings in this option');
$options[] = wpo_text('text','default text','Text','Here you can store large text');
$options[] = wpo_boolean('boolean1',false,'Boolean','True or False');
$options[] = wpo_boolean('boolean2',true,'Boolean');
$options[] = wpo_number('number',10,'Number');
$options[] = wpo_check('check',true,'Check','Toggle Option');
*/

$options[] = array( "name" => _s("Complex Types"),
                    "type" => "tab");



$colors = array(
    'blue'   => 'Blue',
    'red'    => 'Red',
    'green'  => 'Green',
    'orange' => 'Orange',
    'yellow' => 'Yellow'
);
//$options[] = wpo_checkbox('checkbox',$colors,array('orange','green'),'CheckBox','Select colors');



// we call the main function
setup_options(
	'http://www.manual-url.com',
	'http://www.forum-url.com',
	'http://www.theme-url.com',
	$options
);
unset($options); //liberamos un poquitin de memoria =)
