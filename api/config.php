<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('CACHE',		__DIR__ . '/cache');

define('METACRITICKEY', '[put_production_key_here]');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
