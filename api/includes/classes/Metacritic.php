<?php

class Metacritic {

	public static function getScore($title) {

		Unirest::verifyPeer(false);

		$response = Unirest::post(
		  "https://byroredux-metacritic.p.mashape.com/find/game",
		  array(
			"X-Mashape-Authorization" => METACRITICKEY
		  ),
		  array(
			"title" => $title,
			"platform" => 3
		  )
		);

		return (int)$response->body->result->score;
	
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
