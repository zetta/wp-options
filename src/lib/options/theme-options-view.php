<?php
global $pagenow;

function render_options_page()
{
	global $_wpo;
	$updated = update_storelicious_options();
	$base = get_bloginfo('template_url').'/lib/assets';
	echo "<!-- storelicious -->
<div id='storelicious-page-outer' class='st'>
	<div id='st-body' class='container_12'>
		<form id='st-form' name='st-form' action='' method='post' enctype='multipart/form-data'>
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
			".wp_nonce_field('update-wp-options','_wpnonce',true,false).'
		    <input type="hidden" id="storelicious_post" name="storelicious_post" value="storelicious_post"  />
		    <input type="hidden" name="action" id="action" value="update-wp-options" />
		</form>
	</div>
</div>';
}


if (('admin.php' == $pagenow) && ('storelicious' == $_GET['page']))
{
    add_action('admin_head', 'add_theme_options_meta');
	function add_theme_options_meta()
	{
		$base = get_bloginfo('template_url').'/lib/assets';
		echo "
		<!-- theme options assets -->
			<link rel='stylesheet' href='{$base}/css/storelicious.panel.gs.reset.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/storelicious.panel.gs.css' type='text/css' media='screen' />
			<link rel='stylesheet' href='{$base}/css/elements.css' type='text/css' media='screen' />
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
		$base = get_bloginfo('template_url').'/lib/assets';
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
          <small>Version: {$_wpo['version']} | Framework: {$_wpo['fversion']}</small></h2>
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
	$base = get_bloginfo('template_url').'/lib/assets';
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
/* Generates The Options - storelicious_machine */
/*-----------------------------------------------------------------------------------*/

function get_select_options($options, $values)
{
	$output = '';
	foreach($options as $key => $option)
	{
		if(is_array($option))
			$output .= "<optgroup label='{$option['name']}'>".get_select_options($option['options'], $values)."</optgroup>";
		else
		{	
			$s = " selected='selected' ";
			$selected = is_array($values) ? 
						( in_array($key,$values) ? $s : '' ):
						( $values == $key ) ? $s : '';
		    $output .= "\t<option value='{$key}' {$selected}>{$option}</option>\n";
		}
	}
	return $output;
}


function get_theme_options_option($value)
{
	$base = get_bloginfo('template_url').'/lib/assets';
	$id = isset($value['id']) ? $value['id'] : '';
	$output = '';
	$attr = '';
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
		case 'select-list':
		case 'select-list-browsing':
		case 'select-list-browsing-multiple':
			if('select-list' == $value['type']){
				$attr = ' size="5" multiple="multiple" class="select-list" ';
				$m = '[]';
			}else if('select-list-browsing' == $value['type']){
				$attr = ' size="5" class="select-list-browsing" ';
			}else{
				$attr = ' size="5" multiple="multiple" class="select-list-browsing-multiple" ';
				$m = '[]';
			}
		case 'select':
			if(!isset($value['options']) && isset($value['fs']))
			{
				$value['options'] = get_directory_files(realpath($value['fs']), isset($value['mask'])?$value['mask']:null);
			}
			$attr = ($attr) ? $attr : ''; // para evitar warnings, no me gustan
			$m = ($m) ? $m : ''; 
			$val = get_option($id) ? get_option($id) : $value['std'];
			$label = (isset($value['label']) ? $value['label'] : _s("Select one option"));
			$output .= "<div class='rowForm rowSelect'><div class='controls clearfix'><label for='{$id}'>{$value['name']}:</label>\n";
			$output .= "<select name='{$id}{$m}' id='{$id}' {$attr}>\n";
			if('select'==$value['type'])
				$output .= "<option value='0'>&mdash; ".$label." &mdash;</option>";
			$output .= get_select_options($value['options'], $val);
			$output .= "</select>";
			if( preg_match('/select-list-browsing/',$value['type']) )
			{
				$output .= "<code class='codeblock'><strong>Path:</strong> <span id='{$id}_path'>{$value['path']}</span></code>";
				if('select-list-browsing'==$value['type'])
				{
					$output .= "<span class='st-currentFile-preview'>
               		<span class='stOverlay'>&nbsp;</span><img src='{$value['path']}/{$val}' id='{$id}_viewer'  alt='' /></span>";
               	}
			}
		break;
		case 'checkbox':
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<div class='rowForm rowCheck'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>";
			$checked = ($val=='true') ? " checked='checked' " : '';
			$output .= "<label for='{$id}'> <input type='checkbox' name='{$id}' id='{$id}' value='true' {$checked}/>{$value['label']}</label>";
		break;
		case 'checkbox-multiple':
			$eol = $value['inline'] ? '' : ' <br />';
			$class = $value['inline'] ? 'rowInlineCheck' : '';
			$val = get_option($id) ? get_option($id) : (is_array($value['std']) ? $value['std']: array());
			$output .= "<div class='rowForm rowCheck {$class}'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>";
			foreach($value['options'] as $key => $option)
			{
				$selected = (in_array($key,$val)) ? " checked='checked' " : '';
				$output .= "<label for='{$id}_{$key}'> <input type='checkbox' name='{$id}[${key}]' id='{$id}_{$key}' {$selected}/>{$option}</label>".$eol;
			}
		break;
		case 'radio':
			$eol = $value['inline'] ? '' : ' <br />';
			$class = $value['inline'] ? 'rowInlineRadio' : '';
			$val = get_option($id) ? get_option($id) :  $value['std'];
			$output .= "<div class='rowForm rowRadio {$class}'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>";
			foreach($value['options'] as $key => $option)
			{
				$selected = ($val==$key) ? " checked='checked' " : '';
				$output .= "<label for='{$id}_{$key}'><input type='radio' name='{$id}' id='{$id}_{$key}' {$selected} value='{$key}'/>{$option}</label>".$eol;
			}
		break;
		case 'datepicker':
			$output .= "<div class='rowForm rowDatePicker'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'><label for='{$id}'>{$value['label']}: ";
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<input type='{$value['type']}' name='{$id}' id='{$id}' value='{$val}' size='15' class='wpDatePickerOption' /></label>";
		break;
		case 'colorpicker':
			$output .= "<div class='rowForm rowColorPicker'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'><label for='{$id}'>{$value['label']}: ";
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<input type='{$value['type']}' name='{$id}' id='{$id}' value='{$val}' size='15' class='wpColorPickerOption' /></label>";
		break;
		case 'slider':
			// TODO
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<div class='rowForm rowSlider'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>
			            <label for='{$id}'><img title='{$value['desc']}' src='{$base}/pix/panel/spacer.gif' width='16' height='16' alt='' />{$value['label']} :
				        <input type='text' class='wpSliderAmount' id='{$id}' readonly='readonly' value='{$val}' /></label>
				        <input type='hidden' disabled='disabled' id='{$id}_max' value='{$value['max']}' />
						<input type='hidden' disabled='disabled' id='{$id}_min' value='{$value['min']}' />
						<div id='wpSliderOption_{$id}' class='wpSliderOption'></div>
							";
		break;
		case 'file':
			$output .= "<div class='rowForm rowFile'><div class='controls lbls clearfix'><span class='label'>{$value['name']}:</span>
			<label for='{$id}'>{$value['label']}</label>";
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= "<input type='file' name='{$id}' id='{$id}' value='{$val}' /> <input class='stButton btnLightGrey' type='button' value='".__('Upload','storeliciouspanel')."' />";
		break;
		case 'file-viewer':
			$output .= "<div class='rowForm rowFile'><div class='controls lbls clearfix'><span class='label'>{$value['name']}:</span>
			<label for='{$id}'>{$value['label']}</label>";
			$val = get_option($id) ? get_option($id) : $value['std'];
			$output .= " <input type='file' name='{$id}' id='{$id}' value='{$val}' /> <input class='stButton btnLightGrey' type='button' value='".__('Upload','storeliciouspanel')."' />";
			if($val)
			{
					// aqui ayudame, ¿donde irian esos ? ¿cómo pongo este valor? get_template_directory_uri()?? GRACIAS!!
				$output .= "<code class='codeblock'><strong>Path:</strong> <span id='{$id}_path'>{$value['path']}</span></code>";			
				$output .= "<span class='st-currentFile-preview'>
           		   <span class='stOverlay'>&nbsp;</span><img src='".get_template_directory_uri()."/lib/scripts/timthumb.php?src={$val}&amp;w={$value['width']}&amp;h={$value['height']}&amp;zc=1&amp;q=60&amp;a=t' id='{$id}_viewer'  alt='' /></span>";
            }
		break;
	}
		
	// if array then we add small inputs/selects
	if ( is_array($value['type']))
	{
		$class = ( 'text'==$value['type'][0]['type'] ) ? 'rowInlineText' : 'rowInlineSelect';
		$output .= "<div class='rowForm ".$class."'><span class='label'>{$value['name']}</span><div class='controls lbls clearfix'>";
	
		foreach($value['type'] as $child)
		{
			$id = isset($child['id']) ? $child['id'] : '';
			$val = (get_option($id))? get_option($id) : $child['std'];			
			if('text' == $child['type'])
				 $output .= "<label for='$id'>{$child['name']}:<br /><input type='text' name='{$id}' id='{$id}' value='{$val}'/></label>\n";
			elseif('datepicker' == $child['type'])
				 $output .= "<label for='$id'>{$child['name']}:<br /><input type='text' name='{$id}' id='{$id}' value='{$val}' class='wpDatePickerOption'/></label>\n";
			elseif('colorpicker' == $child['type'])
				 $output .= "<label for='$id'>{$child['name']}:<br /><input type='text' name='{$id}' id='{$id}' value='{$val}' class='wpColorPickerOption'/></label>\n";
			elseif('select' == $child['type'])
			{
				$id = isset($child['id']) ? $child['id'] : '';
				$label = (isset($child['label']) ? $child['label'] : _s("Select one option"));
				$output .= "<label for='{$id}'>{$child['name']}:</label>\n";
				$output .= "<select name='{$id}' id='{$id}'>\n";
				$output .= get_select_options($child['options'], $val);
				$output .= "</select>";
			}	
		}
	
	}
	
	$output .= '</div><p class="desc">'. (isset($value['desc'])?$value['desc']:'') .'</p></div>'."\n";
	
	  
   return $output;
}

