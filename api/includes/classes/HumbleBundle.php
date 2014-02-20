<?php

class HumbleBundle {

	// Stub
	// TODO: Scrape Bundle info from Humble Bundle's website (regular and weekly bundles).
	
	/*
	public static function getBundle($url) {
		
		return array(
			
			'title' => 'The Humble Sid Meier Bundle',
			'picture' => 'https://humblebundle-a.akamaihd.net/static/hashed/07c4d0d64f50d134ea0b32bcac67fd644fe96ab5.svg',
			'url' => 'https://www.humblebundle.com/',
			'games' => array(
			
				array(
					
					'title' => 'Sid Meier\'s Civilization III Complete',
					'price' => 1.0,
					'score' => null,
					'appid' => null,
					'picture' => null,
					'url' => null,
					'owned' => null
					
				)
			
			)
				
		);
		
	}
	*/

	public static function getBundle($url) {
		
		$dom = new HtmlDom();
		$dom->loadHTMLfromURL($url);
		
		$bundle = new Bundle();
		$bundle->title = self::getBundleTitle($dom);
		$bundle->picture = self::getBundlePicture($dom);
		$bundle->games = self::getBundleGames($dom);
		
		return $bundle;
		
	}
	
	public static function getBundleTitle($dom) {
	
		$logo = $dom->getElementsByClass('bundle-logo')->item(0);
		$img = $logo->getElementsByTagName('img')->item(0);
		$title = $img->attributes->getNamedItem('alt')->nodeValue;
		
		return $title;
	
	}
	
	public static function getBundlePicture($dom) {
	
		$logo = $dom->getElementsByClass('bundle-logo')->item(0);
		$img = $logo->getElementsByTagName('img')->item(0);
		$picture = $img->attributes->getNamedItem('src')->nodeValue;
		
		return $picture;
	
	}
	
	//Stub
	//TODO Gather game titles.
	//Optional: Gather game price ("beat the average").
	public static function getBundleGames($dom) {
	
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
