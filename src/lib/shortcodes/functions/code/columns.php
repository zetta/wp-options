<?php

/*-------------------------------------------------------------- 
/*
/* STORELICIOUS COLUMNS
/*
/* Add columns to your content
/*
/* Usage:
/* [column width="$width" align="$align" marginleft="$marginleft" marginright="marginright"] $content [/column]
/*
-------------------------------------------------------------- */
add_shortcode('column', 'storelicious_column');
	function storelicious_column($atts, $content = null) {
		extract(shortcode_atts(array(
			'width'			=> 'width25',
			'align'			=> 'left',
			'marginleft'	=> '5',
			'marginright'	=> '5'
		
		), $atts));
		
		//ALIGN
		switch($align) {
			
			case 'left':
				$align = 'float-left';
				break;
			
			case 'right':
				$align = 'float-right';
				break;
			
			case 'none':
				$align = 'float-none';
				break;
		}
		
		//MARGIN RIGHT
		switch($marginright){
			
			case '0':
				$marginright = '';
				break;
				
			case '5':
				$marginright = 'rMrg5';
				break;
			
			case '6':
				$marginright = 'rMrg6';
				break;
			
			case '7':
				$marginright = 'rMrg7';
				break;
			
			case '8':
				$marginright = 'rMrg8';
				break;
			
			case '9':
				$marginright = 'rMrg9';
				break;
			
			case '10':
				$marginright = 'rMrg10';
				break;
				
			case '11':
				$marginright = 'rMrg11';
				break;
			
			case '12':
				$marginright = 'rMrg12';
				break;
			
			case '13':
				$marginright = 'rMrg13';
				break;
			
			case '14':
				$marginright = 'rMrg14';
				break;
			
			case '15':
				$marginright = 'rMrg15';
				break;
			
			case '16':
				$marginright = 'rMrg16';
				break;
			
			case '17':
				$marginright = 'rMrg17';
				break;
			
			case '18':
				$marginright = 'rMrg18';
				break;
			
			case '19':
				$marginright = 'rMrg19';
				break;
			
			case '20':
				$marginright = 'rMrg20';
				break;
				
			case '21':
				$marginright = 'rMrg21';
				break;
			
			case '22':
				$marginright = 'rMrg22';
				break;
			
			case '23':
				$marginright = 'rMrg23';
				break;
			
			case '24':
				$marginright = 'rMrg24';
				break;
			
			case '25':
				$marginright = 'rMrg25';
				break;
			
			case '26':
				$marginright = 'rMrg26';
				break;
			
			case '27':
				$marginright = 'rMrg27';
				break;
			
			case '28':
				$marginright = 'rMrg28';
				break;
			
			case '29':
				$marginright = 'rMrg29';
				break;
			
			case '30':
				$marginright = 'rMrg30';
				break;
			
			case '31':
				$marginright = 'rMrg31';
				break;
			
			case '32':
				$marginright = 'rMrg32';
				break;
			
			case '33':
				$marginright = 'rMrg33';
				break;
			
			case '34':
				$marginright = 'rMrg34';
				break;
			
			case '35':
				$marginright = 'rMrg35';
				break;
				
			case '36':
				$marginright = 'rMrg36';
				break;
			
			case '37':
				$marginright = 'rMrg37';
				break;
			
			case '38':
				$marginright = 'rMrg38';
				break;
			
			case '39':
				$marginright = 'rMrg39';
				break;
			
			case '40':
				$marginright = 'rMrg40';
				break;
			
			case '41':
				$marginright = 'rMrg41';
				break;
			
			case '42':
				$marginright = 'rMrg42';
				break;
			
			case '43':
				$marginright = 'rMrg43';
				break;
			
			case '44':
				$marginright = 'rMrg44';
				break;
			
			case '45':
				$marginright = 'rMrg45';
				break;
			
			case '46':
				$marginright = 'rMrg46';
				break;
			
			case '47':
				$marginright = 'rMrg47';
				break;
			
			case '48':
				$marginright = 'rMrg48';
				break;
			
			case '49':
				$marginright = 'rMrg49';
				break;
			
			case '50':
				$marginright = 'rMrg50';
				break;
		}
		//MARGIN LEFT
		switch($marginleft) {
			
			case '0':
				$marginleft = '';
				break;
				
			case '5':
				$marginleft = 'lMrg5';
				break;
			
			case '6':
				$marginleft = 'lMrg6';
				break;
			
			case '7':
				$marginleft = 'lMrg7';
				break;
			
			case '8':
				$marginleft = 'lMrg8';
				break;
			
			case '9':
				$marginleft = 'lMrg9';
				break;
			
			case '10':
				$marginleft = 'lMrg10';
				break;
				
			case '11':
				$marginleft = 'lMrg11';
				break;
			
			case '12':
				$marginleft = 'lMrg12';
				break;
			
			case '13':
				$marginleft = 'lMrg13';
				break;
			
			case '14':
				$marginleft = 'lMrg14';
				break;
			
			case '15':
				$marginleft = 'lMrg15';
				break;
			
			case '16':
				$marginleft = 'lMrg16';
				break;
			
			case '17':
				$marginleft = 'lMrg17';
				break;
			
			case '18':
				$marginleft = 'lMrg18';
				break;
			
			case '19':
				$marginleft = 'lMrg19';
				break;
			
			case '20':
				$marginleft = 'lMrg20';
				break;
				
			case '21':
				$marginleft = 'lMrg21';
				break;
			
			case '22':
				$marginleft = 'lMrg22';
				break;
			
			case '23':
				$marginleft = 'lMrg23';
				break;
			
			case '24':
				$marginleft = 'lMrg24';
				break;
			
			case '25':
				$marginleft = 'lMrg25';
				break;
			
			case '26':
				$marginleft = 'lMrg26';
				break;
			
			case '27':
				$marginleft = 'lMrg27';
				break;
			
			case '28':
				$marginleft = 'lMrg28';
				break;
			
			case '29':
				$marginleft = 'lMrg29';
				break;
			
			case '30':
				$marginleft = 'lMrg30';
				break;
			
			case '31':
				$marginleft = 'lMrg31';
				break;
			
			case '32':
				$marginleft = 'lMrg32';
				break;
			
			case '33':
				$marginleft = 'lMrg33';
				break;
			
			case '34':
				$marginleft = 'lMrg34';
				break;
			
			case '35':
				$marginleft = 'lMrg35';
				break;
				
			case '36':
				$marginleft = 'lMrg36';
				break;
			
			case '37':
				$marginleft = 'lMrg37';
				break;
			
			case '38':
				$marginleft = 'lMrg38';
				break;
			
			case '39':
				$marginleft = 'lMrg39';
				break;
			
			case '40':
				$marginleft = 'lMrg40';
				break;
			
			case '41':
				$marginleft = 'lMrg41';
				break;
			
			case '42':
				$marginleft = 'lMrg42';
				break;
			
			case '43':
				$marginleft = 'lMrg43';
				break;
			
			case '44':
				$marginleft = 'lMrg44';
				break;
			
			case '45':
				$marginleft = 'lMrg45';
				break;
			
			case '46':
				$marginleft = 'lMrg46';
				break;
			
			case '47':
				$marginleft = 'lMrg47';
				break;
			
			case '48':
				$marginleft = 'lMrg48';
				break;
			
			case '49':
				$marginleft = 'lMrg49';
				break;
			
			case '50':
				$marginleft = 'lMrg50';
				break;
			
			
		}
		//WIDTH
		switch($width) {
			
			case '0':
				$width = 'width100';
				break;
				
			case '1':
				$width = 'width1';
				break;
			
			case '2':
				$width = 'width2';
				break;
			
			case '3':
				$width = 'width3';
				break;
			
			case '4':
				$width = 'width4';
				break;
                			
            case '5':
				$width = 'width5';
				break;
			
			case '6':
				$width = 'width6';
				break;
			
			case '7':
				$width = 'width7';
				break;
			
			case '8':
				$width = 'width8';
				break;
			
			case '9':
				$width = 'width9';
				break;

			case '10':
				$width = 'width10';
				break;
			
			case '11':
				$width = 'width11';
				break;
			
			case '12':
				$width = 'width12';
				break;
			
			case '13':
				$width = 'width13';
				break;
			
			case '14':
				$width = 'width14';
				break;
                			
            case '15':
				$width = 'width15';
				break;
			
			case '16':
				$width = 'width16';
				break;
			
			case '17':
				$width = 'width17';
				break;
			
			case '18':
				$width = 'width18';
				break;
			
			case '19':
				$width = 'width19';
				break;
			
			case '20':
				$width = 'width20';
				break;
				
			case '21':
				$width = 'width21';
				break;
			
			case '22':
				$width = 'width22';
				break;
			
			case '23':
				$width = 'width23';
				break;
			
			case '24':
				$width = 'width24';
				break;
			
			case '25':
				$width = 'width25';
				break;
			
			case '26':
				$width = 'width26';
				break;
			
			case '27':
				$width = 'width27';
				break;
			
			case '28':
				$width = 'width28';
				break;
			
			case '29':
				$width = 'width29';
				break;
			
			case '30':
				$width = 'width30';
				break;
                
			case '31':
				$width = 'width31';
				break;
                
			case '32':
				$width = 'width32';
				break;
			
			case '33':
				$width = 'width33';
				break;
			
			case '34':
				$width = 'width34';
				break;
			
			case '35':
				$width = 'width35';
				break;
			
			case '36':
				$width = 'width36';
				break;
			
			case '37':
				$width = 'width37';
				break;
			
			case '38':
				$width = 'width38';
				break;
			
			case '39':
				$width = 'width39';
				break;
			
			case '40':
				$width = 'width40';
				break;
			
			case '41':
				$width = 'width41';
				break;
			
			case '42':
				$width = 'width42';
				break;
			
			case '43':
				$width = 'width43';
				break;
			
			case '44':
				$width = 'width44';
				break;
			
			case '45':
				$width = 'width45';
				break;
				
			case '46':
				$width = 'width46';
				break;
			
			case '47':
				$width = 'width47';
				break;
			
			case '48':
				$width = 'width48';
				break;
			
			case '49':
				$width = 'width49';
				break;
			
			case '50':
				$width = 'width50';
				break;
			
			case '51':
				$width = 'width51';
				break;
			
			case '52':
				$width = 'width52';
				break;
			
			case '53':
				$width = 'width53';
				break;
			
			case '54':
				$width = 'width54';
				break;
			
			case '55':
				$width = 'width55';
				break;
				
			case '56':
				$width = 'width56';
				break;
			
			case '57':
				$width = 'width57';
				break;
			
			case '58':
				$width = 'width58';
				break;
			
			case '59':
				$width = 'width59';
				break;		

			case '60':
				$width = 'width60';
				break;
			
			case '61':
				$width = 'width61';
				break;
			
			case '62':
				$width = 'width62';
				break;
			
			case '63':
				$width = 'width63';
				break;
			
			case '64':
				$width = 'width64';
				break;
			
			case '65':
				$width = 'width65';
				break;
				
			case '66':
				$width = 'width66';
				break;
			
			case '67':
				$width = 'width67';
				break;
			
			case '68':
				$width = 'width68';
				break;
			
			case '69':
				$width = 'width69';
				break;

			case '70':
				$width = 'width70';
				break;
			
			case '71':
				$width = 'width71';
				break;

			
			case '72':
				$width = 'width72';
				break;
			
			case '73':
				$width = 'width73';
				break;
			
			case '74':
				$width = 'width74';
				break;
			
			case '75':
				$width = 'width75';
				break;
				
			case '76':
				$width = 'width76';
				break;
			
			case '77':
				$width = 'width77';
				break;
			
			case '78':
				$width = 'width78';
				break;
			
			case '79':
				$width = 'width79';
				break;
                
			case '80':
				$width = 'width80';
				break;
			
			case '81':
				$width = 'width81';
				break;
			
			case '82':
				$width = 'width82';
				break;
			
			case '83':
				$width = 'width83';
				break;
			
			case '84':
				$width = 'width84';
				break;
			
			case '85':
				$width = 'width85';
				break;
				
			case '86':
				$width = 'width86';
				break;
			
			case '87':
				$width = 'width87';
				break;
			
			case '88':
				$width = 'width88';
				break;
			
			case '89':
				$width = 'width89';
				break;
            
			case '90':
				$width = 'width90';
				break;
			
			case '91':
				$width = 'width91';
				break;
			
			case '92':
				$width = 'width92';
				break;
			
			case '93':
				$width = 'width93';
				break;
			
			case '94':
				$width = 'width94';
				break;
			
			case '95':
				$width = 'width95';
				break;
				
			case '96':
				$width = 'width96';
				break;
			
			case '97':
				$width = 'width97';
				break;
			
			case '98':
				$width = 'width98';
				break;
			
			case '99':
				$width = 'width99';
				break;
            
            case '100':
				$width = 'width100';
				break;                                                	
				
		}
		//$content = preg_replace('#^<\/p>|<p>$#', '', $content);	
		//$content = preg_replace("/<p>/", " ", $content);	
		//$content = preg_replace("/<p><\/div>/", "aaaaaaa</div>", $content);	
		//$content = preg_replace("/<p><\/div>/", "/che cosa<\/div>/", $content);	
		//$content = preg_replace('#^<\/p>|$#', '', $content);
		//$content = preg_replace("/<br \/>/", " ", $content);
		//$content = preg_replace("/<p><\/div>/", " ", $content);
		//$content = str_replace('</p><p></div>', 'aaaaaaaaaa&lt;/div&gt;', $content);
		//$content = str_replace(array("\n", "\r", "\t", " "), '', $content);
		/*
		$content = preg_replace("/<br \/>/", "", $content);
		$content = str_replace('</p></div>', 'aaaaaaaaaa</div>', $content);
		$content = preg_replace("/<\/p><\/div>+/", "", $content);
		*/
		
		/*$content = storelicious_clean_html($content);*/
		
		return '<div class="stColumn clearfix '.$width.' '.$align.' '.$marginleft.' '.$marginright.'">'.do_shortcode($content).'</div>';
		
	}


?>