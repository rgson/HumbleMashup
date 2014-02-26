<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('CACHE',		__DIR__ . '/cache');

define('METACRITICKEY', '06gKR0eT24azSMNO4dHuhSMuWIimdGyL');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
