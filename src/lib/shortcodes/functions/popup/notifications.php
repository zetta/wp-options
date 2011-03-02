<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Insert Notification Box</title>
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
			
			document.getElementById('nots_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var notifications_bt = document.getElementById('notifications_panel');
		
		// who is active ?
		if (notifications_bt.className.indexOf('current') != -1) {
			
			var nots_type = document.getElementById('nots_type').value;
			var nots_text = document.getElementById('nots_text').value;
				
			if (nots_text != '' )
				tagtext = '[notification type="'+nots_type+'"] '+nots_text+' [/notification] ';
			else
				tagtext = '[notification type="'+nots_type+'"] Add your text [/notification] ';
				
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
			<li id="notifications_tab" class="current"><span><a href="javascript:mcTabs.displayTab('notifications_tab','notifications_panel');" onmousedown="return false;">Notifications</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 265px;">
    
		<!-- small panel -->
		<div id="notifications_panel" class="panel current" style="height: 265px;">
        
        <fieldset>
        
            <legend>Styling:</legend>
            
           <p><label for="nots_type">Type:</label>
                    
                        <select name="nots_type" id="nots_type">
                        	<option value="alert">Alert</option>
							<option value="note">Note</option>
							<option value="info">Info</option>
                            <option value="help">Help</option>                            
                            <option value="success">Success</option>
                            <option value="error">Error</option>
                            <option value="up">Up</option>
                            <option value="down">Down</option>
                            
                            
                            
                            
                            
                        
                        </select>
                    
                    
            <small class="desc">Choose the type of your notification</small>
</p>
        
        </fieldset>
        
        <br />
        
        <fieldset>
        
        	<legend>Options:</legend>
            
           <p><label for="nots_text">Text:</label>
                                 <textarea type="text" name="nots_text" id="nots_text" rows="7"></textarea>
                
                        
            <small class="desc">Your notification text. Accepts Shortcodes.</small>
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
