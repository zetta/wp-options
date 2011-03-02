<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tabs</title>
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
		var lists_bt = document.getElementById('lists_panel');
		
		// who is active ?
		if (lists_bt.className.indexOf('current') != -1) {
			
			var tabbed = document.getElementById('tabbed_tabs').value;
			
			if(tabbed != '') {
				
				var tab_style = document.getElementById('tab_style').value;
				var tabs = tabbed.split("|");
				var tabsLen = tabs.length;
				
				var myOutput = '';
				
				for(i=1;i<=tabsLen;i++) {
					
					myOutput += '[tab title="'+tabs[i-1]+'"]  Content [/tab] ';
					
				}
				
				tagtext = '[tabs style="'+tab_style+'"] '+myOutput+'[/tabs] ';
				
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
			<li id="lists_tab" class="current"><span><a href="javascript:mcTabs.displayTab('lists_tab','lists_panel');" onmousedown="return false;">Tabs</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 145px;">
    
		<!-- small panel -->
		<div id="lists_panel" class="panel current" style="height: 145px;">
        
        <fieldset>
        <legend>Options:</legend>
        
        <p>
              <label for="tab_style">Style:</label>
              <select name="tab_style" id="tab_style">
            <option value="clean">Clean</option>
            <option value="dark">Dark</option>
          </select>
              <small class="desc">Initial state of your content.</small> </p>
              
            
            
           <p><label for="tabbed_tabs">Tabs:</label>
                    
                        <input type="text" name="tabbed_tabs" id="tabbed_tabs" class="inputTxt" />
                  
                        
            <small class="desc">Title of your tabs. Separate tabs with "<strong>|</strong>" (no quotes)</small></p>
        
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
