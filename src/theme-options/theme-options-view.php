<?php
global $pagenow;

function render_options_page()
{
	$base = get_bloginfo('template_url');
	echo <<<BODY
	
	
	<div id="wpbody"> 
  <!--#wpbody-content-->
  <div id="wpbody-content"> 
    <!-- ///////////////////////////////// STORELICIOUS PANEL /////////////////////////////////// -->
    <div id="st-body" class="container_12">
      <form id="st-form" name="st-form" action="">
        
        <!--#st-header-->
        <div id="st-header" class="clearfix">
          <h2 id="st-theme-info" class="shadowBlack">Theme Name<small>Version: 1.02 | Framework: 2.01</small></h2>
          <h1 id="st-logo">Storelicious &mdash; WpOptions</h1>
        </div>
        <!--/#st-header--> 
        
        <!--#st-info-links-->
        <div id="st-info-links" class="clearfix">
          <ul class="shadowWhite">
            <li class="float-right"><a href="#" title="View our themes" class="tipBottom"><img src="includes/pix/iface/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16cart" />Buy more themes</a></li>
            <li><a href="#" title="Visit the homepage for this theme" class="tipNw"><img src="includes/pix/iface/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16info" />Theme information</a></li>
            <li><a href="#" title="Check the theme documentation" class="tipNw"><img src="includes/pix/iface/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16tutorials" />Theme tutorials</a></li>
            <li><a href="#" title="Visit our support forums" class="tipNw"><img src="includes/pix/iface/spacer.gif" width="16" height="16" alt="" class="icnL icn16 icn16help" />Support forums</a></li>
          </ul>
        </div>
        <!--/#st-info-links--> 
        
        <!--#st-content-->
        <div id="st-content" class="clearfix"> 
          <!--#st-side-->
          <div id="st-side">
            <ul id="st-menu">
              <li class="current_option"><a class="tipLeft" href="#stTab01" title="Basic form elements">Basic form elements</a></li>
              <li><a class="tipLeft" href="#stTab02" title="Checks &amp; Radio Buttons">Checks &amp; Radio Buttons</a></li>
              <li><a class="tipLeft" href="#stTab03" title="Color &amp; Date Pickers">Color &amp; Date Pickers</a></li>
              <li><a class="tipLeft" href="#stTab04" title="Uploading files">Uploading files</a></li>
              <li><a class="tipLeft" href="#stTab05" title="Sliders">Sliders</a></li>
              <li><a class="tipLeft" href="#stTab06" title="Buttons">Buttons</a></li>
              <li><a class="tipLeft" href="#" title="item">Option menu Item</a></li>
            </ul>
          </div>
          <!--/#st-side--> 
          
          <!--#st-main-->
          <div id="st-main">
            <div class="st-inner">
            
            <!--#stTab01-->
            <div class="stTabContent" id="stTab01">
            <h2>Basic form elements</h2>
              
              
              
              
              
              <!--INPUTTEXT-->
			<div class="rowForm rowText">
            <div class="controls clearfix">
                <label for="inputtext">Input Text:</label>
                <input type="text" name="inputtext" id="inputtext" />
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/INPUTTEXT-->
              <!--INPUTTEXTPASS-->
              <div class="rowForm rowText">
              <div class="controls clearfix">
                <label for="inputpassword">Input Password:</label>
                <input type="password" name="inputpassword" id="inputpassword" />
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/INPUTTEXTPASS-->
              
              <!--INLINETEXT-->
              <div class="rowForm rowInlineText">
              <span class="label"><em>Inline</em> Inputs</span>
              <div class="controls lbls clearfix">
                <label for="inputtext1">Input Text:<br /><input type="text" name="inputtext1" id="inputtext1" /></label>
                <label for="inputtext2">Input Text:<br /><input type="text" name="inputtext2" id="inputtext2" /></label>
                <label for="inputtext3">Input Text:<br /><input type="text" name="inputtext3" id="inputtext3" /></label>
              </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/INLINETEXT-->
               <!--TEXTAREA-->
              <div class="rowForm rowTextArea">
               <div class="controls clearfix">
                <label for="textArea">Textarea :</label>
                <textarea rows="12" cols="40" name="textArea" id="textArea"></textarea>
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/TEXTAREA-->
              
              <!--SELECT-->
              <div class="rowForm rowSelect">
               <div class="controls clearfix">
                <label for="selectshort">Select (with short options):</label>
                <select name="selectshort" id="selectshort">
                  <option value="opt0">&mdash; Select one option &mdash;</option>
                  <option value="opt1">My option 03</option>
                  <option value="opt1">My option 02</option>
                </select>
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/SELECT-->
              
              
              <!--SELECT-->
              <div class="rowForm rowSelect">
               <div class="controls clearfix">
                <label for="selectlarge">Select (with long options) :</label>
                <select name="selectlarge" id="selectlarge">
                  <option value="page0">&mdash; Select one WordPress page &mdash;</option>
                  <option value="page1">Option 1</option>
                  <option value="page1-1">&nbsp;&nbsp; Sub Option 1</option>
                  <option value="page1-2">&nbsp;&nbsp; Sub Option 2</option>
                  <option value="page1-3">&nbsp;&nbsp; Sub Option 3</option>
                  <option value="page1-4">&nbsp;&nbsp; Sub Option 4</option>
                  <option value="page2">Option 2</option>
                  <option value="page3">Option 3</option>
                  <option value="page4">Option 4</option>
                  <option value="page5">Option 5</option>
                  <option value="page5-1">&nbsp;&nbsp; Sub Option 5-1</option>
                  <option value="page5-2">&nbsp;&nbsp; Sub Option 5-2</option>
                  <option value="page5-2-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sub Sub Option 5-2-1</option>
                  <option value="page5-2-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sub Sub Option 5-2-2</option>
                  <option value="page5-3">&nbsp;&nbsp; Sub Option 5-3</option>
                  <option value="page5-4">&nbsp;&nbsp; Sub Option 5-4</option>
                  <option value="page6">Option 6</option>
                  <option value="page7">Option 7</option>
                  <option value="page8">Option 8</option>
                </select>
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/SELECT-->
              
              <!--INLINESELECT-->
              <div class="rowForm rowInlineSelect">
               <span class="label"><em>Inline</em> Selects</span>
               <div class="controls lbls clearfix">
                <label for="selectM1">D&iacute;a</label>
                <select name="selectM1" id="selectM1">
                  <option value="opt0">01</option>
                  <option value="opt1">02</option>
                  <option value="opt2">03</option>
                  <option value="opt3">04</option>
                  <option value="opt4">05</option>
                </select>
                
                <label for="selectM2">Mes</label>
                <select name="selectM2" id="selectM2">
                  <option value="opt0">Enero</option>
                  <option value="opt1">Febrero</option>
                  <option value="opt2">Marzo</option>
                  <option value="opt3">Abril</option>
                  <option value="opt4">Mayo</option>
                  <option value="opt5">Septiembre</option>
                </select>
                
                <label for="selectM3">A&ntilde;o</label>
                <select name="selectM3" id="selectM3">
                  <option value="opt0">2005</option>
                  <option value="opt1">2004</option>
                  <option value="opt2">2003</option>
                  <option value="opt3">2002</option>
                  <option value="opt4">2001</option>
                  <option value="opt5">2000</option>
                </select>
               
                
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
			<!--/INLINESELECT-->
            
            <!--SELECTLIST-->              
              <div class="rowForm rowSelect">
               <div class="controls clearfix">
                <label for="selectlist">Select (List):</label>
                <select name="selectlist" size="5" multiple="multiple" id="selectlist">
                  <option value="opt1">My option 01</option>
                  <option value="opt2" selected="selected">My option 02</option>
                  <option value="opt3">My option 03</option>
                  <option value="opt4">My option 04</option>
                </select>
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--SELECTLIST-->     
              
              
             
              
              
              <!--SELECTLIST BROWSINGFILES-->     
              <div class="rowForm rowSelect">
               <div class="controls clearfix">
                <label for="selectlistfiles">Select (List // Browsing Files):</label>
                <select name="selectlistfiles" size="5" id="selectlistfiles">
                  <option value="opt1"  selected="selected">radiology.png</option>
                  <option value="opt2">myfile02.png</option>
                  <option value="opt3">myfile03.png</option>
                  <option value="opt4">myfile04.png</option>
                  <option value="opt5">myfile05.png</option>
                  <option value="opt6">myfile06.png</option>
                  <option value="opt7">myfile07.png</option>
                  <option value="opt8">myfile08.png</option>
                  <option value="opt9">myfile09.png</option>
                  <option value="opt10">myfile10.png</option>
                </select>
                </div>
               <code class="codeblock"><strong>Path:</strong> http://yoursite.com/wp-content/themes/mytheme/browsingfolder/</code>
               <span class="st-currentFile-preview">
               	<span class="stOverlay">&nbsp;</span><img src="temp/radiology.png" width="128" height="128" alt="" /></span>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/SELECTLIST BROWSINGFILES-->  
              
              
              <!--SELECTLIST BROWSINGFILES MULTIPLE-->  
              <div class="rowForm rowSelect">
               <div class="controls clearfix">
                <label for="selectlistfilesmulti">Select (List // Browsing Files // Multiple selection active):</label>
                <select name="selectlistfilesmulti" size="5" multiple="multiple" id="selectlistfilesmulti">
                  <option value="opt1"  selected="selected">myfile01.png</option>
                  <option value="opt2">myfile02.png</option>
                  <option value="opt3">myfile03.png</option>
                  <option value="opt4">myfile04.png</option>
                  <option value="opt5">myfile05.png</option>
                  <option value="opt6">myfile06.png</option>
                  <option value="opt7">myfile07.png</option>
                  <option value="opt8">myfile08.png</option>
                  <option value="opt9">myfile09.png</option>
                  <option value="opt10">myfile10.png</option>
                </select>
                </div>
               <code class="codeblock"><strong>Path:</strong> http://yoursite.com/wp-content/themes/mytheme/browsingfolder/</code>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/SELECTLIST BROWSINGFILES MULTIPLE-->  
              
              
              
    
              </div>
               <!--/#stTab01-->
               
               
            <!--#stTab02-->
            <div class="stTabContent" id="stTab02">
            <h2>Checks &amp; Radio Buttons</h2>
            
              <!--CHECKBOX-->
              <div class="rowForm rowCheck">
              <span class="label">One Checkbox</span>
              <div class="controls lbls clearfix">
                <label for="chbox"> <input type="checkbox" name="chbox" id="chbox" /> Option here</label>
              </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/CHECKBOX-->
              <!--INLINECHECKBOXES-->
               <div class="rowForm rowCheck rowInlineCheck">
              <span class="label">Multiple <em>Inline</em> Checkboxes</span>
              <div class="controls lbls clearfix">
                <label for="chbox1"> <input type="checkbox" name="chbox1" id="chbox1" /> Option 01</label>
                <label for="chbox2"> <input type="checkbox" name="chbox2" id="chbox2" /> Option 02</label>
                <label for="chbox3"> <input type="checkbox" name="chbox3" id="chbox3" /> Option 03</label>
                <label for="chbox4"> <input type="checkbox" name="chbox4" id="chbox4" /> Option 04</label>
                <label for="chbox5"> <input type="checkbox" name="chbox5" id="chbox5" /> Option 05</label>
              </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/INLINECHECKBOXES-->
              <!--MULTIPLECHECKOXES-->
              <div class="rowForm rowCheck">
              <span class="label">Multiple Checkboxes</span>
              <div class="controls lbls clearfix">
                <label for="chbox6"> <input type="checkbox" name="chbox6" id="chbox6" /> Option 01  <small>(<a title="Example of shadowbox" href="includes/pix/iface/icn16.png" rel="shadowbox">Preview</a>)</small></label><br />
                <label for="chbox7"> <input type="checkbox" name="chbox7" id="chbox7" /> Option 02</label><br />
                <label for="chbox8"> <input type="checkbox" name="chbox8" id="chbox8" /> Option 03</label><br />
                <label for="chbox9"> <input type="checkbox" name="chbox9" id="chbox9" /> Option 04</label><br />
                <label for="chbox10"> <input type="checkbox" name="chbox10" id="chbox10" /> Option 05</label>
                </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/MULTIPLECHECKOXES-->
              
              <!--INLINERADIOBUTTONS-->
              <div class="rowForm rowRadio rowInlineRadio">
              <span class="label"><em>Inline</em> Radio Buttons</span>
              <div class="controls lbls clearfix">
				<label><input type="radio" name="radioGroup2" value="radio" id="radioGroup2_0" />Radio 01</label>
				<label><input type="radio" name="radioGroup2" value="radio" id="radioGroup2_1" />Radio 02</label>
				<label><input type="radio" name="radioGroup2" value="radio" id="radioGroup2_2" />Radio 03</label>
				<label><input type="radio" name="radioGroup2" value="radio" id="radioGroup2_3" />Radio 04</label>
                <label><input type="radio" name="radioGroup2" value="radio" id="radioGroup2_4" />Radio 05</label>
             </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/INLINERADIOBUTTONS-->
              
              <!--RADIOBUTTONS-->
              <div class="rowForm rowRadio">
              <span class="label">Radio Buttons</span>
              <div class="controls lbls clearfix">
				<label><input type="radio" name="radioGroup1" value="radio" id="radioGroup1_0" />Radio 01</label><br />
				<label><input type="radio" name="radioGroup1" value="radio" id="radioGroup1_1" />Radio 02</label><br />
				<label><input type="radio" name="radioGroup1" value="radio" id="radioGroup1_2" />Radio 03</label><br />
				<label><input type="radio" name="radioGroup1" value="radio" id="radioGroup1_3" />Radio 04</label><br />
                <label><input type="radio" name="radioGroup1" value="radio" id="radioGroup1_4" />Radio 05</label>
               </div>
                <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/RADIOBUTTONS-->
            </div>
            <!--#stTab02-->
            
            <!--#stTab03-->
            <div class="stTabContent" id="stTab03">
            <h2>Color &amp; Date Pickers</h2>
            <!--DATEPICKER-->
              <div class="rowForm rowDatePicker">
               <span class="label">Date Picker</span>
              <div class="controls lbls clearfix">
              <label for="datepicker1">Choose Date:
              <input type="text"  class="wpDatePickerOption" id="datepicker1" name="datepicker1" size="10" /></label>
              </div>
              <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/DATEPICKER-->
              
              <!--COLORPICKER-->
              <div class="rowForm rowColorPicker">
              <span class="label">Color Picker</span>
              <div class="controls lbls clearfix">
              <label for="colorpicker1">Select Color:
              <input name="colorpicker1" type="text"  class="wpColorPickerOption" id="colorpicker1" value="FF0000" size="10" /></label>
              </div>
              <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
              <!--/COLORPICKER-->
              
              <!--COMBINING-->
              <div class="rowForm rowInlineText">
               <span class="label">Combining Pickers</span>
              <div class="controls lbls clearfix">
              <label for="datepicker">Choose Date:<br />
              <input type="text"  class="wpDatePickerOption" id="datepicker" name="datepicker" size="10" /></label>
              <label for="colorpicker">Select Color:<br />
              <input name="colorpicker" type="text"  class="wpColorPickerOption" id="colorpicker" value="FF0000" size="10" /></label>
              </div>
              <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
              </div>
             <!--/COMBINING-->
            </div>
            <!--#stTab03-->
            
             <!--#stTab03-->
            <div class="stTabContent" id="stTab04">
            <h2>Uploading files</h2>
            <!--NORMAL UPLOAD FILE-->
              <div class="rowForm rowFile">
              <span class="label">Normal Input File:</span>
               <div class="controls lbls clearfix">
  <label for="file">File</label>
  <input type="file" name="file" id="file" />
  </div>
                  <p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>

</div>
<!--/NORMAL UPLOAD FILE-->

<!--UPLOADIFY-->
	<div class="rowForm rowUploadify rowUploadifySingle" id="testUploadify01">
		<span class="label">Uploadify <em>Single</em>:</span>
               
		<div class="controls lbls  clearfix">
			<label for="inputupload">File:</label>
			<input name="inputupload" type="text" id="inputupload" value="http://yoursite.com/wp-content/uploads/2010/09/image.png" />
			<input type="file" name="uploadify" id="uploadify" />
		</div>
        <div class="st-currentFile-preview"><span class="stOverlay">&nbsp;</span><img src="temp/logo.png" width="233" height="74" alt="" /></div>
        <div class="fileActions">
        <div id="fileQueue" class="fileQueue"></div>
        <p class="rowRight rowButtons">
        	<a href="javascript:jQuery('#uploadify').uploadifyClearQueue()" class="stButton btnLightGrey">Cancel</a>
            <a href="javascript:jQuery('#uploadify').uploadifyUpload()" class="stButton btnLightGrey">Upload</a>
            </p>
        </div>
		<p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
		
	</div>
<!--/UPLOADIFY-->

<!--UPLOADIFY MULTI-->
<div class="rowForm rowUploadify rowUploadifyMulti" id="testUploadify02">
		<span class="label">Uploadify <em>Multi</em>:</span>
               
		<div class="controls lbls clearfix">
			<label for="filesMulti">Files</label>
			<select name="filesMulti" size="5" id="filesMulti">
			  <option>file01.png</option>
			  <option>file02.jpg</option>
			  <option>file03.gif</option>
			  <option>file04.zip</option>
			  <option>file05.psd</option>
			  </select>
<span class="rowRight">
<code><strong>Path:</strong> http://yoursite.com/wp-content/themes/mytheme/myuploadfolder/</code>
<input type="file" name="uploadifyMulti" id="uploadifyMulti" /></span>
		</div>
        <div class="fileActions">
        	<div id="fileQueueMulti" class="fileQueue"></div>
        <p class="rowRight rowButtons">
        	<a href="javascript:jQuery('#uploadifyMulti').uploadifyClearQueue()" class=" stButton btnLightGrey">Cancel All Uploads</a>
            <a href="javascript:jQuery('#uploadifyMulti').uploadifyUpload()" class="stButton btnLightGrey">Upload All Files</a>
            </p>
        </div>
  		
		<p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
		
	</div>
<!--/UPLOADIFY MULTI-->    
            </div>
            <!--#stTab04-->
            <!--#stTab05-->
            <div class="stTabContent" id="stTab05">
            <h2>Sliders</h2>
            <!--SLIDER-->
				<div class="rowForm rowSlider">
					<span class="label">Slider</span>
					<div class="controls lbls clearfix">
						<label for="amount"><img title="Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam." class="tTip icnR icn16 icn16info" src="includes/pix/iface/spacer.gif" width="16" height="16" alt="" />Number of :
				        <input type="text" disabled="disabled" class="wpSliderAmount" id="amount" readonly="readonly" /></label>
							<div class="wpSliderOption"></div>
					</div>
					<p class="desc">Cras iaculis dictum neque, posuere dictum dolor gravida vel. Donec placerat convallis pharetra. Etiam semper nibh et ipsum vulputate dictum eget a diam.</p>
				</div >
              <!--/SLIDER-->
            </div>
            <!--/#stTab05-->
            
            <!--#stTab06-->
            <div class="stTabContent" id="stTab06">
            <h2>Buttons</h2>
            <!--BUTTONS-->
              <div class="rowForm rowButtons">
               <div class="controls clearfix">
                <input class="stButton btnGreen" type="submit" value="Save" />
                <input class="stButton btnBlue" type="submit" value="Send" />
                <input class="stButton btnRed" type="reset" value="Cancel" />
                <input class="stButton btnGrey" type="button" value="Button" />
                <input class="stButton btnLightGrey" type="button" value="Btn" />
                </div>
              </div>
<!--/BUTTONS-->              

            </div>
            <!--/#stTab06-->
            
            </div>
          </div>
          <!--/#st-main--> 
          
        </div>
        <!--/#st-content--> 
        
        <!--#st-footer-->
        <div id="st-footer" class="bottomRound">
          <div class="st-inner">
          
           <p class="rowForm rowButtons">
                <input class="stButton btnRed" type="reset" value="Reset Options" />
                <input class="stButton btnBlue" type="submit" value="Save Options" />
              </p>
              
              </div>
        </div>
        <!--/#st-footer-->
      </form>
    </div>
    <!-- ///////////////////////////////// STORELICIOUS PANEL /////////////////////////////////// --> 
  </div>
  <!--/#wpbody-content--> 
</div>
	
	
	
	
BODY;
    
}



function add_theme_options_meta()
{
	$base = get_bloginfo('template_url').'/theme-options/assets';
	echo <<<META
	<!-- theme options assets -->
	<link href="{$base}/css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="{$base}/js/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery.ezmark.min.js"></script>
	<script type="text/javascript" src="{$base}/js/swfobject.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery.uploadify.v2.1.0.min.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery.address-1.2.2.min.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="{$base}/js/jquery.tinyTips.js"></script>
	<script type="text/javascript" src="{$base}/js/shadowbox.js"></script>
	<script type="text/javascript" src="{$base}/js/colorpicker.js"></script>
	<script type="text/javascript" src="{$base}/js/ready.js"></script>
META;
	
	
}
if (('admin.php' == $pagenow) && ('theme-options.php' == $_GET['page']))
    add_action('admin_head', 'add_theme_options_meta');


