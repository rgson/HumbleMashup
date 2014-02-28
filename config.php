<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('PAGES',		INCLUDES . '/pages');

define('STEAMKEY', '05CBD4592CDA76D1C8550C4BD74DDBC6');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
