<?php
define('INCLUDES',	__DIR__ . '/includes');
define('CLASSES',	INCLUDES . '/classes');
define('CACHE',		__DIR__ . '/cache');

define('MASHAPEKEY',	'06gKR0eT24azSMNO4dHuhSMuWIimdGyL');
define('STEAMKEY', '05CBD4592CDA76D1C8550C4BD74DDBC6');

function __autoload($class)
{
	require CLASSES."/$class.php";
}
?>
