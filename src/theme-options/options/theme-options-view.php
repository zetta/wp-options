<?php
global $pagenow;

function render_options_page()
{
	$base = get_bloginfo('template_url').'/theme-options/assets';
	global $_wpo;
	echo <<<BODY
	
	
	
	<div id="storelicious-page-outer" class="st">
    <div id="st-body" class="container_12">
      <form id="st-form" name="st-form" action="">
        
        <!--#st-header-->
        <div id="st-header" class="clearfix">
          <h2 id="st-theme-info" class="shadowBlack">{$_wpo['name']}
          <small title="{$_wpo['fversion'][1]}">Version: {$_wpo['version']} | Framework: {$_wpo['fversion'][0]}</small></h2>
          <h1 id="st-logo">Storelicious &mdash; theme-options</h1>
        </div>
        <!--/#st-header--> 

 <!--#st-info-links-->
        <div id="st-info-links" class="clearfix">
          <ul class="shadowWhite">
            <li class="float-right"><a href="{$_wpo['more']}" title="View our themes" class="tipBottom"><img src="{$base}/pix/ui/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16cart" />Buy more themes</a></li>
            <li><a href="{$_wpo['home']}" title="Visit the homepage for this theme" class="tipNw"><img src="{$base}/pix/ui/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16info" />Theme information</a></li>
            <li><a href="{$_wpo['manual']}" title="Check the theme documentation" class="tipNw"><img src="{$base}/pix/ui/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16tutorials" />Theme tutorials</a></li>
            <li><a href="{$_wpo['forum']}" title="Visit our support forums" class="tipNw"><img src="{$base}/pix/iu/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16help" />Support forums</a></li>
          </ul>
        </div>
        <!--/#st-info-links-->   
 <!--#st-content-->
        <div id="st-content" class="clearfix"> 
        
          <!--#st-side-->
          <div id="st-side">
            <ul id="st-menu">
              <li class="current_option"><a class="tipLeft" href="#stTab01" title="Design &amp; Typo">Design &amp; Typo</a></li>
              <li><a class="tipLeft" href="#stTab02" title="Content">Content</a></li>
              <li><a class="tipLeft" href="#stTab03" title="Layout Settings">Layout Settings</a></li>
              <li><a class="tipLeft" href="#stTab04" title="Uploading files">Uploading files</a></li>
            </ul>
          </div>
          <!--/#st-side--> 
          
          <!--#st-main-->
          <div id="st-main">
          <!--.st-inner-->
            <div class="st-inner">
             <!--#stTab01-->
            <div class="stTabContent" id="stTab01">
            <h2>Design &amp; Typo</h2>
              <pre class="brush: js">
    /**
     * SyntaxHighlighter
     */
    function foo()
    {
        if (counter <= 10)
            return;
        // it works!
    }
</pre>
            </div>
             <!--/#stTab01-->
                    
      
</div>
<!--.st-inner-->
</div>

<!--#st-main-->




</div>
 <!--#st-content-->
  <!--#st-footer-->
        <div id="st-footer" class="bottomRound">
          <div class="st-inner">
          
           <p class="rowForm rowButtons">
                <input class="stButton btnRed" type="reset" value="Reset Options" />
                <input class="stButton btnBlue" type="submit" value="Save Options" />
              </p>
              
              </div>
        </div>
        <!--/#st-footer-->
 
</form>
</div>
</div>
	
	
	
BODY;
    
}



function add_theme_options_meta()
{
	$base = get_bloginfo('template_url').'/theme-options/assets';
	echo <<<META
	<!-- theme options assets -->
	    <link type="text/css" media="screen" rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/assets/css/elements.css" />
		<link rel="stylesheet" href="{$base}/css/storelicious.panel.gs.reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/storelicious.panel.gs.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/storelicious.elements.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/storelicious.panel.structure.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/uploadify.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/jquery-ui-1.8.5.custom.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="{$base}/css/colorpicker.css" type="text/css" media="screen" />
    <!-- /theme options assets -->
META;
	
	
}
if (('admin.php' == $pagenow) && ('theme-options.php' == $_GET['page']))
    add_action('admin_head', 'add_theme_options_meta');

























