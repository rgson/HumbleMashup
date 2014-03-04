<?php

class Steam {

	private static $appids;

	public static function getAppId($title) {
	
		$cached = self::checkCachedAppids($title);
		if($cached !== false)
			return $cached;
	
		$term = rawurlencode($title);
		$url = "http://store.steampowered.com/search/?category1=998&term=$term";
		
		$dom = new HtmlDom($url);
		
		$result = $dom->query("//a[@class='search_result_row even']/@href");
		
		if ($result->length === 0) {	// no matches found
			$appid = null;
		} else {
			$appurl = $result->item(0)->nodeValue;
			$pattern = '%http://store\.steampowered\.com/app/(\d+)/%';
			$matches = array();
			preg_match($pattern, $appurl, $matches);
			$appid = $matches[1];
		}
		
		self::saveAppidToCache($title, $appid);
		return $appid;
		
	}
	
	private static function checkCachedAppids($title) {
	
		$cache = json_decode(file_get_contents(CACHE . '/appid.json'), true);		
		if(array_key_exists($title, $cache))
			return $cache[$title];
		return false;
	
	}
	
	private static function saveAppidToCache($title, $appid) {
	
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
	
	
	public static function ownedBy($appid, $steamid) {
	
		if(!isset(self::$appids)){

			$url = "http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=".STEAMKEY."&steamid=$steamid";

			$json = json_decode(file_get_contents($url), true);

			self::$appids = array();

			foreach ($json["response"]["games"] as $game) {

				self::$appids[$game["appid"]] = true;

			}
		}

		return array_key_exists($appid, self::$appids);
	}

}

?>
