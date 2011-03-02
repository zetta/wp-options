<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Insert Tooltip</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('tooltip_title').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var tooltip_btn = document.getElementById('tooltip_panel');
		
		// who is active ?
		if (tooltip_btn.className.indexOf('current') != -1) {
			
			var tooltip_title = document.getElementById('tooltip_title').value;
			var tooltip_text = document.getElementById('tooltip_text').value;
				
			if (tooltip_title != '' && tooltip_text != '')
				tagtext = '[tooltip text="'+tooltip_text+'"] '+tooltip_title+' [/tooltip] ';
			else if (tooltip_title != '' && tooltip_text == '')
				tagtext = '[tooltip text="Add your ToolTip Content"] '+tooltip_title+' [/tooltip] ';
			else if (tooltip_title == '' && tooltip_text != '')
				tagtext = '[tooltip text="'+tooltip_text+'"] Add your text [/tooltip] ';
			else
				tagtext = '[tooltip text="Add your ToolTip Content"] Add your text [/tooltip] ';
				
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
	<form  name="storelicious_shortcodes" action="#" class="storelicious_shortcodes">
	<div class="tabs">
		<ul>
			<li id="tooltip_tab" class="current"><span><a href="javascript:mcTabs.displayTab('tooltip_tab','tooltip_panel');" onmousedown="return false;">Tooltip</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 230px;">
    
		<!-- small panel -->
		<div id="tooltip_panel" class="panel current" style="height: 230px;">
        
        <fieldset>
        
            <legend>Options:</legend>
            
           <p><label for="tooltip_title">Title:</label>
              <input type="text" name="tooltip_title" id="tooltip_title" class="inputTxt" />
              <small class="desc">Title of your tooltip</small>
</p>
        
      
            
           <p><label for="tooltip_text">Text:</label>
                                 <textarea type="text" name="tooltip_text" id="tooltip_text" rows="7"></textarea>
                
                        
            <small class="desc">Add the tooltip content bubble</small>
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
