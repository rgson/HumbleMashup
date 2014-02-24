<?php

class Steam {

	public static function getAppId($title) {
	
		$cached = self::checkCachedAppIds($title);
		if($cached)
			return $cached;
	
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
		$appid = $matches[1];
		
		self::saveToCache($title, $appid);
		return $appid;
		
	}
	
	private static function checkCachedAppIds($title) {
	
		$cache = json_decode(file_get_contents(CACHE . '/appid.json'), true);		
		if(array_key_exists($title, $cache))
			return $cache[$title];
		return false;
	
	}
	
	private static function saveToCache($title, $appid) {
	
		$cache = json_decode(file_get_contents(CACHE . '/appid.json'), true);
		$cache[$title] = $appid;
		file_put_contents(CACHE . '/appid.json', json_encode($cache));
	
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
