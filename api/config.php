<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('CACHE',		__DIR__ . '/cache');

define('GIANTBOMBKEY', '7e6bad86d2178c0c6e6eb5420334d5393557bee8');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
