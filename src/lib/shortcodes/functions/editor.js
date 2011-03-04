var URL = null;
(function() {
	
	// Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack('storelicious_tinymce');
	// este requireLangPack no deja que funcionen los shortcodes en wp 3.1
	// es necesario mas documentacion para agregar de forma adecuada el langPack
	
	tinymce.create('tinymce.plugins.storelicious_tinymce', {	
		 
		 
		init : function(ed, url) {
		
			URL = url;
			
			// Register Gallery
			ed.addCommand('mce_storelicious_gallery', function() {
				ed.windowManager.open({
					file : url + '/popup/gallery.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 540 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Buttons
			ed.addCommand('mce_storelicious_buttons', function() {
				ed.windowManager.open({
					file : url + '/popup/buttons.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 375 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			
			// Register Links
			ed.addCommand('mce_storelicious_links', function() {
				ed.windowManager.open({
					file : url + '/popup/links.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 400 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Lists
			ed.addCommand('mce_storelicious_lists', function() {
				ed.windowManager.open({
					file : url + '/popup/lists.php',
					width : 360 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 275 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});

			// Register Tabs
			ed.addCommand('mce_storelicious_tabs', function() {
				ed.windowManager.open({
					file : url + '/popup/tabs.php',
					width : 450 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 220 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Slide
			ed.addCommand('mce_storelicious_slide', function() {
				ed.windowManager.open({
					file : url + '/popup/slide.php',
					width : 360 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 215 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Toggle
			ed.addCommand('mce_storelicious_toggle', function() {
				ed.windowManager.open({
					file : url + '/popup/toggle.php',
					width : 400 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 310 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Block
			ed.addCommand('mce_storelicious_block', function() {
				ed.windowManager.open({
					file : url + '/popup/block.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 430 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Accordion
			ed.addCommand('mce_storelicious_accordion', function() {
				ed.windowManager.open({
					file : url + '/popup/accordion.php',
					width : 450 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 215 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			// Register Toggle
			ed.addCommand('mce_storelicious_tooltip', function() {
				ed.windowManager.open({
					file : url + '/popup/tooltip.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 305 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			//Register Send To Twitter
			ed.addCommand('mce_storelicious_protected', function(){
               ed.windowManager.open({
					file : url + '/popup/protected.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 320 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
            });
			// Register Related Post
			ed.addCommand('mce_storelicious_related', function() {
				ed.windowManager.open({
					file : url + '/popup/related.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 320 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			
			// Register Notifications Boxes
			ed.addCommand('mce_storelicious_notifications', function() {
				ed.windowManager.open({
					file : url + '/popup/notifications.php',
					width : 500 + ed.getLang('storelicious_tinymce.delta_width', 0),
					height : 340 + ed.getLang('storelicious_tinymce.delta_height', 0),
					inline : 1
				});
			});
			
			
			// Register Author
			 ed.addCommand('mce_storelicious_author_info', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[author]');
            });
			//Register Alert Message
            ed.addCommand('mce_storelicious_alert', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[alert]' + selectedContent + '[/alert]');
            });
			//Register Info Message
			ed.addCommand('mce_storelicious_info', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[info]' + selectedContent + '[/info]');
            });
			//Register Note Message
			ed.addCommand('mce_storelicious_note', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[note]' + selectedContent + '[/note]');
            });
			//Register Help Message
			ed.addCommand('mce_storelicious_help', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[help]' + selectedContent + '[/help]');
            });
			//Register Success Message
			ed.addCommand('mce_storelicious_success', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[success]' + selectedContent + '[/success]');
            });
			//Register Error Message
			ed.addCommand('mce_storelicious_error', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[error]' + selectedContent + '[/error]');
            });
			//Register Down Message
			ed.addCommand('mce_storelicious_down', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[down]' + selectedContent + '[/down]');
            });
			//Register Up Message
			ed.addCommand('mce_storelicious_up', function(){
                selectedContent = tinyMCE.activeEditor.selection.getContent();
                tinyMCE.activeEditor.selection.setContent('[up]' + selectedContent + '[/up]');
            });
			
			//Register Send To Twitter
			ed.addCommand('mce_storelicious_send_twitter', function(){
                tinyMCE.activeEditor.selection.setContent('[twitter]');
            });
			/*////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////// STORELICIOUS BUTTONS IN TINYMCE /////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////*/
			// Register Gallery
			ed.addButton('storelicious_gallery', {
				title : 'Insert Gallery',
				cmd : 'mce_storelicious_gallery',
				image : url + '/icons/gallery.png'
			});
			// Register Buttons
			ed.addButton('storelicious_buttons', {
				title : 'Insert Button',
				cmd : 'mce_storelicious_buttons',
				image : url + '/icons/buttons.png'
			});
			// Register Links
			ed.addButton('storelicious_links', {
				title : 'Insert Link With Icon',
				cmd : 'mce_storelicious_links',
				image : url + '/icons/links.png'
			});
			// Register List 
			ed.addButton('storelicious_lists', {
				title : 'Insert Lists',
				cmd : 'mce_storelicious_lists',
				image : url + '/icons/lists.png'
			});
			
			// Register Tabs 
			ed.addButton('storelicious_tabs', {
				title : 'Insert Tabs',
				cmd : 'mce_storelicious_tabs',
				image : url + '/icons/tabs.png'
				
			});
			
			// Register Slide 
			ed.addButton('storelicious_slide', {
				title : 'Insert Image Slide',
				cmd : 'mce_storelicious_slide',
				image : url + '/icons/slide.png'
			});
			
			// Register Toggle 
			ed.addButton('storelicious_toggle', {
				title : 'Insert Toggle Content',
				cmd : 'mce_storelicious_toggle',
				image : url + '/icons/toggle.png'
			});
			
			// Register Block 
			ed.addButton('storelicious_block', {
				title : 'Insert Block Content',
				cmd : 'mce_storelicious_block',
				image : url + '/icons/block.png'
			});
			
			// Register Accordion 
			ed.addButton('storelicious_accordion', {
				title : 'Insert Accordion Content',
				cmd : 'mce_storelicious_accordion',
				image : url + '/icons/accordion.png'
			});
			
			// Register Tooltip 
			ed.addButton('storelicious_tooltip', {
				title : 'Insert ToolTip',
				cmd : 'mce_storelicious_tooltip',
				image : url + '/icons/tooltips.png'
			});
			
			// Related Posts
			ed.addButton('storelicious_related', {
				title : 'Insert Related Posts',
				cmd : 'mce_storelicious_related',
				image : url + '/icons/related.png'
			});
			
			// Notification Boxes
			ed.addButton('storelicious_notifications', {
				title : 'Insert Notification Box',
				cmd : 'mce_storelicious_notifications',
				image : url + '/icons/notifications.png'
			});
			
			//AUTHOR
			ed.addButton('storelicious_author', {
                title: 'Insert Author Information',
				cmd: 'mce_storelicious_author_info',
                image: url + '/icons/author.png'
            });
			//ALERT
			ed.addButton('storelicious_alert', {
                title: 'Insert Alert Message',
				cmd: 'mce_storelicious_alert',
                image: url + '/icons/alert.png'
            });
			//INFO
			ed.addButton('storelicious_info', {
                title: 'Insert Information Message',
				cmd: 'mce_storelicious_info',
                image: url + '/icons/info.png'
            });
			//NOTE
			ed.addButton('storelicious_note', {
                title: 'Insert Note Message',
				cmd: 'mce_storelicious_note',
                image: url + '/icons/note.png'
            });
			//HELP
			ed.addButton('storelicious_help', {
                title: 'Insert Help Message',
				cmd: 'mce_storelicious_help',
                image: url + '/icons/help.png'
            });
			//SUCCESS
			ed.addButton('storelicious_success', {
                title: 'Insert Success Message',
				cmd: 'mce_storelicious_success',
                image: url + '/icons/success.png'
            });
			//ERROR
			ed.addButton('storelicious_error', {
                title: 'Insert Error Message',
				cmd: 'mce_storelicious_error',
                image: url + '/icons/error.png'
            });
			//DOWN
			ed.addButton('storelicious_down', {
                title: 'Insert Arrow Down Message',
				cmd: 'mce_storelicious_down',
                image: url + '/icons/down.png'
            });
			//UP
			ed.addButton('storelicious_up', {
                title: 'Insert Arrow Up Message',
				cmd: 'mce_storelicious_up',
                image: url + '/icons/up.png'
            });
			//PROTECTED CONTENT
			ed.addButton('storelicious_protected', {
                title: 'Insert Protected Content',
				cmd: 'mce_storelicious_protected',
                image: url + '/icons/protected.png'
            });
			//SEND TO TWITTER
			ed.addButton('storelicious_send_twitter', {
                title: 'Insert Send to Twitter',
				cmd: 'mce_storelicious_send_twitter',
                image: url + '/icons/twitter.png'
            });
			
			
			
			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				//buttons
				cm.setActive('mce_storelicious_buttons', n.nodeName == 'IMG');
				//lints
				cm.setActive('mce_storelicious_links', n.nodeName == 'IMG');
				//lists
				cm.setActive('mce_storelicious_lists', n.nodeName == 'IMG');
				//tabs
				cm.setActive('mce_storelicious_tabs', n.nodeName == 'IMG');
				//slide
				cm.setActive('mce_storelicious_slide', n.nodeName == 'IMG');
				//toggle
				cm.setActive('mce_storelicious_toggle', n.nodeName == 'IMG');
				//accordion
				cm.setActive('mce_storelicious_accordion', n.nodeName == 'IMG');
				//related
				cm.setActive('mce_storelicious_related', n.nodeName == 'IMG');
				//notifications
				cm.setActive('mce_storelicious_notifications', n.nodeName == 'IMG');
				//author
				cm.setActive('mce_storelicious_author_info', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_alert', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_info', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_note', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_help', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_success', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_error', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_down', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_up', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_send_twitter', n.nodeName == 'IMG');
				cm.setActive('mce_storelicious_protected', n.nodeName == 'IMG');
				
			});
		}, 
		
		createControl : function(n, cm, url){
		 
		var sub
		var url = URL
		
        switch (n) {
            case 'storelicious_button':
				
                var c = cm.createMenuButton('storelicious_split_button', {
                    title : 'Storelicious Shortcodes Framework',
                    image : url + '/icons/storelicious.png',
					icons : false,
                    onclick : function() {
                    //    alert('© Storelicious 2010');
                    }
                });

                c.onRenderMenu.add(function(c, m) {
					
					
					m.add({title : 'Storelicious Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
                   m.add({title : 'Button', onclick : function() {
						tinyMCE.activeEditor.execCommand('mce_storelicious_buttons', false);
						 
					}});
					
					 m.add({title : 'Link with Icon', onclick : function() {
						tinyMCE.activeEditor.execCommand('mce_storelicious_links', false);
						 
					}});
					
					m.add({title : 'Unordered List', onclick : function() {
						tinyMCE.activeEditor.execCommand('mce_storelicious_lists', false);
					}});

					m.add({title : 'Toggle Content', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_toggle', false);
					}});
					
					m.add({title : 'Accordion', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_accordion', false);
					}});
					
					m.add({title : 'ToolTip', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_tooltip', false);
					}});
					
					m.add({title : 'Tabbed Content', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_tabs', false);
					}});
					
					m.add({title : 'Block Content', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_block', false);
					}});
					
					m.add({title : 'Image Gallery', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_gallery', false);
					}});
					
					m.add({title : 'Notification', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_notifications', false);
					}});
					
					m.add({title : 'Slide Image', onclick : function() {
							tinyMCE.activeEditor.execCommand('mce_storelicious_slide', false);
					}});
					
					

					sub = m.addMenu({title : 'Message'});

						sub.add({title : 'Note', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_note', false);
						}});
	
						sub.add({title : 'Alert', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_alert', false);
						}});
						
						sub.add({title : 'Information', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_info', false);
						}});
						
						sub.add({title : 'Help', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_help', false);
						}});
						
						sub.add({title : 'Arrow Up', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_up', false);
						}});
						
						sub.add({title : 'Arrow Down', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_down', false);
						}});
						
						sub.add({title : 'Error', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_error', false);
						}});
						
						sub.add({title : 'Success', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_success', false);
						}});
					
					
					sub = m.addMenu({title : 'Post Options'});
					
						sub.add({title : 'Protected Content', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_protected', false);
						}});

						sub.add({title : 'Related Post', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_related', false);
						}});
	
						sub.add({title : 'Author Information', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_author_info', false);
						}});
						
						
						sub.add({title : 'Send to Twitter', onclick : function() {
								tinyMCE.activeEditor.execCommand('mce_storelicious_send_twitter', false);
						}});
						
						
						
					
                });

              // Return the new splitbutton instance
              return c;
			  

        }
            return null;
			
        },
		
		
		
		
		getInfo : function() {
			
			return {
				
					longname : "Storelicious Shortcodes",
					author : 'Storelicious',
					authorurl : 'http://storelicious.com/',
					infourl : 'http://storelicious.com/',
					version : "0.1"
					
			};
			
		}
		
	});

	// Register plugin
	tinymce.PluginManager.add('storelicious_buttons', tinymce.plugins.storelicious_tinymce);
	
})();
