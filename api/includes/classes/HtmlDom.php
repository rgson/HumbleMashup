<?php

class HtmlDom extends DOMDocument {
	
	public function loadHTMLfromURL($url) {
	
		$html = file_get_contents($url);
		libxml_use_internal_errors(true);
		
		if(empty($html))
			throw new Exception("Could not get URL content.");
		
		$this->loadHTML($html);
		libxml_clear_errors();
		
	}
	
	public function getElementsByClass($class) {
	
		$xpath = new DOMXPath($this);
		return $xpath->query("//*[@class='$class']");
	
	}
	
}

?>
