
(function($){ 
    $.fn.extend({ 
	
	//stGallery
		storeliciousGallery: function() {
			var mainCont = this;
			mainCont.find("ul.thumbs a").click(function(){
				var largePath = $(this).attr("href");
				var largeAlt = $(this).attr("title");
				mainCont.find("img.medImg").attr({ src: largePath, alt: largeAlt });
				mainCont.find("span.desc").html(" (" + largeAlt + ")"); 
				return false;
			});

		},
	
	//accordion
		storeliciousAccordion: function() {
			
			var mainCont = this;
			mainCont.children('.accordion-container').hide(); //Hide/close all containers
			mainCont.children('.accordion-handler:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container

			//On Click
			mainCont.children('.accordion-handler').click(function(){
			if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
				mainCont.children('.accordion-handler').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
				$(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
			}
			return false; //Prevent the browser jump to the link anchor
		});

		},
	//toolTips
		
		storeliciousTooltips: function() {
			
			var mainCont = this;
			
			this.hover(function() {
				
				mainCont.find('.stTooltip-container').animate({ opacity: 'show', bottom: '25px' }, 200);
				
			}, function() {
				
				mainCont.find('.stTooltip-container').animate({ opacity: 'hide', bottom: '35px' }, 400);
			});
			
		},
	
		//slideimage
		
		storeliciousSlideImage: function() {
			
			var mainCont = this;
			
			this.hover(function() {
				
				mainCont.children('.stImgSlide img').stop().animate({top: '-130px', opacity: 1 }, 1200, 'easeInOutBack');
				
			}, function() {
				
				mainCont.children('.stImgSlide img').stop().animate({top: '-10px', opacity: 1 }, 1200, 'easeOutBounce');
				
			});
			
		},
		
		//toggle
		storeliciousToggle: function() {
			
			//main container
			var mainCont = this;
			
			
			if(mainCont.attr('class') == 'storeliciousToggle-open') { mainCont.children('.toggle-content').css({ 'display': 'block' }) }
			
			//when clicked
			mainCont.children('.toggle-handler').click(function() {
				
				if(mainCont.children('.toggle-content').css('display') == 'none') {
					
					mainCont.removeClass('storeliciousToggle-closed').addClass('storeliciousToggle-open');
					mainCont.children('.toggle-content').slideDown(200);
					
				} else {
					
					mainCont.children('.toggle-content').slideUp(200);
					mainCont.removeClass('storeliciousToggle-open').addClass('storeliciousToggle-closed');
					
				}
				
			});
			
		},	
		//notification
		closeNotification: function() {
			var mainCont = this;
			this.children('span.close').click(function() {
				mainCont.slideUp(300);
			});
		},
		//tabs
		
		storeliciousTabs: function() {
			
			//main container
			var mainCont = this;
			
			//categorizes our tabs
			var i = 1;
			mainCont.children('.tabNavigation').children('li').each(function() {
				
				jQuery(this).addClass('tab_'+i);
				i++;
				
			});
			
			//categorizes our tabbed
			var i = 1;
			mainCont.children('.tabbedInner').children('div').each(function() {
				
				jQuery(this).addClass('tabbed_'+i);
				i++;
				
			});
			
			//set up the current tab and tabbed
			mainCont.children('.tabNavigation').children('li:first').addClass('current');
			mainCont.children('.tabbedInner').children('div:first').addClass('current');
			
			//when user clicks a tab
			mainCont.children('.tabNavigation').children('li').click(function() {
				
				var tempClass = jQuery(this).attr('class').split(' ');
				
				if(tempClass[1] != 'current') {
					
					var myClass = tempClass[0].split('_');
					
					//removes the current
					mainCont.children('.tabbedInner').children('div.current').removeClass('current');
					mainCont.children('.tabNavigation').children('li.current').removeClass('current');
					
					//adds a new current
					mainCont.children('.tabbedInner').children('div.tabbed_'+myClass[1]).addClass('current');
					mainCont.children('.tabNavigation').children('li.tab_'+myClass[1]).addClass('current');
					
				}
				return false;
				
			});
			
		}
		
	
	});
	
})(jQuery);