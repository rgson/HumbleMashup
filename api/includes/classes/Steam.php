<?php

class Steam {

	// Stub
	// TODO: Scrape ID from Steam search page.
	public static function getAppId($title) {
	
		return null;	
		
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
