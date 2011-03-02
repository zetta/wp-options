<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Insert Related Post</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	
	function insertShortcode() {
		
		var tagtext;
		var related_btn = document.getElementById('related_panel');
		
		// who is active ?
		if (related_btn.className.indexOf('current') != -1) {
			
			var related_type = document.getElementById('relatedType').value;
			var related_number = document.getElementById('related_number').value;
			var related_id = document.getElementById('related_id').value;
			
				
				tagtext = '['+related_type+' number="'+related_number+'" id="'+related_id+'"]';
				
				
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
<form name="storelicious_shortcodes" action="#" class="storelicious_shortcodes">
      <div class="tabs">
    <ul>
          <li id="related_tab" class="current"><span><a href="javascript:mcTabs.displayTab('related_tab','related_panel');" onmousedown="return false;">Related Post</a></span></li>
        </ul>
  </div>
      <div class="panel_wrapper" style="height: 240px;"> 
    
    <!-- related panel -->
    <div id="related_panel" class="panel current" style="height: 240px;">
          <fieldset>
        <legend>Style:</legend>
        <p>
              <label for="relatedType">Type:</label>
              <select name="relatedType" id="relatedType">
            <option value="related">Thumbnail &amp; text</option>
            <option value="relatedThumbnails">Only thumbnail</option>
          </select>
              <small class="desc">Select the style to show related post</small> </p>
       
      </fieldset>
          <br />
          <fieldset>
        <legend>Options:</legend>
        
         <p>
              <label for="related_number">Number:</label>
              <select name="related_number" id="related_number">
           	<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
              <small class="desc">How many related post you want to show?</small> </p>
        
        <p>
              <label for="related_id">Post ID:</label>
              <input type="text" name="related_id" id="related_id" class="inputTxt" />
              <small class="desc">(Optional) Write the ID if you want a specific related.</small> </p>
      </fieldset>
        </div>
    <!-- end related panel --> 
    
    
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
