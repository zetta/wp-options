<?php
/*
title: Get more Storelicious Themes
menu_title: Get more themes
slug: buy
order:1
 */
 
$xml = simplexml_load_file("http://feeds.feedburner.com/StoreliciousThemes?format=xml");
  
?>

<div id='storelicious-page-outer' class='st'>
  <div id='st-body' class='container_12'>
    <h1>Comprar mas temas</h1>
    <br />
    <?php foreach($xml->channel->item as $item): ?>
    	<?php echo $item->description ?>
    	<hr class="dotted" />
    <?php endforeach; ?>
  </div>
</div>
