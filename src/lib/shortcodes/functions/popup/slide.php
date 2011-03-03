<?php

include "../../../../../../../wp-load.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Insert Image with SlideUp &amp; SlideDown</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo $st_theme; ?>lib/shortcodes/css/shortcodes_admin.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $root; ?>wp-includes/js/thickbox/thickbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script type="text/javascript" src="<?php echo $root; ?>wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script type="text/javascript" src="<?php echo $root; ?>wp-includes/js/jquery/jquery.js?ver=1.4.2"></script>
    <script type="text/javascript" src="<?php echo $root; ?>wp-includes/js/thickbox/thickbox.js"></script>
	<script type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('slide_image').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var tagtext;
		
		var slide_btn = document.getElementById('slide_panel');
		
		// who is active ?
		if (slide_btn.className.indexOf('current') != -1) {
			
			var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
			
			var slide_image = document.getElementById('slide_image').value;
			var slide_fancybox = document.getElementById('slide_fancybox').value;
			
			if (slide_fancybox == 'yes') {	//if fancy yes
				
				if (slide_image != '' ) { //if slide preview is diferent to emtpy
				
					tagtext = '[slide image="'+slide_image+'" fancybox="'+slide_fancybox+'" url="'+slide_image+'"] ';
				
				} else {
					
					tagtext = '[slide image="'+'http://'+'" fancybox="'+slide_fancybox+'" url="'+slide_image+'"]';
					
				}
					
				
			} else { //if fancy no
			
				if (slide_image != '' ) { //if slide preview is diferent to emtpy
				
					tagtext = '[slide image="'+slide_image+'"]';
				
				} else {
					
					tagtext = '[slide image="'+'http://'+'"]';
					
				}
				
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
	<form class="storelicious_shortcodes" name="storelicious_shortcodes" action="#">
	<div class="tabs">
		<ul>
			<li id="slide_tab" class="current"><span><a href="javascript:mcTabs.displayTab('slide_tab','slide_panel');" onmousedown="return false;">  Slide Image  </a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper"  style="height:140px;">
    
		<!-- panel -->
		<div id="slide_panel" class="panel current" style="height:140px;">
        
        <fieldset>
            <legend>Options:</legend>
            
            
            
			<p>
			<label for="slide_image">Image URL:</label>
			<input type="text" name="slide_image" id="slide_image" class="inputTxt" />
            <small class="desc">Enter an URL or <a class="thickbox" href="<?php echo $st_theme; ?>lib/shortcodes/inc/upload.php&TB_iframe=true&height=100&width=100">upload an image for the banner</a>.</small>
			</p>

            
       
       		<p>
			<label for="slide_fancybox">Fancybox?:</label>
            <select name="slide_fancybox" id="slide_fancybox">
         	   <option value="no">No</option>
        	    <option value="yes">Yes</option>
            </select>
            <small class="desc">Open image when clic in fancybox?.</small>
			</p>
        
          
        
        </fieldset>
		</div>
		<!-- end panel -->
		
	</div>

	<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" onclick="insertShortcode();" />
	</div>
</form>
</body>
</html>
<?php

?>
