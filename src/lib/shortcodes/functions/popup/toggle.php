<?php

include "../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>Toggled Content</title>
    <link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		var toggle_btn = document.getElementById('toggle_panel');
		
		// who is active ?
		if (toggle_btn.className.indexOf('current') != -1) {
			
			var toggle_style = document.getElementById('toggle_style').value;
			var toggle_state = document.getElementById('toggle_state').value;
			var toggle_title = document.getElementById('toggle_title').value;
			
			if(selectedContent != '') {
				
				tagtext = '[toggle style="'+toggle_style+'" state="'+toggle_state+'" title="'+toggle_title+'"] '+selectedContent+' [/toggle] ';
				
			} else {
				
				tagtext = '[toggle  style="'+toggle_style+'"  state="'+toggle_state+'" title="'+toggle_title+'"] Toggled Content  [/toggle] ';
				
			}
				
		}
	
		
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
    <base target="_self" />
    </head>
    <body onload="init();">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
<form name="storelicious_shortcodes" class="storelicious_shortcodes" action="#">
      <div class="tabs">
    <ul>
          <li id="toggle_tab" class="current"><span><a href="javascript:mcTabs.displayTab('toggle_tab','toggle_panel');" onmousedown="return false;">Toggle Content</a></span></li>
        </ul>
  </div>
      <div class="panel_wrapper" style="height: 235px;"> 
    
    <!-- small panel -->
    <div id="toggle_panel" class="panel current" style="height: 235px;">
    <fieldset>
    	<legend>Style:</legend>
		<p> <label for="toggle_style">Style:</label><select name="toggle_style" id="toggle_style">
			<option value="clean">Clean</option>
			<option value="box">Box</option>
            <option value="window">Window</option>
		</select>
        <small class="desc">Select the style for your toggled content</small>
        </p>
    </fieldset>
    <br />
          <fieldset>
        <legend>Options:</legend>
        <p>
              <label for="toggle_title">Title:</label>
              <input type="text" name="toggle_title" id="toggle_title" class="inputTxt" />
              <small class="desc">Title of your toggled content</small> </p>
        <p>
              <label for="toggle_state">State:</label>
              <select name="toggle_state" id="toggle_state">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
          </select>
              <small class="desc">Initial state of your content.</small> </p>
      </fieldset>
        </div>
    <!-- end small panel --> 
    
  </div>
      <div class="mceActionPanel">
    <div style="float: left">
          <input type="button" id="cancel" name="cancel" value="Close" onclick="tinyMCEPopup.close();" />
        </div>
    <div style="float: right">
          <input type="submit" id="insert" name="insert" value="Insert" onclick="insertShortcode();" />
        </div>
  </div>
    </form>
</body>
</html>
<?php

?>
