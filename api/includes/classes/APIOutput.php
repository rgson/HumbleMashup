<?php

class APIOutput {

	public function output($response) {

		header('Content-type: application/json; charset=utf-8');
		header('Connection: close');
		echo json_encode($response);

	}
	
	public function http_response($code, $msg) {
	
		http_response_code($code);
		self::output(array('success' => false, 'status' => $code, 'message' => $msg));
		die;
	
	}

}

?>
