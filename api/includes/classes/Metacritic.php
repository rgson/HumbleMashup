<?php

class Metacritic {

	public static function getAppID($title) {

	}

	public static function getURL($appid) {
	
		return "http://www.metacritic.com/$platform/$name";
	
	}
}

?>

/*"result": {
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