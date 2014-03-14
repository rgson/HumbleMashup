<?php

class HumbleBundle {

	// --- Regular bundle
	
	public static function getHumbleBundle() {
		
		$url = 'https://www.humblebundle.com';
		
		try {
			$dom = new HtmlDom($url);
		} catch (Exception $e) {
			APIOutput::http_response(504, "No response from '$url'.");
		}
		
		$bundle = new Bundle(
			self::getHumbleBundleTitle($dom),
			self::getHumbleBundlePicture($dom),
			$url,
			self::getHumbleBundleGames($dom)
		);
		
		return $bundle;
		
	}
	
	private static function getHumbleBundleTitle($dom) {
	
		$title = $dom->query("//title")->item(0)->nodeValue;
		$title = trim($title);
		
		$filter = ' (pay what you want and help charity)';
		$pos = strpos($title, $filter);
		if($pos)
			$title = substr($title, 0, $pos);
		
		return $title;
	
	}
	
	private static function getHumbleBundlePicture($dom) {
				
		$picture = $dom->query("//h1[@class='bundle-logo']/img/@src")->item(0)->nodeValue;
		
		return $picture;
	
	}
	
	private static function getHumbleBundleGames($dom) {
		
		$games = array();
		
		$basicTitles = $dom->query("//div[not(contains(h3/@class,'bta-info-heading'))]/ul[contains(@class,'games')]/li[contains(@class,'game')]/a/span[@class='item-title']");
		foreach($basicTitles as $title) {
			$games[] = new Game(
				str_replace('*', '', trim(preg_replace('/\s+/', ' ', $title->textContent)))
			);
		}
		
		$btaPrice = $dom->query("//em[@class='price bta']");
		$btaTitles = $dom->query("//div[contains(h3/@class,'bta-info-heading')]/ul[contains(@class,'games')]/li[contains(@class,'game')]/a/span[@class='item-title']");
		foreach($btaTitles as $title) {
			$games[] = new Game(
				str_replace('*', '', trim(preg_replace('/\s+/', ' ', $title->textContent))),
				floatval(substr($btaPrice->item(0)->nodeValue, 1))
			);
		}
		
		return $games;
	
	}
	
	// --- Weekly bundle
	
	public static function getWeeklyBundle() {
		
		$url = 'https://www.humblebundle.com/weekly';
		
		try {
			$dom = new HtmlDom($url);
		} catch (Exception $e) {
			APIOutput::http_response(504, "No response from '$url'.");
		}
		
		$bundle = new Bundle(
			self::getWeeklyBundleTitle($dom),
			self::getWeeklyBundlePicture($dom),
			$url,
			self::getWeeklyBundleGames($dom)
		);
		
		return $bundle;
		
	}
	
	private static function getWeeklyBundleTitle($dom) {
	
		$title = $dom->query("//title")->item(0)->nodeValue;
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
	
	private static function getWeeklyBundleGames($dom) {
	
		$games = array();
		
		$basicTitles = $dom->query("//div[@class='tiers']/div[@class='constrain-width' and not(contains(h3/@class,'bta-info'))]/ul[contains(@class, 'game-boxes')]/li/a[not(contains(span/@class,'fixed-price-info'))]/text()[normalize-space()]");
		foreach($basicTitles as $title) {
			$games[] = new Game(
				str_replace('*', '', trim(preg_replace('/\s+/', ' ', $title->textContent)))
			);
		}
		
		$btaPrice = $dom->query("//span[@class='price bta']");
		$btaTitles = $dom->query("//div[@class='tiers']/div[@class='constrain-width' and contains(h3/@class,'bta-info')]/ul[contains(@class, 'game-boxes')]/li/a/text()[normalize-space()]");
		foreach($btaTitles as $title) {
			$games[] = new Game(
				str_replace('*', '', trim(preg_replace('/\s+/', ' ', $title->textContent))),
				floatval(substr($btaPrice->item(0)->nodeValue, 1))
			);
		}
		
		$fixedPrice = $dom->query("//span[@class='price fixed']");
		$fixedTitles = $dom->query("//div[@class='tiers']/div[@class='constrain-width' and not(contains(h3/@class,'bta-info'))]/ul[contains(@class, 'game-boxes')]/li/a[contains(span/@class,'fixed-price-info')]/text()[normalize-space()]");
		foreach($fixedTitles as $title) {
			$games[] = new Game(
				str_replace('*', '', trim(preg_replace('/\s+/', ' ', $title->textContent))),
				floatval(substr($fixedPrice->item(0)->nodeValue, 1))
			);
		}

		return $games;
	
	}

}

?>
