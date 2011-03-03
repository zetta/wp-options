<?php

include "../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>Block Content</title>
    <link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('block_text').value = selectedContent;
			
		}
	}
	
	function insertShortcode() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		var block_btn = document.getElementById('block_panel');
		
		// who is active ?
		if (block_btn.className.indexOf('current') != -1) {
			
			var block_align = document.getElementById('block_align').value;
			var block_image = document.getElementById('block_image').value;
			var block_title = document.getElementById('block_title').value;
			var block_text = document.getElementById('block_text').value;
			
			if(selectedContent != '') {
				
				tagtext = '[block align="'+block_align+'" image="'+block_image+'" title="'+block_title+'"] '+selectedContent+' [/block] ';
				
			} else {
				
				tagtext = '[block  align="'+block_align+'"  image="'+block_image+'" title="'+block_title+'"] '+block_text+'  [/block] ';
				
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
          <li id="block_tab" class="current"><span><a href="javascript:mcTabs.displayTab('block_tab','block_panel');" onmousedown="return false;">Block Content</a></span></li>
        </ul>
  </div>
      <div class="panel_wrapper" style="height: 355px;"> 
    
    <!-- small panel -->
    <div id="block_panel" class="panel current" style="height: 355px;">
    <fieldset>
    	        <legend>Options:</legend>

		<p> <label for="block_align">Align:</label><select name="block_align" id="block_align">
			<option value="left">Left</option>
			<option value="right">Right</option>
		</select>
        <small class="desc">Select the align image for your block content</small>
        </p>

  <p>
              <label for="block_image">Image:</label>
              <input type="text" name="block_image" id="block_image" class="inputTxt" />
              <small class="desc">Image for block content</small> </p>
              
        <p>
              <label for="block_title">Title:</label>
              <input type="text" name="block_title" id="block_title" class="inputTxt" />
              <small class="desc">Title of your block content</small> </p>
      
        
        <p><label for="block_text">Text:</label>
                                 <textarea type="text" name="block_text" id="block_text" rows="7"></textarea>
                
                        
            <small class="desc">Add the block content</small>
            </p>
            
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
