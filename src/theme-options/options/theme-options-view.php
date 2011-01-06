<?php
global $pagenow;

function render_options_page()
{
	global $_wpo;
	$base = get_bloginfo('template_url').'/theme-options/assets';
	echo "<!-- storelicious -->
<div id='storelicious-page-outer' class='st'>
	<div id='st-body' class='container_12'>
		<form id='st-form' name='st-form' action=''>
			".get_theme_options_header()."
			".get_theme_options_links()."
			 <!--#st-content-->
    		<div id='st-content' class='clearfix'>
				<!--#st-side-->
				<div id='st-side'>
					".get_theme_options_tab_menu()."
      			</div>
      			<!--/#st-side-->
				<!--#st-main-->
				<div id='st-main'>
					<!--.st-inner-->
					<div class='st-inner'>
         				".get_theme_options_body()."
					</div>
					<!--.st-inner-->
				</div>
				<!--#st-main-->
			</div>
			<!--#st-content-->
			".get_theme_options_footer()."
		</form>
	</div>
</div>";
}


if (('admin.php' == $pagenow) && ('storelicious' == $_GET['page']))
{
    add_action('admin_head', 'add_theme_options_meta');
	function add_theme_options_meta()
	{
		$base = get_bloginfo('template_url').'/theme-options/assets';
		echo "
		<!-- theme options assets -->
			<link rel='stylesheet' href='{$base}/css/storelicious.panel.gs.reset.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/storelicious.panel.gs.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/storelicious.elements.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/storelicious.panel.structure.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/jquery.fancybox-1.3.1.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/uploadify.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/jquery-ui-1.8.5.custom.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/colorpicker.css' type='text/css' media='screen' />
		<!-- /theme options assets -->";
	}
	add_action('init', 'add_theme_options_js');
	function add_theme_options_js()
	{
		$base = get_bloginfo('template_url').'/theme-options/assets';
		wp_register_script('storeliciousTipsy', $base.'/js/jquery.tipsy.pack.js');
		wp_register_script('storeliciousEzMark', $base.'/js/jquery.ezmark.min.js');
		wp_register_script('storeliciousSwfObject', $base.'/js/swfobject.js');
		wp_register_script('storeliciousUploadify', $base.'/js/jquery.uploadify.v2.1.0.min.js');
		wp_register_script('storeliciousIdTabs', $base.'/js/jquery.idTabs.min.js');
		wp_register_script('storeliciousIdTabs', $base.'/js/jquery.validate.pack.js');
		wp_register_script('storeliciousAddress', $base.'/js/jquery.address-1.2.2.min.js');
		wp_register_script('storeliciousUi', $base.'/js/jquery-ui-1.8.5.custom.min.js');
		wp_register_script('storeliciousTinyTips', $base.'/js/jquery.tinyTips.js');
		wp_register_script('storeliciousFancybox', $base.'/js/jquery.fancybox-1.3.1.pack.js');
		wp_register_script('storeliciousColorPicker', $base.'/js/colorpicker.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('storeliciousEzMark');
		wp_enqueue_script('storeliciousTipsy');
		wp_enqueue_script('storeliciousSwfObject');
		wp_enqueue_script('storeliciousUploadify');
		wp_enqueue_script('storeliciousAddress');
		wp_enqueue_script('storeliciousUi');
		wp_enqueue_script('storeliciousTinyTips');
		wp_enqueue_script('storeliciousFancybox');
		wp_enqueue_script('storeliciousColorPicker');
		
		/*syntax highlighter (no se para que)
		wp_register_script('storeliciousShCore', $base.'/js/shCore.js');
		wp_register_script('storeliciousShLegacy', $base.'/js/shLegacy.js');
		wp_register_script('storeliciousShCss', $base.'/js/shBrushCss.js');
		wp_register_script('storeliciousShJs', $base.'/js/shBrushJScript.js');
		wp_register_script('storeliciousShPhp', $base.'/js/shBrushPhp.js');
		wp_register_script('storeliciousShXml', $base.'/js/shBrushXml.js');
		wp_enqueue_script('storeliciousShCore');
		wp_enqueue_script('storeliciousShLegacy');
		wp_enqueue_script('storeliciousShCss');
		wp_enqueue_script('storeliciousShJs');
		wp_enqueue_script('storeliciousShPhp');
		wp_enqueue_script('storeliciousShXml');*/
		
		wp_register_script('storeliciousPanelReady', $base.'/js/storelicious.panel.ready.js');
		wp_enqueue_script('storeliciousPanelReady');
	}
}




function get_theme_options_header()
{
	global $_wpo;
	return "<!--#st-header-->
        <div id='st-header' class='clearfix'>
          <h2 id='st-theme-info' class='shadowBlack'>{$_wpo['name']}
          <small>Version: {$_wpo['version']} | Framework: {$_wpo['fversion'][0]}"
          . ( 'stable' != $_wpo['fversion'][1] ? '-'.$_wpo['fversion'][1] : '' ) . "</small></h2>
          <h1 id='st-logo'>Storelicious &mdash; theme-options</h1>
        </div>
        <!--/#st-header--> ";
}

function get_theme_options_footer()
{
	return "<!--#st-footer-->
        <div id='st-footer' class='bottomRound'>
          <div class='st-inner'>
           <p class='rowForm rowButtons'>
              <input class='stButton btnRed' type='reset' value='"._s('Reset Options')."' />
              <input class='stButton btnBlue' type='submit' value='"._s('Save Options')."' />
           </p>
          </div>
        </div>
        <!--/#st-footer-->";
}

function get_theme_options_links()
{
	global $_wpo;
	$base = get_bloginfo('template_url').'/theme-options/assets';
	return " <!--#st-info-links-->
        <div id='st-info-links' class='clearfix'>
          <ul class='shadowWhite'>
            <li class='float-right'><a href='{$_wpo['more']}' title='"._s('View our themes')."' class='tipBottom'><img src='{$base}/pix/ui/spacer.gif' width='16' height='16' alt='' class='icnL icn16 icn16cart' />"._s('Buy more themes')."</a></li>
            <li><a href='{$_wpo['home']}' title='"._s('Visit the homepage for this theme')."' class='tipNw'><img src='{$base}/pix/ui/spacer.gif' width='16' height='16' alt='' class='icnL icn16 icn16info' />"._s('Theme information')."</a></li>
            <li><a href='{$_wpo['manual']}' title='"._s('Check the theme documentation')."' class='tipNw'><img src='{$base}/pix/ui/spacer.gif' width='16' height='16' alt='' class='icnL icn16 icn16tutorials' />"._s('Theme tutorials')."</a></li>
            <li><a href='{$_wpo['forum']}' title='"._s('Visit our support forums')."' class='tipNw'><img src='{$base}/pix/ui/spacer.gif' width='16' height='16' alt='' class='icnL icn16 icn16help' />"._s('Support forums')."</a></li>
          </ul>
        </div>
        <!--/#st-info-links--> ";
}

function get_theme_options_tab_menu()
{
	global $_wpo;
	$menu = "<ul id='st-menu'>";
	$first = true;
	foreach($_wpo['options'] as $key => $option)
	{
		if(is_array($option) && 'tab' == $option['type'])
		{
			$title = $option['name'];
			$menu .= "<li class='".($first?'current_option':'')."'><a class='tipLeft' href='#stTab{$key}' title='{$title}'>{$title}</a></li>\n";
			$first = false;
		}
	}
	$menu .= "</ul>";
	return $menu;
}

function get_theme_options_body()
{
	global $_wpo;
	$status = 1;
	$body = '';
	foreach($_wpo['options'] as $key => $option)
	{
		if(is_array($option))
		{
			if('tab' == $option['type'])
			{
				$body .= (2==$status?'</div>':'');
				$body .= "\n<div class='stTabContent' id='stTab{$key}'><h2>{$option['name']}</h2>";
				$status = 2;
			}	
			else
				$body .= "\n".get_theme_options_option($option)."\n";
		}
	}
	$body .= (2==$status?'</div>':'');
	return $body;
}









































/*-----------------------------------------------------------------------------------*/
/* Generates The Options - woothemes_machine */
/*-----------------------------------------------------------------------------------*/

function get_select_options($values)
{
	$output = '';
	foreach($values as $key => $option)
	{
		if(is_array($option))
			$output .= "<optgroup label='{$option['name']}'>".get_select_options($option['values'])."</optgroup>";
		else
			$output .= "\t<option value='{$key}'>{$option}</option>\n";
	}
	return $output;
}


function get_theme_options_option($value)
{
	$id = isset($value['id']) ? $value['id'] : '';
	$output = '';
	switch ( $value['type'] )
	{
		case 'text':
		case 'password':
			$output .= "<div class='rowForm rowText'><div class='controls clearfix'><label for='{$id}'>{$value['name']}:</label>";
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<input type='{$value['type']}' name='{$id}' id='{$id}' value='{$val}' />";
		break;
		case 'textarea':
			$output .= "<div class='rowForm rowTextArea'><div class='controls clearfix'><label for='{$id}'>{$value['name']}:</label>";
			$val = htmlentities((get_option($id) ? get_option($id) : $value['std']));
			$cols = isset($value['options']['cols']) ? $value['options']['cols'] : 40 ;
			$output .= "<textarea rows='12' cols='{$cols}' name='{$id}' id='{$id}'>{$val}</textarea>";
		break;
		case 'select':
			$label = (isset($value['label']) ? $value['label'] : _s("Select one option"));
			$output .= "<div class='rowForm rowSelect'><div class='controls clearfix'><label for='{$id}'>{$value['name']}:</label>\n";
			$output .= "<select name='selectshort' id='selectshort'><option value='0'>&mdash; ".$label." &mdash;</option>\n";
			$output .= get_select_options($value['options']);
			$output .= "</select>";
		break;
		case 'inline-select':
			$label = (isset($value['label']) ? $value['label'] : _s("Select one option"));
			$output .= "<div class='rowForm rowSelect'><div class='controls clearfix'><label for='{$id}'>{$value['name']}:</label>\n";
			$output .= "<select name='selectshort' id='selectshort'><option value='0'>&mdash; ".$label." &mdash;</option>\n";
			$output .= get_select_options($value['options']);
			$output .= "</select>";
		break;
		
		
		/*
		case 'calendar':
		
			$val = $value['std'];
			$std = get_option($value['id']);
			if ( $std != "") { $val = $std; }
            $output .= '<input class="woo-input-calendar" type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'.$val.'">';
		
		break;
		case 'time':
			$val = $value['std'];
			$std = get_option($value['id']);
			if ( $std != "") { $val = $std; }
			$output .= '<input class="woo-input-time" name="'. $value['id'] .'" id="'. $value['id'] .'" type="text" value="'. $val .'" />';
		break;
		case "radio":
			
			 $select_value = get_option( $value['id']);
				   
			 foreach ($value['options'] as $key => $option) 
			 { 

				 $checked = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; } 
				   } else {
					if ($value['std'] == $key) { $checked = ' checked'; }
				   }
				$output .= '<input class="woo-input woo-radio" type="radio" name="'. $value['id'] .'" value="'. $key .'" '. $checked .' />' . $option .'<br />';
			
			}
			 
		break;
		case "checkbox": 
		
		   $std = $value['std'];  
		   
		   $saved_std = get_option($value['id']);
		   
		   $checked = '';
			
			if(!empty($saved_std)) {
				if($saved_std == 'true') {
				$checked = 'checked="checked"';
				}
				else{
				   $checked = '';
				}
			}
			elseif( $std == 'true') {
			   $checked = 'checked="checked"';
			}
			else {
				$checked = '';
			}
			$output .= '<input type="checkbox" class="checkbox woo-input" name="'.  $value['id'] .'" id="'. $value['id'] .'" value="true" '. $checked .' />';

		break;
		case "multicheck":
		
			$std =  $value['std'];         
			
			foreach ($value['options'] as $key => $option) {
											 
			$woo_key = $value['id'] . '_' . $key;
			$saved_std = get_option($woo_key);
					
			if(!empty($saved_std)) 
			{ 
				  if($saved_std == 'true'){
					 $checked = 'checked="checked"';  
				  } 
				  else{
					  $checked = '';     
				  }    
			} 
			elseif( $std == $key) {
			   $checked = 'checked="checked"';
			}
			else {
				$checked = '';                                                                                    }
			$output .= '<input type="checkbox" class="checkbox woo-input" name="'. $woo_key .'" id="'. $woo_key .'" value="true" '. $checked .' /><label for="'. $woo_key .'">'. $option .'</label><br />';
										
			}
		break;
		case "upload":
			
			if ( function_exists( 'woothemes_medialibrary_uploader' ) ) {
				
				$output .= woothemes_medialibrary_uploader( $value['id'], $value['std'], null ); // New AJAX Uploader using Media Library
			
			} else {
			
				$output .= woothemes_uploader_function($value['id'],$value['std'],null); // Original AJAX Uploader
				
			} // End IF Statement
						
		break;
		case "upload_min":
			
			if ( function_exists( 'woothemes_medialibrary_uploader' ) ) {
				
				$output .= woothemes_medialibrary_uploader( $value['id'], $value['std'], 'min' ); // New AJAX Uploader using Media Library
			
			} else {
			
				$output .= woothemes_uploader_function($value['id'],$value['std'],'min'); // Original AJAX Uploader
				
			} // End IF Statement
			
			// $output .= woothemes_uploader_function($value['id'],$value['std'],'min');
			
		break;
		case "color":
			$val = $value['std'];
			$stored  = get_option( $value['id'] );
			if ( $stored != "") { $val = $stored; }
			$output .= '<div id="' . $value['id'] . '_picker" class="colorSelector"><div></div></div>';
			$output .= '<input class="woo-color" name="'. $value['id'] .'" id="'. $value['id'] .'" type="text" value="'. $val .'" />';
		break;   
		
		case "typography":
		
			$default = $value['std'];
			$typography_stored = get_option($value['id']);
			
			// Font Size 
			$val = $default['size'];
			if ( $typography_stored['size'] != "") { $val = $typography_stored['size']; }
			if ( $typography_stored['unit'] == 'px'){ $show_px = ''; $show_em = ' style="display:none" '; $name_px = ' name="'. $value['id'].'_size" '; $name_em = ''; }
			else if ( $typography_stored['unit'] == 'em'){ $show_em = ''; $show_px = 'style="display:none"'; $name_em = ' name="'. $value['id'].'_size" '; $name_px = ''; }
			else { $show_px = ''; $show_em = ' style="display:none" '; $name_px = ' name="'. $value['id'].'_size" '; $name_em = ''; }
			$output .= '<select class="woo-typography woo-typography-size woo-typography-size-px"  id="'. $value['id'].'_size" '. $name_px . $show_px .'>';
				for ($i = 9; $i < 71; $i++){ 
					if($val == strval($i)){ $active = 'selected="selected"'; } else { $active = ''; }
					$output .= '<option value="'. $i .'" ' . $active . '>'. $i .'</option>'; }
			$output .= '</select>';
			$output .= '<select class="woo-typography woo-typography-size woo-typography-size-em" id="'. $value['id'].'_size" '. $name_em . $show_em.'>';
				$em = 0.5;
				for ($i = 0; $i < 39; $i++){
					if ($i <= 24)			// up to 2.0em in 0.1 increments
						$em = $em + 0.1;
					elseif ($i >= 14 && $i <= 24)		// Above 2.0em to 3.0em in 0.2 increments
						$em = $em + 0.2;
					elseif ($i >= 24)		// Above 3.0em in 0.5 increments
						$em = $em + 0.5;
					if($val == strval($em)){ $active = 'selected="selected"'; } else { $active = ''; }
					//echo ' '. $value['id'] .' val:'.floatval($val). ' -> ' . floatval($em) . ' $<br />' ;
					$output .= '<option value="'. $em .'" ' . $active . '>'. $em .'</option>'; }
			$output .= '</select>';
			
			// Font Unit 
			$val = $default['unit'];
			if ( $typography_stored['unit'] != "") { $val = $typography_stored['unit']; }
				$em = ''; $px = '';
			if($val == 'em'){ $em = 'selected="selected"'; }
			if($val == 'px'){ $px = 'selected="selected"'; }
			$output .= '<select class="woo-typography woo-typography-unit" name="'. $value['id'].'_unit" id="'. $value['id'].'_unit">';
			$output .= '<option value="px" '. $px .'">px</option>';
			$output .= '<option value="em" '. $em .'>em</option>';
			$output .= '</select>';
			
			// Font Face 
			$val = $default['face'];
			if ( $typography_stored['face'] != "") 
				$val = $typography_stored['face']; 

			$font01 = ''; 
			$font02 = ''; 
			$font03 = ''; 
			$font04 = ''; 
			$font05 = ''; 
			$font06 = ''; 
			$font07 = ''; 
			$font08 = '';
			$font09 = ''; 
			$font10 = '';
			$font11 = '';
			$font12 = '';
			$font13 = '';
			$font14 = '';
			$font15 = '';
								
			if (strpos($val, 'Arial, sans-serif') !== false){ $font01 = 'selected="selected"'; }
			if (strpos($val, 'Verdana, Geneva') !== false){ $font02 = 'selected="selected"'; }
			if (strpos($val, 'Trebuchet') !== false){ $font03 = 'selected="selected"'; }
			if (strpos($val, 'Georgia') !== false){ $font04 = 'selected="selected"'; }
			if (strpos($val, 'Times New Roman') !== false){ $font05 = 'selected="selected"'; }
			if (strpos($val, 'Tahoma, Geneva') !== false){ $font06 = 'selected="selected"'; }
			if (strpos($val, 'Palatino') !== false){ $font07 = 'selected="selected"'; }
			if (strpos($val, 'Helvetica') !== false){ $font08 = 'selected="selected"'; }
			if (strpos($val, 'Calibri') !== false){ $font09 = 'selected="selected"'; }
			if (strpos($val, 'Myriad') !== false){ $font10 = 'selected="selected"'; }
			if (strpos($val, 'Lucida') !== false){ $font11 = 'selected="selected"'; }
			if (strpos($val, 'Arial Black') !== false){ $font12 = 'selected="selected"'; }
			if (strpos($val, 'Gill') !== false){ $font13 = 'selected="selected"'; }
			if (strpos($val, 'Geneva, Tahoma') !== false){ $font14 = 'selected="selected"'; }
			if (strpos($val, 'Impact') !== false){ $font15 = 'selected="selected"'; }
			
			$output .= '<select class="woo-typography woo-typography-face" name="'. $value['id'].'_face" id="'. $value['id'].'_face">';
			$output .= '<option value="Arial, sans-serif" '. $font01 .'>Arial</option>';
			$output .= '<option value="Verdana, Geneva, sans-serif" '. $font02 .'>Verdana</option>';
			$output .= '<option value="&quot;Trebuchet MS&quot;, Tahoma, sans-serif"'. $font03 .'>Trebuchet</option>';
			$output .= '<option value="Georgia, serif" '. $font04 .'>Georgia</option>';
			$output .= '<option value="&quot;Times New Roman&quot;, serif"'. $font05 .'>Times New Roman</option>';
			$output .= '<option value="Tahoma, Geneva, Verdana, sans-serif"'. $font06 .'>Tahoma</option>';
			$output .= '<option value="Palatino, &quot;Palatino Linotype&quot;, serif"'. $font07 .'>Palatino</option>';
			$output .= '<option value="&quot;Helvetica Neue&quot;, Helvetica, sans-serif" '. $font08 .'>Helvetica*</option>';
			$output .= '<option value="Calibri, Candara, Segoe, Optima, sans-serif"'. $font09 .'>Calibri*</option>';
			$output .= '<option value="&quot;Myriad Pro&quot;, Myriad, sans-serif"'. $font10 .'>Myriad Pro*</option>';
			$output .= '<option value="&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, sans-serif"'. $font11 .'>Lucida</option>';
			$output .= '<option value="&quot;Arial Black&quot;, sans-serif" '. $font12 .'>Arial Black</option>';
			$output .= '<option value="&quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, Calibri, sans-serif" '. $font13 .'>Gill Sans*</option>';
			$output .= '<option value="Geneva, Tahoma, Verdana, sans-serif" '. $font14 .'>Geneva*</option>';
			$output .= '<option value="Impact, Charcoal, sans-serif" '. $font15 .'>Impact</option>';
			
			// Google webfonts			
		 	global $google_fonts;
			$output .= '<option value="">-- Google Fonts --</option>';
			foreach ( $google_fonts as $key => $gfont ) :
		 		$font[$key] = '';
				if ($val == $gfont['name']){ $font[$key] = 'selected="selected"'; }
				$name = $gfont['name'];
				$output .= '<option value="'.$name.'" '. $font[$key] .'>'.$name.'</option>';
			endforeach;			

			// Custom Font stack
			$new_stacks = get_option('framework_woo_font_stack');
			if(!empty($new_stacks)){
				$output .= '<option value="">-- Custom Font Stacks --</option>';
				foreach($new_stacks as $name => $stack){
					if (strpos($val, $stack) !== false){ $fontstack = 'selected="selected"'; } else { $fontstack = ''; }
					$output .= '<option value="'. stripslashes(htmlentities($stack)) .'" '.$fontstack.'>'. str_replace('_',' ',$name).'</option>';
				}
			}

			$output .= '</select>';
			
			// Font Weight 
			$val = $default['style'];
			if ( $typography_stored['style'] != "") { $val = $typography_stored['style']; }
				$normal = ''; $italic = ''; $bold = ''; $bolditalic = '';
			if($val == 'normal'){ $normal = 'selected="selected"'; }
			if($val == 'italic'){ $italic = 'selected="selected"'; }
			if($val == 'bold'){ $bold = 'selected="selected"'; }
			if($val == 'bold italic'){ $bolditalic = 'selected="selected"'; }
			
			$output .= '<select class="woo-typography woo-typography-style" name="'. $value['id'].'_style" id="'. $value['id'].'_style">';
			$output .= '<option value="normal" '. $normal .'>Normal</option>';
			$output .= '<option value="italic" '. $italic .'>Italic</option>';
			$output .= '<option value="bold" '. $bold .'>Bold</option>';
			$output .= '<option value="bold italic" '. $bolditalic .'>Bold/Italic</option>';
			$output .= '</select>'; virtual, y opte pro peguntarle a mi developer para aclarar dudillas
			
			// Font Color 
			$val = $default['color'];
			if ( $typography_stored['color'] != "") { $val = $typography_stored['color']; }			
			$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div></div></div>';
			$output .= '<input class="woo-color woo-typography woo-typography-color" name="'. $value['id'] .'_color" id="'. $value['id'] .'_color" type="text" value="'. $val .'" />';

		break;  
		
		case "border":
		
			$default = $value['std'];
			$border_stored = get_option( $value['id'] );
			
			// Border Width 
			$val = $default['width'];
			if ( $border_stored['width'] != "") { $val = $border_stored['width']; }
			$output .= '<select class="woo-border woo-border-width" name="'. $value['id'].'_width" id="'. $value['id'].'_width">';
				for ($i = 0; $i < 21; $i++){ 
					if($val == $i){ $active = 'selected="selected"'; } else { $active = ''; }
					$output .= '<option value="'. $i .'" ' . $active . '>'. $i .'px</option>'; }
			$output .= '</select>';
		
			// Border Style
			$val = $default['style'];
			if ( $border_stored['style'] != "") { $val = $border_stored['style']; }
				$solid = ''; $dashed = ''; $dotted = '';
			if($val == 'solid'){ $solid = 'selected="selected"'; }
			if($val == 'dashed'){ $dashed = 'selected="selected"'; }
			if($val == 'dotted'){ $dotted = 'selected="selected"'; }
			
			$output .= '<select class="woo-border woo-border-style" name="'. $value['id'].'_style" id="'. $value['id'].'_style">';
			$output .= '<option value="solid" '. $solid .'>Solid</option>';
			$output .= '<option value="dashed" '. $dashed .'>Dashed</option>';
			$output .= '<option value="dotted" '. $dotted .'>Dotted</option>';
			$output .= '</select>';
			
			// Border Color
			$val = $default['color'];
			if ( $border_stored['color'] != "") { $val = $border_stored['color']; }			
			$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div></div></div>';
			$output .= '<input class="woo-color woo-border woo-border-color" name="'. $value['id'] .'_color" id="'. $value['id'] .'_color" type="text" value="'. $val .'" />';

		break;   
		
		case "images":
			$i = 0;
			$select_value = get_settings( $value['id']);
				   
			foreach ($value['options'] as $key => $option) 
			 { 
			 $i++;

				 $checked = '';
				 $selected = '';
				   if($select_value != '') {
						if ( $select_value == $key) { $checked = ' checked'; $selected = 'woo-radio-img-selected'; } 
				    } else {
						if ($value['std'] == $key) { $checked = ' checked'; $selected = 'woo-radio-img-selected'; }
						elseif ($i == 1  && !isset($select_value)) { $checked = ' checked'; $selected = 'woo-radio-img-selected'; }
						elseif ($i == 1  && $value['std'] == '') { $checked = ' checked'; $selected = 'woo-radio-img-selected'; }
						else { $checked = ''; }
					}	
				
				$output .= '<span>';
				$output .= '<input type="radio" id="woo-radio-img-' . $value['id'] . $i . '" class="checkbox woo-radio-img-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
				$output .= '<div class="woo-radio-img-label">'. $key .'</div>';
				$output .= '<img src="'.$option.'" alt="" class="woo-radio-img-img '. $selected .'" onClick="document.getElementById(\'woo-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
				$output .= '</span>';
				
			}
		
		break; 
		
		case "info":
			$default = $value['std'];
			$output .= $default;
		break; 
		
		case "string_builder":
			$desc = $value['std'];
			$output .= '<div id="'.$value['id'].'">';
			$output .= 'Name<input class="woo-input woo-ignore" name="name" id="'. $value['id'] .'_name" type="text" />';
			$output .= 'Font Stack<input class="woo-input woo-ignore" name="value" id="'. $value['id'] .'_value" type="text" />';
			$output .= '<div class="add_button"><a class="button string_builder_add" href="#" class="string_builder" id="'.$value['id'].'">Add</a></div>';
			
			$output .= '<div id="'.$value['id'].'_return" class="string_builder_return">';
			$output .= '<h3>'.$desc.'</h3>';
			$saved_data = get_option($value['id']);
			if(!empty($saved_data)){
				foreach($saved_data as $name => $data){
					$data = stripslashes($data);	
					$output .= '<div class="string_option" id="string_builer_option_'.str_replace(' ','_',$name).'"><a class="delete" rel="'.$name.'" href="#"><img src="'.get_bloginfo('template_url').'/functions/images/ico-close.png" /></a><span>'.str_replace('_',' ',$name) .':</span> '. $data .'</div>';
				}
			}
			$output .= '<div style="display:none" class="string_builder_empty">Nothing added yet.</div>';			
			$output .= '</div>';
			$output .= '</div>';

		break;
	*/
	}
		
	// if array then we add small inputs
	if ( is_array($value['type']))
	{
		$output .= "<div class='rowForm rowInlineText'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>";
	
		foreach($value['type'] as $child)
		{
			$id = isset($child['id']) ? $child['id'] : '';
			$val = (get_option($id))? get_option($id) : $child['std'];			
			if('text' == $child['type'])
				 $output .= "<label for='$id'>{$child['name']}<br /><input type='text' name='{$id}' id='{$id}' value='{$val}'/></label>\n";
		}
	
	}
		
	//if ( "checkbox" != $value['type']) 
	//	$output .= '<br/>';
	$output .= '</div><p class="desc">'. (isset($value['desc'])?$value['desc']:'') .'</div>'."\n";
	
	  
   return $output;
}

