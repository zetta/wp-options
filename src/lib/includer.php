<?php 


/**
 * Checamos que la version de php sea la adecuada
 */
if (version_compare(PHP_VERSION, '5.0.0', '<')) 
    include_once 'php-compat/WpOptions.php';
else
    include_once 'php/WpOptions.php';
