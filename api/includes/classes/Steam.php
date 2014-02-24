<?php

class Steam {

	public static function getAppId($title) {
	
		$term = rawurlencode($title);
		$url = "http://store.steampowered.com/search/?category1=998&term=$term";
		
		$dom = new HtmlDom($url);
		
		$result = $dom->query("//a[@class='search_result_row even']/@href");
		
		if ($result->length === 0)	// no matches found
			return null;
		
		$appurl = $result->item(0)->nodeValue;
		
		$pattern = '%http://store\.steampowered\.com/app/(\d+)/%';
		$matches = array();
		preg_match($pattern, $appurl, $matches);
		
		return $matches[1];	// appid
		
	}
	
	public static function getPicture($appid) {
		
		return "http://cdn4.steampowered.com/v/gfx/apps/$appid/header.jpg";
		
	}
	
	public static function getURL($appid) {
	
		return "http://store.steampowered.com/app/$appid/";
	
	}
	
	// Stub
	// TODO: Use Steam API to check user library for game with appid === $appid
	public static function ownedBy($appid, $steamid, $apikey) {
	
		return null;
	
	}

}

?>
