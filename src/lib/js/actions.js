jQuery(document).ready( function($) {
	
	//Parents
	$(".optionParent").change(function(){
			if( this.checked )
				$(".child_"+$(this).attr('id')).show();
			else
				$(".child_"+$(this).attr('id')).hide();
	});
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
