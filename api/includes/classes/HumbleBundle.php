<?php

class HumbleBundle {

	// --- Regular bundle
	
	public static function getHumbleBundle() {
		
		$url = 'https://www.humblebundle.com';
		
		$dom = new HtmlDom();
		
		try {
			$dom->loadHTMLfromURL($url);
		} catch (Exception $e) {
			APIOutput::http_response(504, "No response from '$url'.");
		}
		
		$bundle = new Bundle();
		$bundle->title = self::getHumbleBundleTitle($dom);
		$bundle->picture = self::getHumbleBundlePicture($dom);
		$bundle->games = self::getHumbleBundleGames($dom);
		
		return $bundle;
		
	}
	
	private static function getHumbleBundleTitle($dom) {
	
		$title = $dom->getElementsByTagName('title')->item(0)->nodeValue;
		$title = trim($title);
		
		$filter = ' (pay what you want and help charity)';
		$pos = strpos($title, $filter);
		if($pos)
			$title = substr($title, 0, $pos);
		
		return $title;
	
	}
	
	private static function getHumbleBundlePicture($dom) {
	
		$logo = $dom->getElementsByClass('bundle-logo')->item(0);
		$img = $logo->getElementsByTagName('img')->item(0);
		$picture = $img->attributes->getNamedItem('src')->nodeValue;
		
		return $picture;
	
	}
	
	//Stub
	//TODO Gather game titles.
	//Optional: Gather game price ("beat the average").
	private static function getHumbleBundleGames($dom) {
	
		//<span class="item-title">
		
		return array(
				
			array(
				
				'title' => 'Sid Meier\'s Civilization III Complete',
				'price' => 1.0,
				'score' => null,
				'appid' => null,
				'picture' => null,
				'url' => null,
				'owned' => null
				
			)
		
		);
	
	}
	
	// --- Weekly bundle
	
	public static function getWeeklyBundle() {
		
		$url = 'https://www.humblebundle.com/weekly';
		
		$dom = new HtmlDom();
		
		try {
			$dom->loadHTMLfromURL($url);
		} catch (Exception $e) {
			APIOutput::http_response(504, "No response from '$url'.");
		}
		
		$bundle = new Bundle();
		$bundle->title = self::getWeeklyBundleTitle($dom);
		$bundle->picture = self::getWeeklyBundlePicture($dom);
		$bundle->games = self::getWeeklyBundleGames($dom);
		
		return $bundle;
		
	}
	
	private static function getWeeklyBundleTitle($dom) {
	
		$title = $dom->getElementsByTagName('title')->item(0)->nodeValue;
		$title = trim($title);
		
		$filter = ' (pay what you want and help charity)';
		$pos = strpos($title, $filter);
		if($pos)
			$title = substr($title, 0, $pos);
		
		return $title;
	
	}
	
	private static function getWeeklyBundlePicture($css) {
	
		return 'https://humblebundle-a.akamaihd.net/static/hashed/ad817362b6a5b20a7521134200b0768383232ce9.svg';
	
	}
	
	//Stub
	//TODO Gather game titles.
	//Optional: Gather game price ("beat the average").
	private static function getWeeklyBundleGames($dom) {
	
		//<span class="item-title">
		
		return array(
				
			array(
				
				'title' => 'Sid Meier\'s Civilization III Complete',
				'price' => 1.0,
				'score' => null,
				'appid' => null,
				'picture' => null,
				'url' => null,
				'owned' => null
				
			)
		
		);
	
	}

}

?>
