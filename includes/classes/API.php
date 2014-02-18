<?php

class API {

	private static function output($json) {
	
		header('Content-type: application/json; charset=utf-8');
		header('Connection: close');
		
		echo $json;
	
	}
	
	public static function getBundles($steamkey = null, $steamid = null) {
	
			$steamEnabled = isset($steamkey) && isset($steamid);
		
			$bundles = HumbleBundle::getBundles();
			
			foreach($bundles as $bundle) {
				foreach($bundle->games as $game) {
					
					$game->score = GiantBomb::getScore($game->title);
					$game->appid = Steam::getAppId($game->title);
					$game->picture = Steam::getPicture($game->appid);
					
					if($steamEnabled)
						$game->owned = Steam::ownedBy($game->appid, $steamid, $steamkey);
				}
			}
			
			$response = array(
				'user' => $steamid,
				'bundles' => $bundles
			);
			
			$json = json_encode($response);
			
			self::output($json);		
	}
	
}


?>
