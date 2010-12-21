<?php

setup_options(
	'http://www.manualurl.com',
	'http://www.forumurl.com',
	array(
		wpo_tab("Basic Types"),
		  wpo_string('string','this is the default string...','String','You can store strings in this option'),
		  wpo_text('text','default text','Text','Here you can store large text'),
		  wpo_boolean('boolean1',false,'Boolean','True or False'),
		  wpo_boolean('boolean2',true,'Boolean'),
		  wpo_number('number',10,'Number'),
		  wpo_check('check',true,'Check','Toggle Option')
	)
);
