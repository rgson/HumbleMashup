<?php

class Steam {

	// Stub
	// TODO: Scrape ID from Steam search.
	public static function getAppId($title) {
	
		return 3910;	
		
	}
	
	public static function getPicture($appid) {
		
		return "http://cdn4.steampowered.com/v/gfx/apps/$appid/header.jpg";
		
	}
	
	public static function getURL($appid) {
	
		return "http://store.steampowered.com/app/$appid/";
	
	}
	
	// Stub
	// TODO: Search user's Steam library for game with ID "appid".
	public static function ownedBy($appid, $steamid, $apikey) {
	
		return false;
	
	}

}

?>
