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


if (('admin.php' == $pagenow) && ('theme-options.php' == $_GET['page']))
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
		
		
		// syntax highlighter (no se para que)
		/*
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
			$title = $option['title'];
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
				$body .= "\n<div class='stTabContent' id='stTab{$key}'><h2>{$option['title']}</h2>";
				$status = 2;
			}	
		}
	}
	$body .= (2==$status?'</div>':'');
	return $body;
}













