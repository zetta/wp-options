<?php

include "../../../../../../../wp-config.php";
$st_theme = get_bloginfo("template_url").'/';
$root = get_bloginfo("wpurl").'/';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Insert Gallery</title>
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
		
		//var tagtext;
		var gallery_btn = document.getElementById('gallery_panel');
		
		// who is active ?
		if (gallery_btn.className.indexOf('current') != -1) {
			
			var params = ''
			
			var preview_width = document.getElementById('gallery_preview_width').value;
			var preview_height = document.getElementById('gallery_preview_height').value;
			
			var thumbnail_width = document.getElementById('gallery_thumbnail_width').value;
			var thumbnail_height = document.getElementById('gallery_thumbnail_height').value;
			
			var number = document.getElementById('gallery_number').value;
			
			var fancybox = document.getElementById('gallery_fancybox').value;
			
			if( preview_width && preview_height )
				params += 'width="'+preview_width+'" height="'+preview_height+'"'
			else if( preview_width )
				params += 'width="'+preview_width+'" height="'+preview_width+'"'
			else if(preview_height)
				params += 'width="'+preview_height+'" height="'+preview_height+'"'
				
			if( thumbnail_width && thumbnail_height )
				params += 'tmb_width="'+thumbnail_width+'" tmb_height="'+thumbnail_height+'" '
			else if( thumbnail_width )
				params += 'tmb_width="'+thumbnail_width+'" tmb_height="'+thumbnail_width+'" '
			else if(thumbnail_height)
				params += 'tmb_width="'+thumbnail_height+'" tmb_height="'+thumbnail_height+'" '
			
			if(fancybox == 'yes'){
				params += 'fancybox="'+fancybox+'" '
			}
			
			var tagtext = '[stGallery number="'+number+'" '+params+' ]';

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
          <li id="gallery_tab" class="current"><span><a href="javascript:mcTabs.displayTab('gallery_tab','gallery_panel');" onmousedown="return false;">Related Post</a></span></li>
        </ul>
  </div>
      <div class="panel_wrapper" style="height: 465px;"> 
    
    <!-- gallery panel -->
    <div id="gallery_panel" class="panel current" style="height: 465px;">
          <fieldset>
        <legend>Big Preview Size:</legend>
        <p>
        	<label for="gallery_preview_width">Width:</label>
            <input type="text" name="gallery_preview_width" id="gallery_preview_width" class="inputTxt" />
            <small class="desc">Select the <strong>width</strong> for preview image</small>
        </p>
        
        <p>
        	<label for="gallery_preview_height">Height:</label>
            <input type="text" name="gallery_preview_height" id="gallery_preview_height" class="inputTxt" />
            <small class="desc">Select the <strong>height</strong> for preview image</small>
        </p>
        </fieldset>
        
       <br />
       <fieldset>
       	<legend>Thumbnail Size</legend>
        <p>
        	<label for="gallery_thumbnail_width">Width:</label>
            <input type="text" name="gallery_thumbnail_width" id="gallery_thumbnail_width" class="inputTxt" />
            <small class="desc">Select the <strong>width</strong> for thumbnails</small>
        </p>
        
         <p>
        	<label for="gallery_thumbnail_height">Height:</label>
            <input type="text" name="gallery_thumbnail_height" id="gallery_thumbnail_height" class="inputTxt" />
            <small class="desc">Select the <strong>height</strong> for thumbnails</small>
        </p>
        </fieldset>
        <br />
        
          <br />
          <fieldset>
        <legend>Options:</legend>
        
         <p>
              <label for="gallery_number">Number:</label>
              <select name="gallery_number" id="gallery_number">
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
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
              <small class="desc">How many images want to show?</small> </p>
        
        <p>
			<label for="gallery_fancybox">Fancybox?:</label>
            <select name="gallery_fancybox" id="gallery_fancybox">
         	   <option value="no">No</option>
        	    <option value="yes">Yes</option>
            </select>
            <small class="desc">Open image when clic in fancybox?.</small>
			</p>
      </fieldset>
        </div>
    <!-- end gallery panel --> 
    
    
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
