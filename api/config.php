<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
