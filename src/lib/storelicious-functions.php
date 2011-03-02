<?php


function get_directory_files($path, $mask=null)
{
	$results = array();
	$handler = opendir($path);
	while ($file = readdir($handler))
	{
		if ($file != "." && $file != "..")
		{
			if(isset($mask))
			{
				if (preg_match('/'.$mask.'/i', $file) )
					$results[] = $file;
			}
			else
				$results[] = $file;
		}
	}
	return array_combine($results,$results);
}
