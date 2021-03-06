<?php

if(!defined('THEME_OPTIONS_ROOT'))
    define('THEME_OPTIONS_ROOT',dirname(__FILE__).'/');

include THEME_OPTIONS_ROOT."options/theme-options-view.php";
include THEME_OPTIONS_ROOT."options/theme-options-helpers.php";
include THEME_OPTIONS_ROOT."/storelicious-functions.php";
include THEME_OPTIONS_ROOT."/storelicious-includes.php";
include THEME_OPTIONS_ROOT."/shortcodes/init.php";

// Redirect to Theme Options after Activation

if (is_admin() && isset($_GET['activated'] ) && "themes.php" == $pagenow) {
    header( 'Location: '.admin_url().'admin.php?page=storelicious' ) ;
}

global $_wpo;
$_wpo = array();

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
        add_object_page(_s('Configure ') . $_wpo['name'], $_wpo['name'], 'edit_themes', 'storelicious',  'render_options_page',  $_wpo['icon']);
    }
    else
    {
        add_menu_page(_s('Configure ') . $_wpo['name'], $_wpo['name'], 'edit_themes', 'storelicious',  'render_options_page',  $_wpo['icon']);
    }
    /*
    // TODO manager de las metabox
    if ($this->hasMetaBox())
    {
        add_meta_box('wpoptions_section', $this->themeName . ' :: '._s("Post Settings"), $this->getFunctionScope('renderMetaBox'), 'post', 'normal','high',array('type'=>'post'));
        add_meta_box('wpoptions_section', $this->themeName . ' :: '._s("Post Settings"), $this->getFunctionScope('renderMetaBox'), 'page', 'normal','high',array('type'=>'page'));
        add_action('save_post', $this->getFunctionScope('savePostData'));
    }*/
}

function add_theme_options_subpages()
{
	$path = THEME_OPTIONS_ROOT.'pages/';
	$pages = get_directory_files($path, '.php$');
	$page_datas = array();
	foreach($pages as $page)
	{
		$headers = array('slug'=>'slug','title'=>'title','menu_title'=>'menu_title','order' => 'order');
		$page_datas[] = get_file_data($path.$page, $headers ) + array('page' => $page);
	}
	uasort($page_datas, create_function('$a,$b', 'return ($a["order"] < $b["order"]) ? -1 : 1;'));
	foreach($page_datas as $data)
	{
		add_submenu_page('storelicious', _s( $data['title'] ), _s( $data['menu_title'] ), 'edit_themes', 'storelicious/'.$data['slug'], create_function('',"require_once '{$path}{$data['page']}';"));
	}
}


add_action('admin_menu', 'add_theme_options_page');
add_action('admin_menu', 'add_theme_options_subpages');


function setup_options($manual_url, $forum_url, $home_url, $options, $icon = null, $more = null)
{
	global $_wpo;
	$info = get_theme_data( get_template_directory().'/style.css' );
	$_wpo['name'] = $info['Name'];
	$_wpo['author'] = $info['Author'];
	$_wpo['more'] = $more ? $more : "http://storelicious.com/themes";
	$_wpo['version'] = $info['Version'];
	$_wpo['title'] = $info['Title'];
	$_wpo['manual'] = $manual_url;
	$_wpo['forum'] = $forum_url;
	$_wpo['home'] = $home_url;
	$_wpo['icon'] = $icon ? $icon : get_bloginfo('template_url').'/lib/assets/pix/panel/storelicious-icon.png';
	$_wpo['fversion'] = get_theme_options_version();
	$_wpo['options'] = $options;
}

function update_storelicious_options()
{
	global $_wpo;
	$updated = false;
	if (isset($_POST['storelicious_post']) && $_POST['storelicious_post'] == 'storelicious_post')
	{
		if (! wp_verify_nonce($_POST['_wpnonce'], 'update-wp-options') ) wp_die(_s("Security check"));
		foreach($_wpo['options'] as $key => $option)
		{
			if($option['type']=='tab') continue;
			if(is_array($option['type']))
			{
				foreach ($option['type'] as $child)
					update_storelicious_option($child);
			}
			else
				update_storelicious_option($option);
		}
		$updated = true;
	}
	return $updated;
}

/**
 * actualiza una storelicious-option (wp-option)
 */
function update_storelicious_option($option)
{
	$id = $option['id'];
	$value = (is_string($_POST[$id])) ? stripslashes($_POST[$id]) : $_POST[$id];
	if(!isset($_POST[$id]) && 'checkbox' == $option['type'])
	{
		$value = "false";
	}
	if('checkbox-multiple'==$option['type'])
	{
		$value = array_keys($value);
	}
	if('file' == $option['type'] || 'file-viewer' == $option['type'])
	{
		$file = $_FILES[$id];
		if($file['name'])
        {
            $info = wp_handle_upload($file, array('action' => 'update-wp-options'));
            if(isset($info['error'])) wp_die( $info['error'] );
            $value = $info['url'];
        }else
        {
            return;  // evitar que se nos borren las imagenes cuando no se selecciona un archivo
        }
	}
	update_option($id,$value);
}

function get_theme_options_version()
{
	$v = include THEME_OPTIONS_ROOT."storelicious-version.php";
	return 'stable'==$v[1] ? $v[0] : implode('-',$v);
}

/**
 * wrapper de get_option
 * es mas facil acceder a una llave de una opcion si se le indica el indice
 */
function get_theme_option($option_name, $index=null)
{
	$val = get_option($optiona_name);
	return is_null($index) ? $val : (
        !is_array($val) ? $val : (
            isset($val[$index]) ? $val[$index] : $val
        )
    );

}



