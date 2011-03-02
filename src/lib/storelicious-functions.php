<?php


function get_directory_files($path, $mask)
{
	$results = array();
	$handler = opendir($path);
	while ($file = readdir($handler))
	{
		if ($file != "." && $file != "..")
		{
			$results[] = $file;
		}
	}
	return array_combine($results,$results);
}
