<?php

$options = array();
$options[] = array( "name" => _s("Basic form elements"),
                    "type" => "tab");

$cras = "Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. 
Etiam semper nibh et ipsum vulputate dictum eget a diam.";

$options[] = array( "name" => "Input Text",
					"desc" => $cras,
					"id" => "input_text",
					"std" => "default text",
					"type" => "text");

$options[] = array( "name" => "Input Password",
					"desc" => $cras,
					"id" => "input_password",
					"std" => "password",
					"type" => "password");

$options[] = array( "name" => "<em>Inline</em> Inputs",
					"desc" => $cras,
					"type" => array( 
						array(  'name' => 'Input text',
						  		'id' => 'inline_input_text_1',
								'type' => 'text',
								'std' => 440,
								'meta' => 'Width'),
						array(  'name' => 'Input text',
								'id' => 'inline_input_text_2',
								'type' => 'text',
								'std' => 200,
								'meta' => 'Height'),
						array(  'name' => 'Input text',
								'id' => 'inline_input_text_3',
								'type' => 'text',
								'std' => 200,
								'meta' => 'Height')
				    ));

$options[] = array( "name" => "Textarea",
					"desc" => $cras,
					"id" => "textarea",
					"std" => "",
					"options" => array('cols' => 44), // optional claro
					"type" => "textarea");
					
$options[] = array( "name" => "Select (with short options)",
					"desc" => $cras,
					"id" => "selectshort",
					"std" => "op2",
					"options" => array(
						'op2' => "My Option 02",
						'op3' => "My Option 03",
						), 
					"type" => "select");
					
$options[] = array( "name" => "Select (with long options)",
					"desc" => $cras,
					"id" => "selectlong",
					"label" => "Select One WP Category",
					"std" => "",
					"options" => array(
						'op1' => "My Option 01",
						'op2' => "My Option 02",
						array(
							'name' => "My SubOptions",
							'options' => array(
								'op2_1' => 'my suboption 2.1',
								'op2_2' => 'my suboption 2.2',
								'op2_3' => 'my suboption 2.3'
							)
						),
						'op3' => "My Option 03",
						'op4' => "My Option 04",
						'op5' => "My Option 05",
						'op6' => "My Option 06"
						), 
					"type" => "select");

$options[] = array( "name" => "<em>Inline</em> Selects",
					"desc" => $cras,
					"std" => "",
					"type" => array(
						array(
							'name' => "Dia",
							'type' => 'select',
							"id" => "inlineselects1",
							'options' => array(
								'op2_1' => '01',
								'op2_2' => '02',
								'op2_3' => '03',
								'op2_4' => '04',
								'op2_5' => '05'
							)
						),
						array(
							'name' => "Mes",
							'type' => 'select',
							"id" => "inlineselects2",
							'options' => array(
								'op2_1' => 'Enero',
								'op2_2' => 'Febrero',
								'op2_3' => 'Marzo',
								'op2_4' => 'Abril',
								'op2_5' => 'Mayo'
							)
						),
						array(
							'name' => "Año",
							'type' => 'select',
							"id" => "inlineselect3",
							'options' => array(
								'op2_1' => '2005',
								'op2_2' => '2006',
								'op2_3' => '2007',
								'op2_4' => '2008',
								'op2_5' => '2009',
								'op2_6' => '2010'
							)
						),	
					));


$options[] = array( "name" => "Select (List)",
					"desc" => $cras,
					"id" => "selectlist",
					"std" => "",
					"options" => array(
						'op2' => "My Option 02",
						'op3' => "My Option 03",
						'op4' => "My Option 04",
						), 
					"type" => "select-list");
					
$options[] = array( "name" => "Select (List // Browsing)",
					"desc" => $cras,
					"id" => "selectlistbrowsing",
					"path" => get_bloginfo('template_url').'/lib/assets/pix/temp/',
					"std" => "radiology.png",
					"options" => array(
						'radiology.png' => "Radiology",
						'currentlogo.png' => "CurrentLogo",
						'logo.png' => "LogoStorelicious",
						), 
					"type" => "select-list-browsing");
					
$options[] = array( "name" => "Select (List // Browsing Multiple)",
					"desc" => $cras,
					"id" => "selectlistbrowsingmultiple",
					"path" => get_bloginfo('template_url').'/lib/assets/pix/temp/',
					"std" => "radiology.png",
					"options" => array(
						'radiology.png' => "Radiology",
						'currentlogo.png' => "CurrentLogo",
						'logo.png' => "LogoStorelicious",
						), 
					"type" => "select-list-browsing-multiple");

