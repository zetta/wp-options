<?php

include "wpo-options.php";

global $pagenow;
$_wpo = array();

/**
 * main actions
 */
add_action('admin_menu', 'add_theme_options_page');

load_theme_textdomain('storelicious',get_template_directory().'/lang');
if (($pagenow == 'admin.php') && ($_GET['page'] == 'WpOptions.php'))
{
    add_action('admin_head', 'add_theme_options_meta');
}

function _s($string, $namespace = 'storelicious')
{
    return __($string,$namespace);
}


function setup_options($theme_name, $manual_url, $forum_url, $options)
{
	
	
	
	
}



function add_theme_options_page()
{
    if(function_exists('add_object_page'))
    {
        add_object_page(_s('Configure ') . get_template(), get_template(), 'edit_themes', basename(__FILE__),  'render_options_page',  get_bloginfo('template_url').'/theme-options/pix/storelicious.png');
    }
    else
    {
        add_menu_page(_s('Configure ') . get_template(), get_template(), 'edit_themes', basename(__FILE__),  'render_options_page',  get_bloginfo('template_url').'/theme-options/pix/storelicious.png');
    }
    /*
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


function render_options_page()
{
	echo "hola mundo =)";
}

function add_theme_options_meta()
{
}




function get_theme_option()
{
}

function set_theme_option()
{
}




