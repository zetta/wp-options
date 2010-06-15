jQuery(document).ready( function($) {
	
	//Parents
	$(".optionParent").change(function(){
			if( this.checked )
				$(".child_"+$(this).attr('id')).show().animate({ backgroundColor : '#ffdd00' }).animate({ backgroundColor : '#ffffff' });
			else
			    hideChilds($(this).attr('id'));
	});
	var hideChilds = function(parentId)
	{
	    if($('#'+parentId).length && $('#'+parentId).get(0).checked)
	        $('#'+parentId).get(0).checked = false;
	    $(".child_"+parentId).each(function(){
	        hideChilds($(this).attr('id').replace(/^tr_/,''));
	        $(this).hide();
	    });
	}
	
	//calendars
	$(".wpDatePickerOption").datepicker( { inline : true, duration : 0 , showOn : 'both'} );
	
	//color pickers
	$(".wpColorPickerOption").ColorPicker({
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
});
