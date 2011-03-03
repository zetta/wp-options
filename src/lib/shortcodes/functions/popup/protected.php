<?php

include "../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Insert Protected Content</title>
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
			
			document.getElementById('protected_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var protected_btn = document.getElementById('protected_panel');
		
		// who is active ?
		if (protected_btn.className.indexOf('current') != -1) {
			
			var login_form = document.getElementById('login_form').value;
			var protected_text = document.getElementById('protected_text').value;
				
			if (protected_text != '' )
				tagtext = '[protected loginform="'+login_form+'"] '+protected_text+' [/protected] ';
			else 
				tagtext = '[protected loginform="'+login_form+'"] Add your protected text [/protected] ';
				
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
			<li id="protected_tab" class="current"><span><a href="javascript:mcTabs.displayTab('protected_tab','protected_panel');" onmousedown="return false;">Tooltip</a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height: 230px;">
    
		<!-- small panel -->
		<div id="protected_panel" class="panel current" style="height: 230px;">
        
        <fieldset>
        
            <legend>Options:</legend>
            
           <p><label for="login_form">Login form:</label>
              <select name="login_form" id="login_form">
              <option value="no">No</option>
              <option value="yes">Yes</option>
              </select>
              <small class="desc">Do you want to show the login form if the user is not logged in?</small>
</p>
        
      
            
           <p><label for="protected_text">Text:</label>
                                 <textarea type="text" name="protected_text" id="protected_text" rows="7"></textarea>
                
                        
            <small class="desc">Add the text to protect</small>
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
