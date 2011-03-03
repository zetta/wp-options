<?php

include "../../../../../../../wp-load.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Insert Button</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/swfupload/swfupload-all.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('standard_text').value = selectedContent;
			document.getElementById('icon_text').value = selectedContent;
			document.getElementById('cuhnky_text').value = selectedContent;
			document.getElementById('big_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var standard_btn = document.getElementById('standard_panel');
		var icon_btn = document.getElementById('icon_panel');
		var big_btn = document.getElementById('big_panel');
		var chunky_btn = document.getElementById('chunky_panel');
		// who is active ?
		if (standard_btn.className.indexOf('current') != -1) {
			
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
			var standard_type = document.getElementById('buttonType').value;
			var standard_color = document.getElementById('standard_color').value;
			var standard_link = document.getElementById('standard_link').value;
			var standard_text = document.getElementById('standard_text').value;
			
			if(selectedContent == '') {
				
				if (standard_text != '' )
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+standard_link+'"] '+standard_text+' [/btn'+standard_type+'] ';
				else
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+standard_link+'"] '+'Text Button'+' [/btn'+standard_type+'] ';
					
				if (standard_link != '' )
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+standard_link+'"] '+standard_text+' [/btn'+standard_type+'] ';
				else
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+'#'+'"] '+'Text Button'+' [/btn'+standard_type+'] ';
				
			} else {
				
				if (standard_link != '' )
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+standard_link+'"] '+selectedContent+' [/btn'+standard_type+'] ';
				else
					tagtext = '[btn'+standard_type+' color="'+standard_color+'" url="'+'#'+'"] '+'Text Button'+' [/btn'+standard_type+'] ';
				
			}
		}
		
		if (icon_btn.className.indexOf('current') != -1) {
			
			var icon_icon = document.getElementById('iconIcon').value;
			var icon_link = document.getElementById('icon_link').value;
			var icon_text = document.getElementById('icon_text').value;
				
			if (icon_text != '' ){	
			
				if (icon_link != '' )
					tagtext = '[btnIcon icon="'+icon_icon+'" url="'+icon_link+'"] '+icon_text+' [/btnIcon] ';
				else
					tagtext = '[btnIcon icon="'+icon_icon+'" url="'+'#'+'"] '+icon_text+' [/btnIcon] ';
					
			} else { 
				
				if (icon_link != '' )
					tagtext = '[btnIcon icon="'+icon_icon+'" url="'+icon_link+'"] '+'Text Button'+' [/btnIcon] ';
				else
					tagtext = '[btnIcon icon="'+icon_icon+'" url="'+'#'+'"] '+'Text Button'+' [/btnIcon] ';
					
				
			}
		}
		if (big_btn.className.indexOf('current') != -1) {
			
			var big_color = document.getElementById('big_color').value;
			var big_link = document.getElementById('big_link').value;
			var big_text = document.getElementById('big_text').value;
			var big_desc = document.getElementById('big_desc').value;
				
			if (big_text != '' || big_desc != '' )
				tagtext = '[big_button color="'+big_color+'" url="'+big_link+'" desc="'+big_desc+'"] '+big_text+' [/big_button] ';
			else
				alert('Please specify a text and a description to your button.');
		}
	
		if (chunky_btn.className.indexOf('current') != -1) {
			
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			

			var chunky_color = document.getElementById('chunky_color').value;
			var chunky_link = document.getElementById('chunky_link').value;
			var chunky_text = document.getElementById('chunky_text').value;
			
			if(selectedContent == '') {
				
				if (chunky_text != '' )
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+chunky_link+'"] '+chunky_text+' [/btnChunky] ';
				else
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+chunky_link+'"] '+'Text Button'+' [/btnChunky] ';
					
				if (chunky_link != '' )
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+chunky_link+'"] '+chunky_text+' [/btnChunky] ';
				else
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+'#'+'"] '+'Text Button'+' [/btnChunky] ';
				
			} else {
				
				if (chunky_link != '' )
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+chunky_link+'"] '+selectedContent+' [/btnChunky] ';
				else
					tagtext = '[btnChunky color="'+chunky_color+'" url="'+'#'+'"] '+'Text Button'+' [/btnChunky] ';
				
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
<form action="#" name="storelicious_shortcodes" class="storelicious_shortcodes">
      <div class="tabs">
    <ul>
          <li id="standard_tab" class="current"><span><a href="javascript:mcTabs.displayTab('standard_tab','standard_panel');" onmousedown="return false;">Standard Button</a></span></li>
          <li id="icon_tab"><span><a href="javascript:mcTabs.displayTab('icon_tab','icon_panel');" onmousedown="return false;">Icon Button</a></span></li>
          <li id="big_tab"><span><a href="javascript:mcTabs.displayTab('big_tab','big_panel');" onmousedown="return false;">Big Button</a></span></li>
          <li id="chunky_tab"><span><a href="javascript:mcTabs.displayTab('chunky_tab','chunky_panel');" onmousedown="return false;">Chunky Button</a></span></li>
        </ul>
  </div>
      <div class="panel_wrapper"> 
    
    <!-- standard panel -->
    <div id="standard_panel" class="panel current">
          <fieldset>
        <legend>Style:</legend>
        <p>
              <label for="buttonType">Type:</label>
              <select name="buttonType" id="buttonType">
            <option value="Round">Rounded</option>
            <option value="Square">Square</option>
          </select>
              <small class="desc">Type of your button</small> </p>
        <p>
              <label for="standard_color">Color:</label>
              <select name="standard_color" id="standard_color">
            <?php include ('../../../../lib/shortcodes/inc/value_colors.php'); ?>
          </select>
              <small class="desc">Color of your button</small> </p>
      </fieldset>
          <br />
          <fieldset>
        <legend>Options:</legend>
        <p>
              <label for="standard_link">Link:</label>
              <input type="text" name="standard_link" id="standard_link" class="inputTxt" />
              <small class="desc">The URL your button will redirect to.</small> </p>
        <p>
              <label for="standard_text">Text:</label>
              <input type="text" name="standard_text" id="standard_text" class="inputTxt" />
              <small class="desc">Insert the text of your button.</small> </p>
      </fieldset>
        </div>
    <!-- end standard panel --> 
    
    <!-- icon panel -->
    <div id="icon_panel" class="panel">
          <fieldset>
        <legend>Styling:</legend>
        <p>
              <label for="iconIcon">Icon:</label>
              <select name="iconIcon" id="iconIcon">
            <?php include ('../../../../lib/shortcodes/inc/value_icons.php'); ?>
          </select>
              <small class="desc">Icon of your button</small> </p>
      </fieldset>
          <br />
          <fieldset>
        <legend>Options:</legend>
        <p>
              <label for="icon_link">Link:</label>
              <input type="text" name="icon_link" id="icon_link" class="inputTxt" />
              <small class="desc">The URL your icon will redirect to.</small> </p>
        <p>
              <label for="icon_text">Text:</label>
              <input type="text" name="icon_text" id="icon_text" class="inputTxt" />
              <small class="desc">Insert the text of your button.</small> </p>
      </fieldset>
        </div>
    <!-- end icon panel --> 
    
    <!-- big panel -->
    <div id="big_panel" class="panel">
          <fieldset>
        <legend>Styling:</legend>
        <p>
              <label for="big_color">Color:</label>
              <select name="big_color" id="big_color">
            <?php include ('../../../../lib/shortcodes/inc/value_colors.php'); ?>
          </select>
              <small class="desc">Color of your button</small> </p>
      </fieldset>
          <br />
          <fieldset>
        <legend>Options:</legend>
        <p>
              <label for="big_link">Link:</label>
              <input type="text" name="big_link" id="big_link" class="inputTxt" />
              <small class="desc">The link your button will redirect to</small> </p>
        <p>
              <label for="big_text">Text:</label>
              <input type="text" name="big_text" id="big_text" class="inputTxt" />
              <small class="desc">Insert the text of your button</small> </p>
        <p>
              <label for="big_desc">Desc:</label>
              <input type="text" name="big_desc" id="big_desc" class="inputTxt" />
              <small class="desc">Insert the description of your button</small> </p>
      </fieldset>
          <br />
        </div>
    <!-- end big panel --> 
    
    <!-- chunky panel -->
    <div id="chunky_panel" class="panel">
          <fieldset>
        <legend>Style:</legend>
        <p>
              <label for="chunky_color">Color:</label>
              <select name="chunky_color" id="chunky_color">
            <option value="grey">Grey</option>
            <option value="dark">Dark</option>
          </select>
              <small class="desc">Color of your button</small> </p>
      </fieldset>
          <br />
          <fieldset>
        <legend>Options:</legend>
        <p>
              <label for="chunky_link">Link:</label>
              <input type="text" name="chunky_link" id="chunky_link" class="inputTxt" />
              <small class="desc">The URL your button will redirect to.</small> </p>
        <p>
              <label for="chunky_text">Text:</label>
              <input type="text" name="chunky_text" id="chunky_text" class="inputTxt" />
              <small class="desc">Insert the text of your button.</small> </p>
      </fieldset>
        </div>
    <!-- end chunky panel --> 
    
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
