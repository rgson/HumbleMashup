<?php

class Metacritic {

	public static function getScore($title) {
	
		$cached = self::checkCachedScore($title);
		if($cached !== false)
			return $cached;

		Unirest::verifyPeer(false);
		$response = Unirest::post(
		  "https://byroredux-metacritic.p.mashape.com/find/game",
		  array(
			"X-Mashape-Authorization" => MASHAPEKEY
		  ),
		  array(
			"title" => $title,
			"platform" => 3
		  )
		);
		
		if(!isset($response->body->result->score))
			$score = null;
		else
			$score = (int)$response->body->result->score;
		
		self::saveScoreToCache($title, $score);
		return $score;
	
	}
	
	private static function checkCachedScore($title) {
	
		$cache = json_decode(file_get_contents(CACHE . '/score.json'), true);		
		if(array_key_exists($title, $cache))
			return $cache[$title];
		return false;
	
	}
	
	private static function saveScoreToCache($title, $score) {
	
		$cache = json_decode(file_get_contents(CACHE . '/score.json'), true);
		$cache[$title] = $score;
		file_put_contents(CACHE . '/score.json', json_encode($cache));
	
	}
}

/*
"result": {
    "name": "The Elder Scrolls V: Skyrim",
    "score": "92",
    "rlsdate": "2011-11-11",
    "genre": "Role-Playing",
    "rating": "M",
    "platform": "PlayStation 3",
    "publisher": "Bethesda Softworks",
    "developer": "Bethesda Game Studios",
    "url": "http://www.metacritic.com/game/playstation-3/the-elder-scrolls-v-skyrim"
  }
}
*/

?>
