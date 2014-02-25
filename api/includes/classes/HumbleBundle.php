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
		
		$basic_titles = $dom->query("//div[contains(@class,'section')]/ul[contains(@class,'games')]/li[contains(@class,'game')]/a/span[@class='item-title']");
		
		$bta_price = $dom->query("//em[@class='price bta']")->item(0)->nodeValue;
		$bta_titles = $dom->query("//div[contains(h3/@class,'bta-info-heading')]/ul[contains(@class,'games')]/li[contains(@class,'game')]/a/span[@class='item-title']");		
		
		for($i = 0; $i < $basic_titles->length; $i++) {
			$games[] = new Game(
				trim($basic_titles->item($i)->nodeValue)
			);
		}
		
		for($i = 0; $i < $bta_titles->length; $i++) {
			$game = new Game(
				trim($bta_titles->item($i)->nodeValue),
				floatval(substr($bta_price, 1))
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
		
		$basic_titles = $dom->query("//ul[contains(@class,'game-boxes') and not(contains(@class,'bta'))]/li/a[not(contains(span/@class,'fixed-price-info'))]/img[@class='game-box']/@alt");
		
		$bta_price = $dom->query("//span[@class='price bta']")->item(0)->nodeValue;
		$bta_titles = $dom->query("//ul[contains(@class,'game-boxes') and contains(@class,'bta')]/li/a/img[@class='game-box']/@alt");
		
		$fixed_price = $dom->query("//span[@class='price fixed']")->item(0)->nodeValue;
		$fixed_titles = $dom->query("//ul[contains(@class,'game-boxes') and not(contains(@class,'bta'))]/li/a[contains(span/@class,'fixed-price-info')]/img[@class='game-box']/@alt");		
		
		for($i = 0; $i < $basic_titles->length; $i++) {
			$games[] = new Game(
				trim($basic_titles->item($i)->nodeValue)
			);
		}
		
		for($i = 0; $i < $bta_titles->length; $i++) {
			$games[] = new Game(
				trim($bta_titles->item($i)->nodeValue),
				floatval(substr($bta_price, 1))
			);
		}
		
		for($i = 0; $i < $fixed_titles->length; $i++) {
			$games[] = new Game(
				trim($fixed_titles->item($i)->nodeValue),
				floatval(substr($fixed_price, 1))
			);
		}
		
		return $games;
	
	}

}

?>
