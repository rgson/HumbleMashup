<?php
define('HOME',		'http://' . $_SERVER['HTTP_HOST'] . '/humblemashup/');

define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('PAGES',		INCLUDES . '/pages');
define('RESOURCES',	__DIR__ . '/resources');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