//  --- NEW TAB --- 
$options[] = array( "name" => _s("Checks & Radio Buttons"),
                    "type" => "tab");


$options[] = array('name' => "One Checkbox",
					'desc' => $cras,
					'type' => 'checkbox',
					'id' => 'chbox',
					'label' => 'Option here',
					'std' => 'true'
					);


$options[] = array('name' => "Multiple <em>Inline</em> Checkboxes",
					'desc' => $cras,
					'inline' => true,
					'type' => 'checkbox-multiple',
					'id' => 'chbox-multiple',
					'std' => array('uno','dos','cinco'),
					'options' => array(
						'uno' => 'Option 01',
						'dos' => 'Option 02',
						'tres' => 'Option 03',
						'cuatro' => 'Option 04',
						'cinco' => 'Option 05'
						)
					);
					
$options[] = array('name' => "Multiple  Checkboxes",
					'desc' => $cras,
					'type' => 'checkbox-multiple',
					'id' => 'chbox-multiple2',
					'std' => array('uno','dos','cinco'),
					'options' => array(
						'uno' => 'Option 01',
						'dos' => 'Option 02',
						'tres' => 'Option 03',
						'cuatro' => 'Option 04',
						'cinco' => 'Option 05'
						)
					);



$options[] = array('name' => "<em>Inline</em> Radio Buttons",
					'desc' => $cras,
					'inline' => true,
					'type' => 'radio',
					'id' => 'radio',
					'std' => 'tres',
					'options' => array(
						'uno' => 'Radio 01',
						'dos' => 'Radio 02',
						'tres' => 'Radio 03',
						'cuatro' => 'Radio 04',
						'cinco' => 'Radio 05'
						)
					);

$options[] = array('name' => " Radio Buttons",
					'desc' => $cras,
					'type' => 'radio',
					'id' => 'radio2',
					'std' => 'dos',
					'options' => array(
						'uno' => 'Radio 01',
						'dos' => 'Radio 02',
						'tres' => 'Radio 03',
						'cuatro' => 'Radio 04',
						'cinco' => 'Radio 05'
						)
					);


//  --- NEW TAB --- 
$options[] = array( "name" => _s("Color & Date Pickers"),
                    "type" => "tab");


$options[] = array( "name" => "Date Picker",
					 "label" => "Choose Date",
					"desc" => $cras,
					"id" => "datepicker",
					"std" => "06/13/1986",  // mm-dd-yy
					"type" => "datepicker");
					
$options[] = array( "name" => "Color Picker",
                     "label" => "Select Color",
					"desc" => $cras,
					"id" => "colorpicker",
					"std" => "ffdd00",  
					"type" => "colorpicker");


$options[] = array( "name" => "<em>Combining</em> Pickers",
					"desc" => $cras,
					"type" => array( 
						array(  'name' => 'Choose Date',
						  		'id' => 'datepicker2',
								'type' => 'datepicker',
								'std' => "06/15/1984"),
						array(  'name' => 'Select color',
								'id' => 'colorpicker2',
								'type' => 'colorpicker',
								'std' => "fd5e23")
				    ));



//  --- NEW TAB --- 
$options[] = array( "name" => _s("Uploading Files"),
                    "type" => "tab");


$options[] = array( "name" => "Normal Input File",
					"desc" => $cras,
					"id" => "upload",
					'label' => 'File',
					"std" => "",
					"type" => "file");
					
					
$options[] = array( "name" => "Viewer Input File",
					"desc" => $cras,
					"id" => "upload2",
					'label' => 'File',
					"std" => "",
					"type" => "file-viewer");
					
					
					
//  --- NEW TAB --- 
$options[] = array( "name" => _s("Sliders"),
                    "type" => "tab");

$options[] = array( "name" => "Slider",
					 "label" => "Number of",
					"desc" => $cras,
					"id" => "slider",
					"std" => "5",  // mm-dd-yy
					"type" => "slider");


//  --- NEW TAB --- 
$options[] = array( "name" => _s("Buttons"),
                    "type" => "tab");                    



// we call the main function
setup_options(
	'http://www.manual-url.com',
	'http://www.forum-url.com',
	'http://www.theme-url.com',
	$options
);
unset($options); //liberamos un poquitin de memoria =)
