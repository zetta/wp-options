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
 
$compare = version_compare($current_version, $latest_version);
 
 
?>
<div id='storelicious-page-outer' class='st'>
  <div id='st-body' class='container_12'>
	<h1><?= _s("Storelicious Framework Version") ?></h1>

		<ul>
			<li><?= _s("Instaled Version") ?>: <?php echo $current_version ?></li>
			<li><?= _s("Latest Version") ?>: <?php echo $latest_version ?></li>
		</ul>

<p><strong>
		<?php if( -1 === $compare ): ?>
			<?= _s("You are running a lower version") ?>
		<?php elseif( 0 === $compare ): ?>
			<?= _s("You are running the latest version") ?>
		<?php elseif( 1 === $compare ): ?>
			<?= _s("Oh my!! you are running a greater version") ?>
		<?php endif; ?>
</strong></p>

	</div>
</div>



