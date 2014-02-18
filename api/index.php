<?php
require 'config.php';

if(!isset($_GET['method']))
	http_response(400);
	
$method = strtolower($_GET['method']);

switch($method) {

	case 'getbundles':
		
		if(isset($_GET['steamid']) && !isset($_GET['steamkey']))
			http_response(401);

		API::getBundles($_GET['steamkey'], $_GET['steamid']);		
		
		break;
		
	default:
		http_response(400);
		
}

function http_response($code) {

	http_response_code($code);
	echo(http_response_code());
	die;
	
}

?>
