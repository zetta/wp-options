/* <![CDATA[ */


jQuery(document).ready(function($){

//SyntaxHighlighter.all()
//UI
$(".wpDatePickerOption").datepicker( {
	inline : true,
	duration : 500 ,
	showOn : 'focus',
	constrainInput: false,
	showButtonPanel: false
	} );

$(".wpColorPickerOption").ColorPicker({
	color: '#FF0000',
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});


$(".wpSliderOption").slider({
			range: "max",
			min: 1,
			max: 10,
			value: 2,
			slide: function(event, ui) {
				$(".wpSliderAmount").val(ui.value);
			}
		});
		$(".wpSliderAmount").val($(".wpSliderOption").slider("value"));

//OVERLAY
$(".stOverlay").fadeTo("fast", 0);; 	
 $(".st-currentFile-preview").hover(function () {
      $(this).find(".stOverlay").stop().fadeTo(250,0.8)
      },
      function() {
        $(this).find(".stOverlay").stop().fadeTo(250,0);
    });
	


//PRETTYFORMS
$('input[type="checkbox"]').ezMark();
$('input[type="radio"]').ezMark();

//UPLOADIFY


$(".fileActions").slideUp("fast");
$("#uploadify").uploadify({
		'uploader'       : 'includes/swf/uploadify.swf',
		'script'         : 'includes/php/uploadify.php',
		'cancelImg'      : 'includes/pix/iface/cancel.png',
		'folder'         : 'uploads',
		'queueID'        : 'fileQueue',
		'auto'           : false,
		'fileDesc'		: 'Only images',
		'fileExt'		: '*.jpg;*.png;*.jpeg',
		'multi'          : false,
		'onSelect': function() {
			$("#testUploadify01").find(".fileActions").slideDown("fast");
			},
		'onCancel': function(){
			$("#testUploadify01").find(".fileActions").slideUp("normal");
		},
		'onAllComplete':function(){
			$("#testUploadify01").find(".fileActions").slideUp("normal");
		}
	});


$("#uploadifyMulti").uploadify({
		'uploader'       : '../assets/swf/uploadify.swf',
		'script'         : '../assets/scripts/php/uploadify.php',
		'cancelImg'      : '../assets/pix/ui/cancel.png',
		'folder'         : 'uploads',
		'queueID'        : 'fileQueueMulti',
		'buttonText'	 : 'ADD FILES',
		'auto'           : false,
		'multi'          : true,
		'onSelect': function() {
			$("#testUploadify02").find(".fileActions").slideDown("fast");
			},
		'onClearQueue': function(){
			$("#testUploadify02").find(".fileActions").slideUp("normal");
		},
		'onAllComplete':function(){
			$("#testUploadify02").find(".fileActions").slideUp("normal");
		}
	});


//ITEM TABS
	$(".stTabContent").hide(); 
	$("ul#st-menu li:first").addClass("current_option").show();
	$(".stTabContent:first").show(); 

	//On Click Event
	$("ul#st-menu li").click(function() {

		$("ul#st-menu li").removeClass("current_option");
		$(this).addClass("current_option");
		$(".stTabContent").hide(); 
		
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).show();
		return false;
	});


//HELP TIPS
$('a.tTip').tinyTips('light', 'title');
$('img.tTip').tinyTips('dark', 'title');


/* TOOLTIPS */    
$("acronym").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,   
    gravity: 's'
    });    
$(".tipTop").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,   
    gravity: 's'
    });  
$(".tipRight").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,   
    gravity: 'w'
    });
$(".tipBottom").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,   
    gravity: 'n'
    });
$(".tipLeft").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'e'
    });    
$(".tipSe").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'se'
    });  
$(".tipSw").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'sw'
    }); 	  
$(".tipNe").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'ne'
    });
$(".tipNw").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'nw'
    });
$(".pagination a").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'sw'
    });        
$(".project-tools a").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true, 
    gravity: 'nw'
    });        
$(".ribbon").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,
    title: 'alt',
    gravity: 'se'
    });         
$(".agncy a").tipsy({
    delayIn: 200, 
    delayOut: 100,
    fade: true,   
    gravity: 'w'
    });

    });
/* ]]> */
