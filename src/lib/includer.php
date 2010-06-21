<?php 
load_theme_textdomain('storelicious',get_template_directory().'/lang');

/**
 * Checamos que la version de php sea la adecuada
 */
if (version_compare(PHP_VERSION, '5.0.0', '<')) 
    include_once 'php-compat/WpOptions.php';
else
    include_once 'php/WpOptions.php';

/**
 *  localization function 
 */
function _s($string, $namespace = 'storelicious')
{
    return __($string,$namespace);
}

if (!defined('WP_OPTIONS_VERSION'))  define('WP_OPTIONS_VERSION',1.1);

/**
 * pages
 */
include_once 'wp-options.pages.php';
