<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Insert Link With Icon</title>
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
			document.getElementById('link_text').value = selectedContent;
		}
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var link_bt = document.getElementById('links_panel');
		
		// who is active ?
		if (link_bt.className.indexOf('current') != -1) {
			
			var params = ''
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			var link_icon 	= document.getElementById('link_icon').value;
			var link_target	= document.getElementById('link_target').value;
			var link_url 	= document.getElementById('link_url').value;
			var link_text	= document.getElementById('link_text').value;
			var link_title	= document.getElementById('link_title').value;
				
				if( link_url )
					params += 'url="'+link_url+'" '
				else
					params += 'url="#" '
				
				if( link_title )
					params += 'title="'+link_title+'"'
				
				
				if( link_target == "blank" )
					params += ' target="'+link_target+'"]'
				else
					params += ']'
				
				if( selectedContent != '' )
					params += ' '+link_text+' '
				else
					params += ' Text Link '
					
					
				var tagtext = '[link icon="'+link_icon+'" '+params+'  [/link] ';
				
			
				
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
    <form action="#" name="storelicious_shortcodes" class="storelicious_shortcodes">
      <div class="tabs">
        <ul>
          <li id="links_tab" class="current"><span><a href="javascript:mcTabs.displayTab('links_tab','links_panel');" onmousedown="return false;">Link with Icon</a></span></li>
        </ul>
      </div>
      <div class="panel_wrapper"> 
        
        <!-- small panel -->
        <div id="links_panel" class="panel current" style="height: 325px;">
          <fieldset>
            <legend>Options:</legend>
            <p>
              <label for="link_icon">Icon:</label>
              <select name="link_icon" id="link_icon">
                <?php include ('../../../../lib/shortcodes/inc/value_icons.php'); ?>
              </select>
              <small class="desc">Choose the icon for your link.</small> </p>
            <p>
              <label for="link_target">Target:</label>
              <select name="link_target" id="link_target">
                <option value="self">Self Window</option>
                <option value="blank">New Window</option>
              </select>
              <small class="desc">Select if you want to open your link in a new window</small> </p>
            <p>
              <label for="link_url">Link:</label>
              <input type="text" name="link_url" id="link_url" class="inputTxt" />
              <small class="desc">The URL your button will redirect to.</small> </p>
            <p>
              <label for="link_text">Text:</label>
              <input type="text" name="link_text" id="link_text" class="inputTxt" />
              <small class="desc">Insert the text for your link.</small> </p>
              
              <p>
              <label for="link_title">Title:</label>
              <input type="text" name="link_title" id="link_title" class="inputTxt" />
              <small class="desc">Insert the title for your link.</small> </p>
              
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
