<?php

class HtmlDom extends DOMXPath {
	
	public function __construct($url) {
	
		$html = file_get_contents($url);		
		libxml_use_internal_errors(true);
		
		if(empty($html))
			throw new Exception("Could not get URL content.");
		
		$dom = new DOMDocument();
		$dom->loadHTML($html);
		libxml_clear_errors();
		
		parent::__construct($dom);
		
	}
	
	/*
	public function getElementsByClass($class) {
	
		$xpath = new DOMXPath($this);
		return $xpath->query("//*[@class='$class']");
	
	}
	*/
	
}

?>
