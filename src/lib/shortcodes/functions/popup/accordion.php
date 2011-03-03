<?php

include "../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Insert Accordion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
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
		var accordion_btn = document.getElementById('accordion_panel');
		
		// who is active ?
		if (accordion_btn.className.indexOf('current') != -1) {
			
			var accordion = document.getElementById('accordion_block').value;
			
			if(accordion != '') {
				
				var accordion_style = document.getElementById('accordion_style').value;
				var blocks = accordion.split("|");
				var blocksLen = blocks.length;
				
				var myOutput = '';
				
				for(i=1;i<=blocksLen;i++) {
					
					myOutput += '[block title="'+blocks[i-1]+'"]  Content [/block] ';
					
				}
				
				tagtext = '[accordion style="'+accordion_style+'"] '+myOutput+'[/accordion] ';
				
			} else {
				
				alert('Specify at least one tab');
				
			}
			
			//if(selectedContent != '') {
//				
//				tagtext = '[toggle state="'+toggle_state+'" title="'+toggle_title+'"] '+selectedContent+' [/toggle] ';
//				
//			} else {
//				
//				tagtext = '[toggle state="'+toggle_state+'" title="'+toggle_title+'"] Your Toggled Content Here [/toggle] ';
//				
//			}
				
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
    <form name="storelicious_shortcodes" class="storelicious_shortcodes" action="#">
      <div class="tabs">
        <ul>
          <li id="accordion_tab" class="current"><span><a href="javascript:mcTabs.displayTab('accordion_tab','accordion_panel');" onmousedown="return false;">Accordion</a></span></li>
        </ul>
      </div>
      <div class="panel_wrapper" style="height: 140px;"> 
        
        <!-- small panel -->
        <div id="accordion_panel" class="panel current" style="height: 140px;">
          <fieldset>
            <legend>Options:</legend>
            <p>
              <label for="accordion_style">Style:</label>
              <select name="accordion_style" id="accordion_style">
                <option value="clean">Clean</option>
                <option value="box">Box</option>
                <option value="window">Window</option>
              </select>
              <small class="desc">Select the style for your accordion.</small> </p>
            <p>
              <label for="accordion_block">Blocks:</label>
              <input type="text" name="accordion_block" id="accordion_block" class="inputTxt" />
              <small class="desc">Title of your blocks. Separate each block with "<strong>|</strong>" (no quotes)</small></p>
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
