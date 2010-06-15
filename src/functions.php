<?php
/**
 * Dont remove this, this include must be at top of the functions.php file
 */
include_once 'lib/includer.php';

//basic theme info, you MUST modify this information
$wpOptions = new WpOptions($wp_version,$wpdb,get_bloginfo('template_url').'/lib/pix/storelicious.png');
$wpOptions->setThemeName('wp-options');
$wpOptions->addCSS('options');
$wpOptions->setManualUrl('http://google.com');
$wpOptions->setForumUrl('http://www.google.com');


/*Begin Basic types*/
$wpOptions->addTitle('Basic Types');
$wpOptions->addStringOption('string','this is the default string...','String','You can store strings in this option');
$wpOptions->addTextOption('text','default text','Text','Here you can store large text');
$wpOptions->addBooleanOption('boolean1',false,'Boolean','True or False');
$wpOptions->addBooleanOption('boolean2',true,'Boolean');
$wpOptions->addNumberOption('number',10,'Number');
$wpOptions->addCheckOption('check',true,'Check','Toggle Option');


$wpOptions->addSubpage('subpage title','my subpage','subpage-slug','subpage_demo_function');




/*Begin complex types*/
$wpOptions->addTitle('Complex Types');

$options = array(
    "Arial (Helvetica, sans serif)"                     => "<strong>Arial</strong> (Helvetica, sans serif)",
    "'Courier New' (Courier, monospace)"                => "<strong>Courier New</strong> (Courier, monospace)",
    "Georgia (Times, serif)"                            => "<strong>Georgia</strong> (Times, serif)",
    "'Lucida Console' (Monaco, monospace)"              => "<strong>Lucida Console</strong> (Monaco, monospace)",
    "'Lucida Sans Unicode' (Lucida Grande, sans serif)" => "<strong>Lucida Sans Unicode</strong> (Lucida Grande, sans serif)",
    "Tahoma (Geneva, sans serif)"                       => "<strong>Tahoma</strong> (Geneva, sans serif)",
    "'Times New Roman' (Times, serif)"                  => "<strong>Times New Roman</strong> (Times, serif)",
    "'Trebuchet MS' (Helvetica, sans serif)"            => "<strong>Trebuchet MS</strong> (Helvetica, sans serif)",
    "Verdana (Geneva, sans serif)"                      => "<strong>Verdana</strong> (Geneva, sans serif)"
);
$wpOptions->addRadioOption('font',$options,'Georgia (Times, serif)','Radio Buttons','Select one font family');

$colors = array(
    'blue'   => 'Blue',
    'red'    => 'Red',
    'green'  => 'Green',
    'orange' => 'Orange',
    'yellow' => 'Yellow'
);
$wpOptions->addCheckBoxOption('checkbox',$colors,array('orange','green'),'CheckBox','Select colors');

$fontSize = array(
    '10px' => '10px',
    '11px' => '11px',
    '12px' => '12px',
    '13px' => '13px',
    '14px' => '14px',
    '15px' => '15px'
);
$wpOptions->addSelectOption('select',$fontSize,'13px','Select','Select the font size');
$wpOptions->addMultipleSelectOption('multipleSelect',$fontSize,array('13px','11px'),'Multiple Select','Select one or more font sizes');



/* Begin Wordpress types */
$wpOptions->addTitle('WordPress Types');
$wpOptions->addSelectCategoriesOption('categorySelector',0,false,'WordPress Categories','Select a category');
$wpOptions->addSelectCategoriesOption('multipleCategorySelector',array(),true,'WordPress Categories');

$wpOptions->addSelectPagesOption('pageSelector',0,false,'WordPress Pages','Select a page');
$wpOptions->addSelectPagesOption('multiplePageSelector',array(),true,'WordPress Pages','Select a page');

$wpOptions->addSelectUsersOption('userSelector',0,false,'WordPress Users');
$wpOptions->addSelectUsersOption('multipleUserSelector',array(),true,'WordPress Users');

$wpOptions->addSelectTagsOption('tagSelector',0,false,'WordPress Tags');
$wpOptions->addSelectTagsOption('multipleTagSelector',array(),true,'WordPress Tags');


/* Begin CoolTypes */
$wpOptions->addTitle('CoolTypes');
$wpOptions->addDatePickerOption('myDate',date('m/d/Y'),'Select a date','You can control dates');
$wpOptions->addColorPickerOption('myColor','ffdd00','Select color','you can store colors');
$wpOptions->addSliderOption('mySlider',6,10,0,2,'Select quantity','You can slide this');


/* Begin Conditional option types */
$wpOptions->addTitle('Conditional');
$wpOptions->addStringOption('flickrName','MyName','Flickr Name');
$wpOptions->addNumberOption('FlickrID',0,'Flickr Number');
$wpOptions->addCheckOption('viewFlickr',false,'View Flickr');

$wpOptions->setConditionalOptions('viewFlickr',array('flickrName','FlickrID'));


$wpOptions->addStringOption('testa','Test','Test A');
$wpOptions->addStringOption('testb','Test','Test B');
$wpOptions->addCheckOption('testcheck',false,'View Test A');
$wpOptions->addCheckOption('testbcheck',false,'View Test B');
$wpOptions->setConditionalOptions('testcheck',array('testa','testbcheck'));
$wpOptions->setConditionalOptions('testbcheck',array('testb'));



/* Begin metabox */
$wpOptions->addMetaBox('string',false);
$wpOptions->addMetaBoxes(array('text','number','check','select'),false);

$wpOptions->addCheckOption('paraMostrar',false,'Mostrar Campo Google','Cheque esta opción si usted quiere que en el formulario del post aparezca un campo para guardar un dato raro =)');
$wpOptions->addStringOption('GoogleOption','','Google Option');
$wpOptions->addConditionalMetaBox('GoogleOption','paraMostrar',true);


$wpOptions->addStringOption('time','1','Time','esta deberia actualizarse');
$wpOptions->setOptionValue('time',time());

/**
 * Subpage demo function 
 * used in $wpOptions->addSubpage();
 */
function subpage_demo_function()
{
    
    
    ?>
    <p><strong>Hello world</strong></p>
        <p>String : <?php echo var_dump(getWpThemeOption('string')) ?></p>
        <p>Slide : <?php echo var_dump(getWpThemeOption('mySlider')) ?></p>
        <p>Color : <?php echo var_dump(getWpThemeOption('myColor')) ?></p>
        <p>Date : <?php echo var_dump(getWpThemeOption('myDate')) ?></p>
        <hr />
        
        <p>Categories : <?php echo var_dump(getWpThemeOption('multipleCategorySelector')) ?></p>
    <?php
}

/**
 * Dont remove this, this include must be at bottom of the functions.php file
 */
include_once 'lib/baseFunctions.php';

