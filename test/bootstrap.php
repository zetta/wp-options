<?php


if (!defined('WP_INSTALATION'))
{
    define ("WP_INSTALATION",'/var/www/wordpress/');
    set_include_path(get_include_path() . PATH_SEPARATOR . WP_INSTALATION);
    
    $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
    require_once "wp-config.php";
    //error_reporting(-1);
}


