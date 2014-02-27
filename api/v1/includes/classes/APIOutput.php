<?php

class APIOutput {

	public function output($output, $success = true) {

		$json = json_encode(array_merge(array('success' => $success), $output));
		header('Content-type: application/json; charset=utf-8');
		header('Connection: close');
		echo $json;

	}
	
	public function http_response($code, $msg) {
	
		http_response_code($code);
		self::output(array('status' => $code, 'message' => $msg), false);
		die;
	
	}

}

?>
