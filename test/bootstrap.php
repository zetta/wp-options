<?php


if (!defined('WP_INSTALATION'))
{
    define ("WP_INSTALATION",'/var/www/wordpress');
    set_include_path(get_include_path() . PATH_SEPARATOR . WP_INSTALATION);
    require_once "wp-config.php";
}


