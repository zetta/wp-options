<?php
/*
title: Verificar la version del framework
menu_title: Check Version
slug: version
order:4
 */
 
 
$file = file_get_contents('https://github.com/zetta/wp-options/raw/master/src/lib/storelicious-version.php');
$matches = array();
preg_match('/return (.*);/i', $file,$matches);
$array = $matches[1];
eval("\$array_version = {$array};");

$latest_version =  'stable'==$array_version[1] ? $array_version[0] : implode('-',$array_version);
$current_version = get_theme_options_version();
 
 
 
 
?>



<h1>Comparando Versiones</h1>


<ul>

	<li>Version Instalada: <?php echo $current_version ?></li>
	<li>Ultima Version: <?php echo $latest_version ?></li>
</ul>

