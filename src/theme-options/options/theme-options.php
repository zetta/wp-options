<?php

include "../includes/wpo-options.php";
include "theme-options-view.php";


global $_wpo;
$wpo = array();

/**
 * main actions
 */


load_theme_textdomain('storelicious',get_template_directory().'/lang');
function _s($string, $namespace = 'storelicious')
{
    return __($string,$namespace);
}


function add_theme_options_page()
{
	global $_wpo;
    if(function_exists('add_object_page'))
    {
        add_object_page(_s('Configure ') . $_wpo['name'], $_wpo['name'], 'edit_themes', basename(__FILE__),  'render_options_page',  $_wpo['icon']);
    }
    else
    {
        add_menu_page(_s('Configure ') . $_wpo['name'], $_wpo['name'], 'edit_themes', basename(__FILE__),  'render_options_page',  $_wpo['icon']);
    }
    /*
    // todo manager de las metabox
    foreach($this->subpages as $sub)
    {
        add_submenu_page(basename(__FILE__), _s($sub['pageTitle']), _s($sub['title']), 'edit_themes', $sub['slug'], $sub['function']);
    }
    
    if ($this->hasMetaBox())
    {
        add_meta_box('wpoptions_section', $this->themeName . ' :: '._s("Post Settings"), $this->getFunctionScope('renderMetaBox'), 'post', 'normal','high',array('type'=>'post'));
        add_meta_box('wpoptions_section', $this->themeName . ' :: '._s("Post Settings"), $this->getFunctionScope('renderMetaBox'), 'page', 'normal','high',array('type'=>'page'));
        add_action('save_post', $this->getFunctionScope('savePostData'));
    }*/
}
add_action('admin_menu', 'add_theme_options_page');


function setup_options($manual_url, $forum_url, $options, $icon = null)
{
	global $_wpo;
	$info = get_theme_data( get_template_directory().'/style.css' );
	$_wpo['name'] = $info['Name'];
	$_wpo['author'] = $info['Author'];
	$_wpo['version'] = $info['Version'];
	$_wpo['title'] = $info['Title'];
	$_wpo['manual'] = $manual_url;
	$_wpo['forum'] = $forum_url;
	$_wpo['icon'] = $icon ? $icon : get_bloginfo('template_url').'/theme-options/pix/storelicious.png';
	$_wpo['options'] = $options;
	
	/*
	Name] => 
    [URI] => 
    [Description] => 
    [Author] => Anonymous
    [AuthorURI] => 
    [Version] => 
    [Template] => 
    [Status] => publish
    [Tags] => Array
        (
        )

    [Title] => 
    [AuthorName] => Anonymous
	
	*/
}


function get_theme_option()
{
}

function set_theme_option()
{
}




