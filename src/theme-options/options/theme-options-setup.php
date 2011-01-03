<?php

$options = array();
$options[] = wpo_tab("Basic Types");
$options[] = wpo_string('string','this is the default string...','String','You can store strings in this option');
$options[] = wpo_text('text','default text','Text','Here you can store large text');
$options[] = wpo_boolean('boolean1',false,'Boolean','True or False');
$options[] = wpo_boolean('boolean2',true,'Boolean');
$options[] = wpo_number('number',10,'Number');
$options[] = wpo_check('check',true,'Check','Toggle Option');





setup_options(
	'http://www.manual-url.com',
	'http://www.forum-url.com',
	'http://www.theme-url.com',
	$options
);
