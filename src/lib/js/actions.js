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
	
	
});